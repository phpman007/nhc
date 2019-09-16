<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Backend\Province;
use App\Model\Backend\GroupOR;
use Illuminate\Support\Facades\Redirect;
use App\Model\Backend\election;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class ElectionORController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('admin')->user()->can('set_date_register_organize')) {

            $input = \Request::all();

            $listprovince=Province::orderBy('province')->get();
            $listgroup=GroupOR::get();

            $list=election::join('organization_groups', 'elections.organizationGroupId', '=', 'organization_groups.id');
            $list->select('elections.id','organization_groups.groupName','elections.openDate','elections.endDate','elections.confirmDate','elections.electionDate','elections.openElectionTime','elections.endElectionTime');
            $list->where('elections.groupId','=',2);

            if(!empty($input['txtgroup'])){
                $countgroup=count($input['txtgroup']);
                for($i=0;$i<$countgroup;$i++){
                    if($i==0){
                        $list->where('elections.organizationGroupId','=',$input['txtgroup'][0]);
                    }else{
                        $list->orwhere('elections.organizationGroupId','=',$input['txtgroup'][$i]);
                    }
                }
            }else{$countgroup=0;}

            $listmember= $list->orderBy('elections.id')->paginate(10)->appends($input);

            return view('/backend/election/orSet',compact('listmember','listprovince','listgroup','countgroup'));
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
    public function edit()
    {
        $input = \Request::all();

        if($input['txtdatebegin'][0]==NULL or $input['txtdateend'][0]==NULL or $input['txtdateconfirm'][0]==NULL or $input['txtdateelection'][0]==NULL){
            \Session::flash('warning2');
        }else{
            if(Carbon::createFromFormat('d/m/Y', $input['txtdatebegin'][0])<=Carbon::createFromFormat('d/m/Y', $input['txtdateend'][0]) and Carbon::createFromFormat('d/m/Y', $input['txtdateend'][0])<=Carbon::createFromFormat('d/m/Y', $input['txtdateconfirm'][0]) and Carbon::createFromFormat('d/m/Y', $input['txtdateconfirm'][0])<=Carbon::createFromFormat('d/m/Y', $input['txtdateelection'][0])){

                $dateTH1=explode("/",$input['txtdatebegin'][0]);
                $dateENG1=$dateTH1[2]."-".$dateTH1[1]."-".$dateTH1[0];
                $dateTH2=explode("/",$input['txtdateend'][0]);
                $dateENG2=$dateTH2[2]."-".$dateTH2[1]."-".$dateTH2[0];
                $dateTH3=explode("/",$input['txtdateconfirm'][0]);
                $dateENG3=$dateTH3[2]."-".$dateTH3[1]."-".$dateTH3[0];
                $dateTH4=explode("/",$input['txtdateelection'][0]);
                $dateENG4=$dateTH4[2]."-".$dateTH4[1]."-".$dateTH4[0];

                $list = election::find($input['Hid'][0]);
                $list->openDate = $dateENG1;
                $list->endDate = $dateENG2;
                $list->confirmDate = $dateENG3;
                $list->electionDate = $dateENG4;

                if($list->update()){
                    \Session::flash('success');
                }else{
                    \Session::flash('error');
                }
            }else{
                \Session::flash('warning1');
            }
        }

        // return redirect('/backend/election/orElection');
        return back();
    }

    public function edit3()
    {
        $input = \Request::all();

        if($input['txttimebegin'][0]!="00:00:00" and $input['txttimeend'][0]=="00:00:00"){

            $list = election::find($input['Hid3'][0]);
            $list->openElectionTime = $input['txttimebegin'][0];

            if($list->update()){
                \Session::flash('success');
            }else{
                \Session::flash('error');
            }
        }elseif($input['txttimebegin'][0]=="00:00:00" and $input['txttimeend'][0]!="00:00:00"){

            $list = election::find($input['Hid3'][0]);
            $list->endElectionTime = $input['txttimeend'][0];

            if($list->update()){
                \Session::flash('success');
            }else{
                \Session::flash('error');
            }
        }elseif($input['txttimebegin'][0]!="00:00:00" and $input['txttimeend'][0]!="00:00:00" and $input['txttimebegin'][0]<$input['txttimeend'][0]){

            $list = election::find($input['Hid3'][0]);
            $list->openElectionTime = $input['txttimebegin'][0];
            $list->endElectionTime = $input['txttimeend'][0];

            if($list->update()){
                \Session::flash('success');
            }else{
                \Session::flash('error');
            }
        }else{
            \Session::flash('warning3');
        }

        // return redirect('/backend/election/orElection');
        return back();
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
