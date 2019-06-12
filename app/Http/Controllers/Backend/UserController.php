<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Backend\Admin as User;

use Auth, Redirect, Hash;
class UserController extends Controller
{
      protected $message = [
            'validate.email.required'     => 'กรุณากรอกข้อมูลอีเมล',
            'validate.password.required'  => 'กรุณากรอกข้อมูลรหัสผ่าน',
            'login.email.error'           => 'อีเมล หรือรหัสผ่านไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง'
      ];


      public function getLogin() {
            if(Auth::guard('admin')->check()) {
                  return Redirect::to('backend/index');
            }

            return view('backend.login');
      }

      public function postLogin(Request $req) {
            $req->validate([
                  'email'        => 'required',
                  'password'     => 'required'
            ],[
                  'email.required'     => $this->message['validate.email.required'],
                  'password.required'  => $this->message['validate.password.required']
            ]);

            $user = User::where('email', $req->email)->first();

            if(empty($user)) {
                  return Redirect::back()->withErrors(['username' => $this->message['login.email.error']]);
            }

            if(!Hash::check($req->password,$user->password)) {
                  return Redirect::back()->withErrors(['username' => $this->message['login.email.error']]);
            }

            Auth::guard('admin')->login(User::first());

            return Redirect('backend/index');
      }

      public function getLogout()
      {
            if(Auth::guard('admin')->check()) {
                  Auth::guard('admin')->logout();
            }

            return Redirect::to('backend/login');
      }
}
