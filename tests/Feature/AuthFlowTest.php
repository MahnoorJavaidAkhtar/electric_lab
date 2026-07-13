<?php

namespace Tests\Feature;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_view_login_page(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('Sign in to your account');
    }

    public function test_registered_user_can_login_and_access_dashboard(): void
    {
        $role = Role::create([
            'name' => 'Administrator',
            'slug' => 'administrator',
            'description' => 'System administrator',
            'is_active' => true,
            'hierarchy_level' => 100,
        ]);

        $user = User::factory()->create([
            'name' => 'Administrator User',
            'email' => 'admin@example.com',
            'password' => Hash::make('Password123!'),
            'role_id' => $role->id,
            'is_active' => true,
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'Password123!',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    public function test_new_user_can_register(): void
    {
        $response = $this->post('/register', [
            'name' => 'New Engineer',
            'email' => 'engineer@example.com',
            'password' => 'Password123!',
            'password_confirmation' => 'Password123!',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertDatabaseHas('users', [
            'email' => 'engineer@example.com',
        ]);
        $this->assertAuthenticated();
    }

    public function test_authenticated_user_can_view_profile_page(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/profile');

        $response->assertStatus(200);
        $response->assertSee('Profile');
    }
}
