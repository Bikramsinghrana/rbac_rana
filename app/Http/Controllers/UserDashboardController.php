<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    //
    public function index()
    {
        // $users = User::with('roles')->get();
        return view('user.index');
    }
}
