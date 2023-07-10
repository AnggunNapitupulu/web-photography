<?php

namespace App\Http\Controllers;

use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;

class AuthController extends Controller
{
  public function index()
  {
    // $this->login();
  }

  public function login_user_page()
  {
    return view('auth.login', ['title' => 'Login User']);
  }
  public function login_admin_page()
  {
    return view('auth.login_admin', ['title' => 'Login Admin']);
  }

  public function login_user(Request $request)
  {
    $role = new RoleUser();
    $users = new User();
    $validatedData = $request->validate([
      'email' => 'required|email',
      'password' => 'required|min:6|max:20',
    ]);

    if (Auth::attempt($validatedData)) {
      $user_info = $users->select('id')->where('email', $request->email)->first();
      // dd($id);
      $role_user_info = $role->where('user_id', $user_info->id)->first();
      // return $role_user_info->role_id;
      // return $role_user;
      if ($role_user_info->role_id == 2) {
        $request->session()->regenerate();
        $request->Session()->put('status', 'LOGIN');
        return redirect()->intended('/');
      } else {
        return back()->with('message', 'Halaman ini hanya untuk login sebagai User!');
      }
    }

    return back()->with('message', 'Oops! Percobaan login gagal. Mohon periksa kembali username dan password yang Anda masukkan!');
  }

  public function login_admin(Request $request)
  {
    $role = new RoleUser();
    $users = new User();
    $validatedData = $request->validate([
      'email' => 'required|email',
      'password' => 'required|min:6|max:20',
    ]);

    if (Auth::attempt($validatedData)) {
      $user_info = $users->select('id')->where('email', $request->email)->first();
      // dd($id);
      $role_user_info = $role->where('user_id', $user_info->id)->first();
      // return $role_user_info->role_id;
      // return $role_user;
      if ($role_user_info->role_id == 1) {
        $request->session()->regenerate();
        return redirect()->intended('admin/dashboard');
      } else {
        return back()->with('message', 'Anda bukan Admin!');
      }
    }

    return back()->with('message', 'Oops! Percobaan login gagal. Mohon periksa kembali username dan password yang Anda masukkan!');
  }

  // public function login_user(Request $request)
  // {
  //   $role = new RoleUser();
  //   $users = new User();
  //   $validatedData = $request->validate([
  //     'email' => 'required|email',
  //     'password' => 'required|min:6|max:20',
  //   ]);

  //   if (Auth::attempt($validatedData)) {
  //     $user_info = $users->select('id')->where('email', $request->email)->first();
  //     // dd($id);
  //     $role_user_info = $role->where('user_id', $user_info->id)->first();
  //     // return $role_user_info->role_id;
  //     // return $role_user;
  //     if ($role_user_info->role_id == 1) {
  //       $request->session()->regenerate();
  //       return redirect()->intended('admin/dashboard');
  //     } else {
  //       $request->session()->regenerate();
  //       return redirect()->intended('/');
  //     }
  //   }

  //   return back()->with('message', 'Oops! Percobaan login gagal. Mohon periksa kembali username dan password yang Anda masukkan!');
  // }

  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/auth/login')->with('message', 'Anda telah melakukan logout!');
  }
}
