<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    // public function showUserList(): View
    // {
    //     $users = DB::table('users')->get();
    //     return view("users_list", ['users' => $users]);
    // }
}
