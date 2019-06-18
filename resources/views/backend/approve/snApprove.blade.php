@extends('backend.theme.master')
@section('title','NHC ADMIN')
@section('loginname','สวัสดี A')

<script>
    var select_element;
    function editstatus(id, element){
        select_element = element
        var status = document.getElementsByName('txtstatuschange[]')[id].value;
        console.log(status)
        //var b = document.getElementsByName('Hid[]')[id].value;
        if(status==4){
            document.getElementById('gotomodal').click();
        }else{
            document.getElementsByName('frmstatuschange[]')[id].submit();
        }

      // alert(id+" idstatus="+a+" id="+b);
    }

    /*function NewWindow(mypage,myname,w,h,scroll){
        var win = null;
        LeftPosition = (screen.width) ? (screen.width-w)/2 : 0;
        TopPosition = (screen.height) ? (screen.height-h)/2 : 0;
        settings =
        'height='+h+',width='+w+',top='+TopPosition+',left='+LeftPosition+',scrollbars='+scroll+',resizable'
        win = window.open(mypage,myname,settings)
    }*/

</script>

@section('content')
{{--  [ <a href="function_query_repor_print.php" onClick="NewWindow(this.href,'name','400','400','yes');return false">คลิก</a> ]  --}}

<div class="card border-info mb-3">

    <div class="card-header">
        <strong>อนุมัติผู้สมัคร ผู้ทรงคุณวุฒิ</strong>
    </div>
    <div class="card-body">
        @if(session('flash_message')=="ok")
            {{-- <div class="alert alert-success alert-dismissible fade show"><span class="glyphicon glyphicon-ok"></span><em> {!! session('flash_message') !!}</em></div> --}}
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="glyphicon glyphicon-ok"></span><i>แก้ไขสถานะเรียบร้อยแล้ว</i>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>


        @elseif(session('flash_message')=="not")
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <span class="glyphicon glyphicon-ok"></span><i>แก้ไขสถานะไม่ได้!!!</i>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        @endif

        <form id="frmsearchapprove" method="post" action="{{url('backend/approve/index')}}">
        {{ csrf_field() }}
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="txtname">ค้นหาจาก : </label>
                <input class="form-control" @if(request()->input('ok')=="1") value="{{request()->input('txtname')}}" @else value="" @endif
                name="txtname" id="txtname" placeholder="ค้นหาชื่อ, สกุล หรือรหัสเอกสาร">
                </div>

                <div class="form-group col-md-6">
                <label for="txtgroup">กลุ่มย่อย : </label>
                <select id="txtgroup" name="txtgroup[]" class="js-example-basic-multiple form-control" multiple="multiple">

                    @foreach ($listgroupsn as $valgroup)
                    {{--  <option @if(request()->input('txtgroup')!=null && request()->input('ok')=="1" && request()->input('txtgroup') == $valgroup->id) selected @endif
                    value={{$valgroup->id}}>{{$valgroup->groupName}}</option>  --}}
                        <option
                            @for($i=0;$i<$countgroup;$i++)
                                @if(request()->input('txtgroup')[$i]!=null && request()->input('ok')=="1" && request()->input('txtgroup')[$i] == $valgroup->id)
                                selected
                                @endif
                            @endfor
                        value={{$valgroup->id}}>{{$valgroup->groupName}}</option>
                    @endforeach
                </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtprovince">จังหวัด : </label>
                    <select id="txtprovince" class="js-example-basic-multiple form-control" name="txtprovince[]" multiple="multiple">
                        {{--  <option value="" selected>จังหวัด ...</option>  --}}
                        @foreach ($listprovince as $valprovince)
                        <option
                            @for($i=0;$i<$countprovince;$i++)
                                @if(request()->input('txtprovince')[$i]!=null && request()->input('ok')=="1" && request()->input('txtprovince')[$i] == $valprovince->province)
                                selected
                                @endif
                            @endfor
                        value={{$valprovince->province}}>{{$valprovince->province}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="txtstatus">สถานะ : </label>
                    <select id="txtstatus" name="txtstatus[]" class="js-example-basic-multiple form-control" multiple="multiple">
                        @foreach ($liststatus as $valstatus)
                            <option
                                @for($i=0;$i<$countstatus;$i++)
                                    @if(request()->input('txtstatus')[$i]!=null && request()->input('ok')=="1" && request()->input('txtstatus')[$i] == $valstatus->id)
                                    selected
                                    @endif
                                @endfor
                            value={{$valstatus->id}}>{{$valstatus->status}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <button id="ok" name="ok" type="submit" value="1" class="btn btn-primary">ค้นหา</button>&nbsp
                <button id="clear" name="clear" type="submit" value="2" class="btn btn-warning" onclick="">ล้างข้อมูล</button>
            </div>

        </form>
        <hr>
        <div>

            @if($listmember->isEmpty())
                <h3 class="d-flex justify-content-center">ไม่มีข้อมูล</h3>
            @else
                <table class="table table-striped table-bordered">
                    <tr align="middle">
                        <th>ลำดับ</th>
                        <th>รหัสเอกสาร</th>
                        <th>ชื่อ - สกุล</th>
                        <th>กลุ่มย่อย</th>
                        <th>จังหวัด</th>
                        <th>ดาวน์โหลด</th>
                        <th>สถานะ</th>
                        <th>ผู้ที่ตรวจสอบ</th>
                    </tr>
                    @foreach ($listmember as $key=>$valmember)
                        <tr>
                        <td align="middle">{{$valmember->id}}</td>
                        <td align="middle">{{$valmember->docId}}</td>
                        {{--  <td>{{$valmember->member->firstname}}  {{$valmember->member->lastname}}</td>
                        <td>{{$valmember->statuses->status}}</td>--}}
                        <td>{{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}</td>
                        <td>{{$valmember->groupName}}</td>
                        <td>{{$valmember->province}}</td>
                        <td align="middle"><a href="{{ asset('uploads/'.$valmember->zipFile) }}"><button type="button" class="btn btn-primary">ดาวน์โหลด</button></a></td>
                        {{-- <td>{{$valmember->status}}</td> --}}
                        <td>
                            <form name="frmstatuschange[]" action="{{url('backend/approve/editstatus')}}">
                                <select data-default="{{$valmember->statusid}}" name="txtstatuschange[]" class="form-control" onchange="editstatus('{{$key}}', this);">
                                    @foreach ($liststatus as $valstatus)
                                    <option @if($valmember->status!=null && $valmember->statusid == $valstatus->id) selected @endif
                                    value={{$valstatus->id}}>{{$valstatus->status}}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="Hid[]" id="Hid" value={{$valmember->id}}>
                            </form>

                            {{--  //modal สถานะไม่ผ่าน  --}}
                            <div id="m-editstatus" class="modal fade" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">
                                                {{--  <div class="col-sm-6 b-r"><h3 class="m-t-none m-b">กำหนดเหตุผลสถานะไม่ผ่าน</h3>  --}}
                                                <div class="col-sm-12"><h3 class="m-t-none m-b">กำหนดเหตุผลสถานะไม่ผ่าน</h3>
                                                    {{--  <p>Sign in today for more expirience.</p>  --}}

                                                    <form method="post">
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">เหตุผลสถานะไม่ผ่าน :</label>
                                                            <div class="form-check">
                                                            @if(!$listreason->isEmpty())
                                                                @foreach($listreason as $valreason)
                                                                    <div class="i-checks">
                                                                    <input type="checkbox" name="chkreason" class="form-check-input" value={{$valreason->id}}>
                                                                    <label class="form-check-label" for="chkreason">{{$valreason->notPassReason}}</label>
                                                                    </div><br>
                                                                @endforeach
                                                            @endif
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="reset" class="btn btn-secondary">ล้างข้อมูล</button>
                                                            <button type="submit" class="btn btn-primary">บันทึก</button>
                                                        </div>
                                                    </form>
                                                </div>
                                                {{--  <div class="col-sm-6"><h4>Not a member?</h4>
                                                    <p>You can create an account:</p>
                                                    <p class="text-center">
                                                        <a href=""><i class="fa fa-sign-in big-icon"></i></a>
                                                    </p>
                                            </div>  --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{--  //end modal  --}}

                        </td>
                        <td>{{$valmember->username}}</td>
                        </tr>
                    @endforeach
                </table>
                <div class="d-flex justify-content-center"><h3>{{ $listmember->links() }} </h3></div>
            @endif
        </div>
    </div>
</div>

<a data-toggle="modal" id="gotomodal" href="#m-editstatus"> test </a>

{{--  <div class="text-center">
    <a data-toggle="modal" class="btn btn-primary" href="#m-editstatus">Form in simple modal box</a>
</div>  --}}



@endsection

@section('js')

<script>
    $(function(){
        $('.js-example-basic-multiple').select2({
        maximumSelectionLength: 3
        });

        $('#m-editstatus').on('hidden.bs.modal', function() {
            console.log($(select_element).val($(select_element).data('default')))
        });

    });

    {{--  $(document).ready(function() {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 2000
        };
        toastr.success('aaaaaaaaa', 'Welcome to NHC Application Builder');
    });  --}}
</script>

@endsection


