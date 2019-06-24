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

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class ApproveSNController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // if(session('admin.id')==NULL){return redirect('backend/theme-build');}
        $input = \Request::all();
       //dd($input['txtgroup']);

        // $listprovince=Province::select('province_code','province')->groupBy('province_code','province')->orderBy('province')->get();
        $listprovince=Province::orderBy('province')->get();
        $listgroupsn=GroupSN::get();
        $liststatus=Statuses::get();
        // $listreason=reason::get();

        $list=MemberDetail::join('members','members.id','=','member_details.memberId');
        $list->join('statuses','member_details.statusId','=','statuses.id');
        $list->join('province','member_details.provinceId','=','province.provinceId');
        $list->join('senior_groups', 'members.seniorgroupId', '=', 'senior_groups.id');
        $list->join('users', 'member_details.adminId', '=', 'users.id');
        $list->select('member_details.reason','members.id','member_details.docId','member_details.zipFile','members.nameTitle','members.firstname','members.lastname','statuses.id as statusid','statuses.status','province.province','senior_groups.groupName','users.username');
        $list->where('members.groupId','=',1);

        if(!empty($input['txtname'])){
            $list->where('members.firstname','like',"%".$input['txtname']."%");
            $list->orwhere('members.lastname','like',"%".$input['txtname']."%");
            $list->orwhere('member_details.docId','like',"%".$input['txtname']."%");
        }

        if(!empty($input['txtgroup'])){
            $countgroup=count($input['txtgroup']);
            for($i=0;$i<$countgroup;$i++){
                if($i==0){
                    $list->where('members.seniorgroupId','=',$input['txtgroup'][0]);
                }else{
                    $list->orwhere('members.seniorgroupId','=',$input['txtgroup'][$i]);
                }
            }
        }else{$countgroup=0;}

        if(!empty($input['txtstatus'])){
            $countstatus=count($input['txtstatus']);
            for($i=0;$i<$countstatus;$i++){
                if($i==0){
                    $list->where('member_details.statusId','=',$input['txtstatus'][0]);
                }else{
                    $list->orwhere('member_details.statusId','=',$input['txtstatus'][$i]);
                }
            }
        }else{$countstatus=0;}

        if(!empty($input['txtprovince'])){
            $countprovince=count($input['txtprovince']);
            for($i=0;$i<$countprovince;$i++){
                if($i==0){
                    $list->where('province.province','=',$input['txtprovince'][0]);
                }else{
                    $list->orwhere('province.province','=',$input['txtprovince'][$i]);
                }
            }
        }else{$countprovince=0;}
        //$list->orderBy('province.province')->orderBy('senior_groups.groupName')->orderBy('members.firstname')->orderBy('members.lastname');
        $list->orderBy('members.id');
        $listmember= $list->paginate(10)->appends($input);

        //$listmember=MemberDetail::all();

        return view('/backend/approve/snApprove',compact('listprovince','listgroupsn','liststatus','listmember','countprovince','countstatus','countgroup'));
    }

    public function editstatus()
    {
        $input = \Request::all();

        if($input['txtstatuschange'][0]==3){

            $list2=MemberDetail::join('members','members.id','=','member_details.memberId')
            ->select('members.candidateNumber')
            ->where('members.groupId','=',1)
            ->where('member_details.statusId','=',3)
            ->orderBy('members.candidateNumber','DESC')->first();

            $newnumber=$list2->candidateNumber+1;

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

        // flash('บันทึกเรียบร้อย')->success();

        if($list->update() and $list3->update()){
            \Session::flash('success','แก้ไขสถานะเรียบร้อยแล้ว');
            if($input['txtstatuschange']==3){
                $this->mail($input['Hid'][0],3);
            }
        }else{
            \Session::flash('error','แก้ไขสถานะไม่ได้!!!');
        }
        // return redirect('/backend/approve/snApprove');
        return back();
    }

    public function editnotpass()
    {
        $input = \Request::all();

        $list = MemberDetail::find($input['Hidmember'][0]);
        $list->reason = $input['txtreason'][0];
        $list->statusId = 4;

        if($list->update()){
            \Session::flash('success','แก้ไขสถานะเรียบร้อยแล้ว');
             $this->mail($input['Hidmember'][0],4);

        }else{
            \Session::flash('error','แก้ไขสถานะไม่ได้!!!');
        }

        // return redirect('/backend/approve/snApprove');
        return back();
    }

    public function mail($id,$status)
    {

        $list1 = Member::findOrFail($id);
        $list2 = Memberdetail::findOrFail($id);

        $title= 'ผลการอนุมัติผู้สมัคร ผู้ทรงคุณวุฒิ';

        if($status==3){
            $data = $list1->nameTitle.$list1->firstname.' '.$list1->lastname.' ผ่านการอนุมัติ';
        }elseif($status==4){
            $data = $list1->nameTitle.$list1->firstname.' '.$list1->lastname.' ไม่ผ่านการอนุมัติ เหตุผลไม่ผ่านเนื่องจาก '.$list2->reason;
        }

        // Mail::send($title, $data, function ($message) {
        // $message->from('nat@2fellows.com', 'admin');
        // $message->to('julaluckw@gmail.com');
        // });

        // Mail::send('แจ้งซ่อม/แจ้งปัญหา', $data, function ($message) {
        //     $message->from('{{$senderEmail}}', '$senderName');
        //     $message->to('webmaster@bb.co.th');
        //     });
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
}
