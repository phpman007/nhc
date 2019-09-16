<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Backend\Province;
use App\Model\Backend\GroupSN;
use App\Model\Backend\Statuses;
use App\Model\Backend\Member;
use App\Model\Backend\MemberDetail;
use App\Model\Backend\Admin;
use App\Model\Backend\reason;
use App\Model\Backend\Logmail;
use Carbon\Carbon;
use Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
// use Barryvdh\DomPDF\Facade as PDF;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Support\Facades\Mail;
use App\Mail\approveMail;

use DB;
use PDF;


use Illuminate\Support\Facades\Auth;

class ApproveSNController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('admin')->user()->can('approve_professional')) {

            $listgroupsn=GroupSN::get();

            return view('backend.approve.snApprove',compact('listgroupsn'));
        } else {
            return redirect('/backend/home');
        }
    }



    public function editstatus()
    {
        if (Auth::guard('admin')->user()->can('approve_professional')) {
            $input = \Request::all();

            if($input['txtstatuschange'][0]==3){

                $list2=MemberDetail::join('members','members.id','=','member_details.memberId')
                ->select('members.candidateNumber')
                ->where('members.groupId','=',1)
                ->where('member_details.statusId','=',3)
                ->orderBy('members.candidateNumber','DESC')->first();

                if($list2==NULL){
                    $newnumber=1;
                }else{
                    $newnumber=($list2->candidateNumber)+1;
                }

                $list3 = Member::find($input['Hid'][0]);
                $list3->candidateNumber = $newnumber;

                $list = MemberDetail::find($input['Hid'][0]);
                $list->statusId = $input['txtstatuschange'][0];

            }else{
                $list = MemberDetail::find($input['Hid'][0]);
                $list->statusId = $input['txtstatuschange'][0];

                $list3 = Member::find($input['Hid'][0]);
                $list3->candidateNumber = 0;
            }

            if($list->update() and $list3->update()){
                \Session::flash('success','แก้ไขสถานะเรียบร้อยแล้ว');
            }else{
                \Session::flash('error','แก้ไขสถานะไม่ได้!!!');
            }
            // return redirect('/backend/approve/snApprove');
            return back();
        } else {
            return redirect('/backend/home');
        }
    }

    public function editnotpass()
    {
        if (Auth::guard('admin')->user()->can('approve_professional')) {
            $input = \Request::all();

            $list = MemberDetail::find($input['Hidmember'][0]);
            $list->reason = $input['txtreason'][0];
            $list->statusId = 4;

            $list3 = Member::find($input['Hidmember'][0]);
            $list3->candidateNumber = 0;

            if($list->update() and $list3->update()){
                \Session::flash('success','แก้ไขสถานะเรียบร้อยแล้ว');
            }else{
                \Session::flash('error','แก้ไขสถานะไม่ได้!!!');
            }

            // return redirect('/backend/approve/snApprove');
            return back();
        } else {
            return redirect('/backend/home');
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function snApproveAll()
    {
        if (Auth::guard('admin')->user()->can('approve_professional')) {

            $input = \Request::all();

            // $liststatus = Statuses::get();
            $idgroup = request()->idgroup;

            $list2 = Member::join('member_details','members.id','=','member_details.memberId')
            ->where('members.groupId','=',1)
            ->where('members.seniorGroupId','=',$idgroup)
            // ->where('members.status_accept','=',1)
            ->where('members.confirmed_at', '!=', null)
            ->where(function ($query) {
                $query->where('members.deleted_at',NULL)
                ->where('member_details.deleted_at',NULL);
            })
            ->get();

            $list3 = Member::join('member_details','members.id','=','member_details.memberId')
            ->where('members.groupId','=',1)
            ->where('members.seniorGroupId','=',$idgroup)
            // ->where('members.status_accept','=',1)
            ->where('members.confirmed_at', '!=', null)
            ->whereIn('member_details.statusId',[3,4])
            ->where(function ($query) {
                $query->where('members.deleted_at',NULL)
                ->where('member_details.deleted_at',NULL);
            })
            ->get();

            $list4 = Member::join('member_details','members.id','=','member_details.memberId')
            ->where('members.groupId','=',1)
            ->where('members.seniorGroupId','=',$idgroup)
            // ->where('members.status_accept','=',1)
            ->where('members.confirmed_at', '!=', null)
            ->whereIn('member_details.statusId',[3,4])
            ->where('member_details.fixStatus','=',1)
            ->where(function ($query) {
                $query->where('members.deleted_at',NULL)
                ->where('member_details.deleted_at',NULL);
            })
            ->get();

            $list=Member::join('member_details','members.id','=','member_details.memberId')
            ->leftJoin('senior_groups','members.seniorGroupId','=','senior_groups.id')
            ->leftJoin('users', 'member_details.adminId', '=', 'users.id')
            ->leftJoin('statuses','member_details.statusId','=','statuses.id')
            // ->where('members.groupId','=',1)
            ->where('members.seniorGroupId', $idgroup)
            // ->where('members.status_accept','=',1)
            ->where('members.confirmed_at', '!=', null)
            ->whereIn('member_details.statusId',[3,4])
            ->where(function ($query) {
                $query->where('members.deleted_at',NULL)
                ->where('member_details.deleted_at',NULL);
            })
            ->select('member_details.docId','members.nameTitle','members.firstname','members.lastname','members.personalId','senior_groups.groupName','member_details.statusId','users.username','member_details.updateStatusTime','member_details.reason','statuses.status');

            if(!empty($input['txtname'])){
                $txtname = request()->input('txtname');

                $list->where('members.groupId','=',1)
                ->where(function ($query) use($txtname) {
                    $query->where('members.firstname','like','%'.$txtname.'%')
                        ->orWhere('members.lastname','like','%'.$txtname.'%')
                        ->orWhere('member_details.docId','Like','%'.$txtname.'%')
                        ->orWhere('members.username','like','%'.\Request::get('txtname').'%');
                });
            }else{
                $list->where('members.groupId','=',1);
            }

            $listmember= $list->orderBy('members.id')->paginate(10)->appends($input);

            // dd($listmember);

            return view('backend.approve.snApproveAll', compact ('listmember', 'list2', 'list3','list4'));
        } else {
            return redirect('/backend/home');
        }
    }

    public function editfixstatus($id)
    {
        if (Auth::guard('admin')->user()->can('approve_professional')) {
            $list=MemberDetail::join('members','members.id','=','member_details.memberId')
            ->where('members.groupId','=',1)
            ->where('members.seniorGroupId','=',$id)
            ->whereIn('member_details.statusId',[0,1,2])
            // ->where('members.status_accept','=',1)
            ->where('members.confirmed_at', '!=', null)
            ->where('member_details.fixStatus','=',1)
            ->where(function ($query) {
                $query->where('members.deleted_at',NULL)
                ->where('member_details.deleted_at',NULL);
            })
            ->get();

            // dd($list);

            if(count($list)==0){
                $list2=DB::statement("update member_details,members set member_details.fixStatus=1, member_details.approveDate='".date("Y-m-d H:i:s")."' where members.groupId=1 and members.seniorGroupId=".$id." and members.confirmed_at IS NOT NULL and member_details.memberId=members.id and member_details.statusId in (3,4)");

                if($list2){

                    $list3=Member::where('groupId',1)
                    ->where('seniorGroupId',$id)
                    ->where('confirmed_at','!=',NULL)
                    ->where('deleted_at',NULL)
                    ->whereHas('detail', function($query2) {
                        $query2->where('fixStatus',1)
                        ->where('statusId',3)
                        ->where('deleted_at',NULL);
                    })
                    ->orderBy('firstname')->get();

                    // dd(count($list3));

                    if(count($list3)>0){
                        foreach($list3 as $key => $vallist){
                            $list4 = Member::find($vallist->id);
                            $list4->candidateNumber = $key+1;
                            $list4->update();
                        }
                        if($list4){
                            \Session::flash('success','อนุมัติเรียบร้อยแล้ว');
                            // $group="ผู้ทรงคุณวุฒิ";
                            // $this->mail($list3, $group);

                            // return redirect('backend/approve/pdfSN/'.$id);
                        }
                    }else{
                        \Session::flash('success','อนุมัติเรียบร้อยแล้ว');
                    }

                }else{
                    \Session::flash('error','ยืนยันการอนุมัติไม่ได้!!!');
                }
            }else{
                \Session::flash('error','กรุณาแก้ไขสถานะให้เรียบร้อยก่อนยืนยันการอนุมัติ!!!');
            }
            return back();
        } else {
            return redirect('/backend/home');
        }
    }

    public function mail($id)
    {
        if (Auth::guard('admin')->user()->can('approve_professional')) {

            $list=Member::join('member_details','members.id','=','member_details.memberId')
            ->join('senior_groups','members.seniorGroupId','=','senior_groups.id')
            ->where('members.groupId','=',1)
            // ->where('members.status_accept','=',1)
            ->where('members.confirmed_at', '!=', null)
            ->where('member_details.fixStatus',1)
            ->where('member_details.statusId',3)
            ->where('members.seniorGroupId','=',$id)
            ->where(function ($query) {
                $query->where('members.deleted_at',NULL)
                ->where('member_details.deleted_at',NULL);
            })
            ->select('members.nameTitle','members.firstname','members.lastname','members.email'
            ,'member_details.statusId','senior_groups.groupName','member_details.reason','members.id')
            ->get();

            // dd($list);

            $list2=GroupSN::where('id','=',$id)
            ->first();

            // dd($list2);

            $subject="แจ้งผลประกาศบัญชีรายชื่อผู้ทรงคุณวุฒิที่มีคุณสมบัติเข้ารับการเลือกกันเองเป็นกรรมการสุขภาพแห่งชาติ";

            $groupid=1;

            foreach($list as $val){
                if($val->email!=""){
                    Mail::to($val->email)
                    ->send(new approveMail($val->nameTitle, $val->firstname, $val->lastname, $val->statusId, $val->groupName, $val->reason, $list2->pdf_complete, $subject, $groupid, 0, 0));
                    // $val->email
                    if(Mail::failures()){

                        $data['member_id']      = $val->id;
                        $data['user_id']        = Auth::guard('admin')->user()->id;
                        $data['email']          = $val->email;
                        $data['send_at']        = date('Y-m-d H:i:s');
                        $data['status']         = "f";
                        Logmail::create($data);
                    }else{

                        $data['member_id']      = $val->id;
                        $data['user_id']        = Auth::guard('admin')->user()->id;
                        $data['email']          = $val->email;
                        $data['send_at']        = date('Y-m-d H:i:s');
                        $data['status']         = "s";
                        Logmail::create($data);
                    }
                }
            }

            Mail::to('julaluckw@gmail.com')
            ->send(new approveMail("นาง", "จุฬาลักษณ์", "แพร่พาณิชวัฒน์", 1, "กลุ่มบริหาร นโยบายสาธารณะ รัฐศาสตร์ นิติศาสตร์", "ทดสอบ", $list2->pdf_complete, $subject, $groupid,"กรุงเทพมหานคร",13));
            if(Mail::failures()){

                $data['member_id']      = 1;
                $data['user_id']        = Auth::guard('admin')->user()->id;
                $data['email']          = "julaluckw@gmail.com";
                $data['send_at']        = date('Y-m-d H:i:s');
                $data['status']         = "f";
                Logmail::create($data);
            }else{

                $data['member_id']      = 1;
                $data['user_id']        = Auth::guard('admin')->user()->id;
                $data['email']          = "julaluckw@gmail.com";
                $data['send_at']        = date('Y-m-d H:i:s');
                $data['status']         = "s";
                Logmail::create($data);
            }

            Mail::to('Vasit.srithimakul@gmail.com')
            ->send(new approveMail("คุณ", "Vasit", "Srithimakul", 1, "กลุ่มบริหาร นโยบายสาธารณะ รัฐศาสตร์ นิติศาสตร์", "ทดสอบ", $list2->pdf_complete, $subject, $groupid,"กรุงเทพมหานคร",13));
            if(Mail::failures()){
                $data['member_id']      = 1;
                $data['user_id']        = Auth::guard('admin')->user()->id;
                $data['email']          = "Vasit.srithimakul@gmail.com";
                $data['send_at']        = date('Y-m-d H:i:s');
                $data['status']         = "f";
                Logmail::create($data);
            }else{
                $data['member_id']      = 1;
                $data['user_id']        = Auth::guard('admin')->user()->id;
                $data['email']          = "Vasit.srithimakul@gmail.com";
                $data['send_at']        = date('Y-m-d H:i:s');
                $data['status']         = "s";
                Logmail::create($data);
            }

            Mail::to('zzlosecontrol@gmail.com')
            ->send(new approveMail("คุณ", "สมชัย", "สิมมา", 1, "กลุ่มบริหาร นโยบายสาธารณะ รัฐศาสตร์ นิติศาสตร์", "ทดสอบ", $list2->pdf_complete, $subject, $groupid,"กรุงเทพมหานคร",13));
            if(Mail::failures()){
                $data['member_id']      = 1;
                $data['user_id']        = Auth::guard('admin')->user()->id;
                $data['email']          = "zzlosecontrol@gmail.com";
                $data['send_at']        = date('Y-m-d H:i:s');
                $data['status']         = "f";
                Logmail::create($data);
            }else{
                $data['member_id']      = 1;
                $data['user_id']        = Auth::guard('admin')->user()->id;
                $data['email']          = "zzlosecontrol@gmail.com";
                $data['send_at']        = date('Y-m-d H:i:s');
                $data['status']         = "s";
                Logmail::create($data);
            }

            $list4 = GroupSN::find($id);
            $list4->statusmail = 1;
            $list4->sendmail_date=date('Y-m-d H:i:s');
            $list4->update();

            \Session::flash('success','ส่งอีเมล์เรียบร้อยแล้ว');

            return back();
        } else {
            return redirect('/backend/home');
        }
    }

    public function genPDF1($id){
        if (Auth::guard('admin')->user()->can('approve_professional')) {

            $list=Member::join('member_details','members.id','=','member_details.memberId')
            ->leftJoin('provinces', function ($join) {
                $join->on('member_details.subDistrictId','=','provinces.district_code')
                ->on('member_details.districtId','=','provinces.amphoe_code')
                ->on('member_details.provinceId','=','provinces.province_code');
            })
            ->where('members.groupId','=',1)
            ->where('members.seniorGroupId','=',$id)
            // ->where('members.status_accept','=',1)
            ->where('members.confirmed_at', '!=', null)
            ->where('member_details.fixStatus',1)
            ->where('member_details.statusId',3)
            ->where(function ($query) {
                $query->where('members.deleted_at',NULL)
                ->where('member_details.deleted_at',NULL);
            })
            ->select('members.id','members.nameTitle','members.firstname','members.lastname','members.candidateNumber','member_details.nowRole','member_details.nowWork'
            ,'member_details.workPlaceName','member_details.no','member_details.moo','member_details.soi','member_details.street','member_details.zipCode'
            ,'member_details.tel','member_details.mobile','member_details.nowWorkPlace','member_details.startDate','member_details.endDate','member_details.dateOfBirth'
            ,'member_details.graduated1','member_details.graduated2','member_details.graduated3','member_details.graduated4','member_details.graduated5'
            ,'member_details.faculty1','member_details.faculty2','member_details.faculty3','member_details.faculty4','member_details.faculty5'
            ,'member_details.nowWorkPlace','member_details.pastWork1','member_details.pastWork2','member_details.pastWork3','member_details.pastOrganization1'
            ,'member_details.pastOrganization2','member_details.pastOrganization2','member_details.time1','member_details.time2','member_details.time3','member_details.vision'
            ,'provinces.province','provinces.district','provinces.amphoe')
            ->orderBy('members.ngoGroupId')
            ->orderBy('members.candidateNumber')
            ->get();

            // dd($list);

            // $list=Member::where('groupId',1)
            // // ->where('seniorGroupId',$id)
            // ->where('status_accept','=',1)
            // ->where('deleted_at',NULL)
            // ->whereHas('detail', function($query2) {
            //     $query2->where('fixStatus',1)
            //     ->where('deleted_at',NULL)
            //     ->where('statusId',3);
            // })
            // ->orderBy('seniorGroupId')
            // ->orderBy('candidateNumber')
            // ->get();

            $pdf = PDF::loadView('/backend/approve/pdfNumber', ['list'=>$list]);
            $path='pdf/approve/approveSN'.$id.'.pdf';

            $list4 = GroupSN::find($id);
            $list4->pdf_flipbook = $path;
            $list4->update();

            $pdf->save(public_path($path));
            // return @$pdf->stream('/backend/approve/pdfSN'.$id);

            //ส่งเมล์
            // $this->mail();

            return back();

            // $path = public_path('pdf/professional/pdfSN-'. $id .'.pdf');
            // $pdf->stream('/backend/approve/pdfSN')->save($path);
            // return @$pdf->stream('/backend/approve/pdfSN');
            // return $pdf->download('candidateNumberSN'.$id.'.pdf');
        } else {
            return redirect('/backend/home');
        }
    }

    public function documents()
    {
        if (Auth::guard('admin')->user()->can('approve_professional')) {

            $listgroupsn=GroupSN::get();

            return view('backend.approve.snDocuments',compact('listgroupsn'));
        } else {
            return redirect('/backend/home');
        }
    }

    public function exportWord($id){
        if (Auth::guard('admin')->user()->can('approve_professional')) {

            $list1=Member::join('member_details','members.id','=','member_details.memberId')
            ->join('senior_groups','members.seniorGroupId','=','senior_groups.id')
            ->where('members.groupId','=',1)
            ->where('members.seniorGroupId','=',$id)
            // ->where('members.status_accept','=',1)
            ->where('members.confirmed_at', '!=', null)
            ->where('member_details.statusId',3)
            ->where('member_details.fixStatus','=',1)
            ->where(function ($query) {
                $query->where('members.deleted_at',NULL)
                ->where('member_details.deleted_at',NULL);
            })
            ->select('senior_groups.groupName','members.seniorGroupId','members.nameTitle','members.firstname','members.lastname','members.candidateNumber','member_details.nowRole','member_details.nowWork')
            ->orderBy('members.seniorGroupId')
            ->orderBy('members.candidateNumber')
            ->get();

            // dd($list1);

            if(!empty($list1)){

                $this->genPDF1($id);

                $filename="seniorCandidateAll".$id;

                $group=1;

                if(count($list1)>0){
                    $groupname=$list1[0]->groupName;
                }else{
                    $groupname="";
                }

                return view('backend.approve.wordNumber',compact('list1','filename','group','groupname'));
            }else{
                return back();
            }
        } else {
            return redirect('/backend/home');
        }
    }

    public function uploadPDF(Request $request, $id){

        // request()->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);

        if (Auth::guard('admin')->user()->can('approve_professional')) {

            if($request->hasFile('txtpdf')){
                $name=in_array($request->txtpdf->getClientOriginalExtension(),['pdf']);

                if($name=="true"){
                    $size = \File::size($request->txtpdf);

                    if(($size/1000000)<=20){
                        $filename = "SeniorCompletePDF".$id.".pdf";
                        \Request::file('txtpdf')->move(public_path('pdf/doc'), $filename);

                        $list = GroupSN::find($id);
                        $list->pdf_complete = "pdf/doc/SeniorCompletePDF".$id.".pdf";
                        $list->statusmail = NULL;
                        $list->sendmail_date=NULL;
                        $list->update();
                        \Session::flash('success','อัพโหลดไฟล์ pdf เรียบร้อยแล้ว');
                    }else{
                        \Session::flash('warning','ไฟล์ pdf ต้องมีขนาดไม่เกิน 20MB');
                    }
                }else{
                    \Session::flash('warning','กรุณาเลือก ไฟล์นามสกุล pdf เท่านั้น');
                }
            }else{
                \Session::flash('warning','กรุณาเลือกไฟล์ที่ต้องการอัพโหลด!!!');
            }
            return back();
        } else {
            return redirect('/backend/home');
        }
    }

    public function delcompletePDF($id)
    {
        if (Auth::guard('admin')->user()->can('approve_professional')) {

            $list = GroupSN::find($id);
            $list->pdf_complete = NULL;

            if($list->update()){
                \Session::flash('success','ลบไฟล์ pdf เรียบร้อยแล้ว');
            }else{
                \Session::flash('error','ลบไฟล์ไม่ได้!!!');
            }
            return back();

        } else {
            return redirect('/backend/home');
        }
    }
}
