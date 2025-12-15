<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{   
    public function dashboard()
    {   

        // dd('Project Index');
        // $users = User::with('roles')->get();
        return view('project.dashboard');
    }

    public function index()
    {
        // $users = Project::with('roles')->get();
        return view('project.index');
    }
}
