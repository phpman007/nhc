<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Frontend\Member;
use Auth, Hash;
use Carbon\Carbon;
class AuthController extends Controller
{

	public function getChangePassword()
	{
		return view('frontend.change-password');
	}
	public function vote() {
		if( Carbon::parse(config('time.vote_menu_confirm.start_date'))  <= now() && Carbon::parse(config('time.vote_menu_confirm.end_date')) >= now() ){
			// echo 'confirm';
			return redirect('vote-confirm');
		}
		elseif( Carbon::parse(config('time.vote.start_date'))  <= now() && Carbon::parse(config('time.vote.end_date')) >= now() ) {

			return redirect('election');
			// echo 'vote';
		}
		else {
			return redirect('vote-schedule');
			// echo 'schelue';
		}
	}

	public function voteConfirmApprove() {
		if( !(Carbon::parse(config('time.vote_menu_confirm.start_date'))  <= now() && Carbon::parse(config('time.vote_menu_confirm.end_date')) >= now()) ){
			return redirect('/')->with('info', 'ยังไม่ถึงวันที่กำหนด');
		}

		if(!Auth::check()) {
			return redirect('login');
		}
		$member 					= Auth::user();
		$member->verify_status_confirm 	= 1;
		$member->verify_register_code		= "nhc". str_random(5);
		$member->save();

		return back()->with('info', 'คุณได้ทำการยืนยันการใช่สิทธิ์ลงคะแนนเรียบร้อยแล้ว');
	}

	public function voteConfirmResend() {
		if( !(Carbon::parse(config('time.vote_menu_confirm.start_date'))  <= now() && Carbon::parse(config('time.vote_menu_confirm.end_date')) >= now()) ){
			return redirect('/')->with('info', 'ยังไม่ถึงวันที่กำหนด');
		}

		if(!Auth::check()) {
			return redirect('login');
		}
		return back()->with('info', 'ระบบได้จัดส่งอีเมลเรียบร้อยแล้ว');
	}

	public function voteConfirm() {
		if( !(Carbon::parse(config('time.vote_menu_confirm.start_date'))  <= now() && Carbon::parse(config('time.vote_menu_confirm.end_date')) >= now()) ){
			return redirect('/')->with('info', 'ยังไม่ถึงวันที่กำหนด');
		}

		if(!Auth::check()) {
			return redirect('login');
		}
		return view('frontend.confirm-vote');
	}
	public function voteSchedule() {
		return view('frontend.mock.vote-schedule');
	}
	public function postChangePassword(Request $request)
	{
		$request->validate([
			'email' 					=> 'required|email',
			'key'             => 'required',
			'password'					=> 'required|min:6|max:20|confirmed|regex:/^(?=.*?[A-Za-z])(?=.*?[0-9]).{2,}$/',
			'password_confirmation'		     => 'required|min:6|max:20|regex:/^(?=.*?[A-Za-z])(?=.*?[0-9]).{2,}$/'
		]);

		$member = Member::where('email', $request->email)->first();

		if (empty($member))
		{
			return back()->withErrors(['email' => 'ไม่พบข้อมูลอีเมลที่แจ้ง กรุณาตรวจสอบแล้วลองใหม่อีกครั้ง']);
		}

		if ($member->key_forget != $request->key)
		{
			return back()->withErrors(['key' => 'ข้อมูล OTP ไม่ถูกต้อง กรุณาตรวจสอบแล้วลองใหม่อีก']);
		}

		$member->password = Hash::make($request->password);

		$member->key_forget = str_random(5);

		$member->save();

		return redirect('/login')->with('info', 'แก้ไขรหัสผ่านเรียบร้อยแล้ว');
	}

	public function getLogin()
	{
		return view('frontend.login');
	}

	public function logout()
	{
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
			return back()->withErrors(['username' =>'ไม่พบข้อมูลผู้ใช้งาน โปรดติดต่อเจ้าหน้าที่']);
		endif;

		if(Hash::check($request->password, $member->password)) :
			Auth::login($member);
			switch ($member->groupId)
			{
				case '1':
				$redirect = 'form-professional/2?get_page=1';
				break;
				case '2':
				$redirect = 'form-organization/3?get_page=1';
				break;
				case '3':
				if($request->send == "ngoregister") {
					$redirect = 'form-ngo/1?get_page=1';
				} else {
					$redirect = 'form-ngo-register/2?get_page=1';
				}

				break;
				case '4':
				if(!empty($member->detail->suggestPosition)) {
					$redirect = 'form-ngo/1';
				} else {
					if($request->send == "ngoregister") {
						$redirect = 'form-ngo/1?get_page=1';
					} else {
						$redirect = 'form-ngo-register/2?get_page=1';
					}

				}

				break;

				default:
				$redirect = '/';
				break;
			}

			if( Carbon::parse(config('time.vote_menu_confirm.start_date'))  <= now() && Carbon::parse(config('time.vote_menu_confirm.end_date')) >= now() ){
                // echo 'confirm';

                if ($member->detail->statusId == 4) {
                    return redirect('vote-confirm-notpass');
                } elseif ($member->detail->statusId == 3) {
                //    return redirect('vote-confirm');
                    return redirect('vote-confirm/flipbook_page');
                } else {
                    return redirect('vote-confirm-notpass2');
                }
			}

			if(now() <= Carbon\Carbon::parse(config('time.register.date')) && now() >= Carbon\Carbon::parse('2019-09-04')) {
				return \Redirect::to($redirect)->with('info', 'เข้าสู่ระบบเรียบร้อยแล้ว');
			} else {
				return redirect('vote-schedule');
			}

		else:
			return back()->withErrors(['username'=> 'รหัสผ่านไม่ถูกต้อง กรุณาตรวจสอบแล้วลองใหม่อีก']);
		endif;
	}

	public function getForgetPassword()
	{
		return view('frontend.forget-password');
	}

	public function postForgetPassword(Request $request, Member $member)
	{
		$member = $member->where('email', $request->email)->first();
		if (empty($member))
		{
			return back()->withErrors(['email' => 'ไม่พบข้อมูลอีเมลที่แจ้ง กรุณาตรวจสอบแล้วลองใหม่อีกครั้ง']);
		}

		$member->key_forget = str_random(4);
		$member->save();


		\Mail::to($member->email)->send(new \App\Mail\ForgetPassword($member));

		return redirect('login')->with('info', 'ระบบได้ส่งรหัส OTP ไปที่อีเมล์ของท่านเรียบร้อยแล้ว <br> โปรดเข้าอีเมล์ของท่านเพื่อดำเนินการเปลี่ยนรหัส');
	}


	public function deleteMemberGet()
	{
		return view('frontend.deletemember');
	}

	public function deleteMemberPost(Request $req)
	{
		// dd($req->all());
		Auth::logout();
		$req->validate(['username'=> 'required' , 'password' => 'required']);

		$member = Member::where('email', $req->username)->first();

		if(empty($member)) {
			return back()->withErrors(['username' => 'ไม่พบข้อมูลผู้ใช้งานระบบ หรือรหัสผ่านไม่ถูกต้อง']);
		}
		if(!Hash::check( $req->password, $member->password)) {
			return back()->withErrors(['username' => 'ไม่พบข้อมูลผู้ใช้งานระบบ หรือรหัสผ่านไม่ถูกต้อง']);

		}

		$member->delete();

		return redirect('/')->with('info', 'ท่านได้ทำการยกเลิก account เรียบร้อยแล้ว');
	}

	public function confirmRegisterGet($id)
	{
		$member = Member::where('verfiy_register_confirm', $id)->first();

		if( empty($member) )
		{
			return redirect('/')->with('info', 'การยืนยันผิดพลาด หรือมีการยืนยันรหัสไปเรียบร้อยแล้ว');
		}

		$member->verfiy_register_confirm 	= NULL;
		$member->verify_status_confirm		= 1;
		$member->verify_register_code 		= str_random(5);
		$member->save();
		\Mail::to($member->email)->send(new \App\Mail\emailConfirmLast($member->verify_register_code));
		return redirect('/')->with('info', 'ท่านได้ทำรายการเรียบร้อยแล้ว');
    }

    public function voteConfirmFlippage()
	{
		return view('frontend.mock.slate-professional-new');
    }

    public function voteConfirmNotPass()
	{
		return view('frontend.vote-confirm-notpass');
    }

    public function voteConfirmNotPass2()
	{
		return view('frontend.vote-confirm-notpass2');
	}

}
