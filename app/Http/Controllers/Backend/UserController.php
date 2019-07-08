<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Backend\Admin as User;
use App\Model\Backend\Member;
use App\Model\Backend\ModelHasRole;

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
                'users' => $user->orderBy('updated_at','DESC')->paginate(10)
        ]);
    }

    public function create(Role $role){
        return view('backend.user.form', [
                'roles'     => $role,
                'title'     => 'เพิ่มข้อมูล'
        ]);
    }

    public function store(User $user, Request $request){
    $request->validate([
        'email' 					=> 'required|email|unique:users',
        'username' 					=> 'required|unique:users',
        'password'					=> 'required|min:6|max:20|confirmed',
        'password_confirmation'		=> 'required|min:6|max:20',
        'permission'		        => 'required',
    ]);

    $input =  $request->all();
    if($input['permission']==1){
        $permission="super admin";
    }elseif($input['permission']==2){
        $permission="admin";
    }

    $data['username']          = trim($request->input('username'));
    $data['email']             = trim($request->input('email'));
    $data['password']          = Hash::make($input['password']);
    $data['position']          = "dev";
    $data['permission']        = $permission;
    $result1 = User::create($data);

    $data2['role_id']      = $request->input('permission');
    $data2['model_type']   = "App\Model\Backend\Admin";
    $data2['model_id']     = $result1->id;
    $result2 = ModelHasRole::create($data2);

    if($result1!=NULL and $result2!=NULL){
        \Session::flash('success','เพิ่มข้อมูลเรียบร้อยแล้ว');
    }else{
        \Session::flash('error','เพิ่มข้อมูลไม่ได้!!!');
    }

    return redirect('/backend/user');
    // return back();
    }

    public function update(User $user, $id, Request $request){
        $request->validate([
            'permission'    => 'required',
        ]);

        $input =  $request->all();
        if($input['permission']==1){
            $permission="super admin";
        }elseif($input['permission']==2){
            $permission="admin";
        }

        $data = User::find($id);
        $data->permission  = $permission;
        $data->update();

        $data2=ModelHasRole::where('model_id','=',$id);
        $data2->update(['role_id'=>$request->input('permission')]);

        if($data!=NULL and $data2!=NULL){
            \Session::flash('success','แก้ไขข้อมูลเรียบร้อยแล้ว');
        }else{
            \Session::flash('error','แก้ไขข้อมูลไม่ได้!!!');
        }
        return redirect('/backend/user');
    }

    public function edit(User $user, $id, Request $request){
        return view('backend.user.edit', [
            'title'     => 'แก้ไขข้อมูล',
            'users' => $user->where('id',$id)->first(),
        ]);
    }

    public function delete(User $user, $id){
        //dd('$id');
        $data = User::find($id)->delete();
        return back();
    }
}
