<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Backend\Admin as User;
use Spatie\Permission\Models\Role;

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

            Auth::guard('admin')->login($user);

            return Redirect('backend/index');
      }

      public function getLogout(){
            if(Auth::guard('admin')->check()) {
                  Auth::guard('admin')->logout();
            }

            return Redirect::to('backend/login');
      }

      public function index(User $user) {
            return view('backend.user.index',[
                  'users' => $user->orderBy('updated_at')->paginate(10)
            ]);
      }

      public function create(Role $role){
            return view('backend.user.form', [
                  'roles'     => $role,
                  'title'     => 'เพิ่มข้อมูล'
            ]);
      }

      public function store(User $user, Request $request){

            $user->insert($request->all());
            return back('backend/user')->with('info', 'เพิ่มข้อมูลเรียบร้อยแล้ว');
      }

      public function update(User $user, $id){

      }
      public function edit(User $user, $id, Request $request){

      }
      public function delete(User $user, $id){

      }
}
