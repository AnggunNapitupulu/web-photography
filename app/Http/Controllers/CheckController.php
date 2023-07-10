<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laratrust\Laratrust;

class CheckController extends Controller
{
    public function index()
    {
    //   if(Auth::user()->name == 'Admin'){
    //     // $admin = Role::where('name', 'admin')->first();
    //     $user = User::where('id', '=', 1)->first();
    //     // $user->attachRole($admin);
    //     dd($user->hasRole('Admin'));
    // }
      return view('helper.index');
    }
  
    public function create()
    {
      // check premission user
      // dd(Auth::user());
      $user = User::where('id', '=', 8)->first();
      $userRole = Role::where('name', '=', 'User')->first();
      // dd($user);
      if($user->isAbleTo('order-delete')){
        return "Check Create Method";
      }
      // $user->attachPermission(1);
      abort(403);
    }
}
