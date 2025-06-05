<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminLoginLogController extends Controller
{
    public function show(User $user)
    {
        $logs = $user->loginLogs()->latest()->paginate(20);

        return view('admin.login_logs', compact('user', 'logs'));
    }
}
