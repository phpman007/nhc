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
               return redirect('/')->with('success', 'เข้าสู่ระบบเรียบร้อยแล้ว');
         endif;
   }
}
