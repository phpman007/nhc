<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Frontend\Member;
use Auth, Hash;
class AuthController extends Controller
{
    public function getLogin()
    {
          return view('frontend.login');
   }
   public function logout(){
         Auth::logout();
         return redirect('/');
   }
   public function postLogin(Request $request)
   {
         $request->validate([
               'username'           => 'required',
               'password'           => 'required'
         ]);

         $member = Member::where('username', $request->username)->first();

         if($member == null) :
               return back()->withErrors(['username' =>'ไม่พบข้อมูลผู้ใช้งาน']);
         endif;
         if(Hash::check($request->password, $member->password)) :
               Auth::login($member);
               switch ($member->groupId) {
                     case '1':
                           $redirect = 'form-professional/2';
                           break;
                     case '2':
                           $redirect = 'form-organization/3';
                           break;
                     case '3':
                           $redirect = 'form-ngo-register/2';
                           break;
                     case '4':
                              if(!empty($member->detail->suggestPosition)) {
                                    $redirect = 'form-ngo/1';
                              } else {
                                    $redirect = 'form-ngo-register/2';
                              }

                           break;

                     default:
                           $redirect = '/';
                           break;
               }
               return \Redirect::to($redirect)->with('info', 'เข้าสู่ระบบเรียบร้อยแล้ว');
         else:
               return back()->withErrors(['username', 'รหัสผ่านไม่ถูกต้อง']);
         endif;
   }
}
