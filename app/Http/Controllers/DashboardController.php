<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        return view('dashboard', [
            'user' => $user,
            'recentActivity' => [
                ['label' => 'Login successful', 'time' => 'Just now'],
                ['label' => 'Profile updated', 'time' => '2 hours ago'],
            ],
        ]);
    }
}
