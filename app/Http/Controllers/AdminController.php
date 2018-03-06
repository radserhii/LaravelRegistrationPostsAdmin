<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin', ['users' => $users]);
    }
    public function inactiveUser($id)
    {
        $user = User::find($id);
        $user->is_active = 0;
        $user->save();
        return redirect('admin');
    }
    public function activeUser($id)
    {
        $user = User::find($id);
        $user->is_active = 1;
        $user->save();
        return redirect('admin');
    }
}
