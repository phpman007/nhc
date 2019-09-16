<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Frontend\Member;
use Auth, Hash;

class ProfessionalController extends Controller
{
    public function index()
    {
       return view('frontend.mock.slate-professional-new');
    }
    public function login()
    {
        return view('frontend.mock.login');
    }
    public function postLogin(Request $request)
    {

         $request->validate([
              'username'           => 'required',
              'password'           => 'required'
         ]);
         $member = Member::where('username', $request->username)->first();

         if($member == null) :
              return back()->withErrors(['username' =>'ไม่พบข้อมูลผู้ใช้งาน โปรดติดต่อเจ้าหน้าที่']);
         endif;

         if(Hash::check($request->password, $member->password)) :
              Auth::login($member);

               return redirect()->route('professional.news')->with('info', 'เข้าสู่ระบบเรียบร้อยแล้ว');
              //slate-professional-new
         else:
              return back()->withErrors(['username'=> 'รหัสผ่านไม่ถูกต้อง กรุณาตรวจสอบแล้วลองใหม่อีก']);
         endif;
    }
}
