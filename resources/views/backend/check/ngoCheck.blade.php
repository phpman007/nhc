@extends('backend.theme.master')
@section('title','NHC ADMIN')
@section('loginname','สวัสดี A')

 <script>

    // function editstatus(id){
        //var a = document.getElementsByName('txtstatuschange[]')[id].value;
        //var b = document.getElementsByName('Hid[]')[id].value;
        // var a = document.getElementsByName('frmstatuschange[]')[id].submit();
      // alert(id+" idstatus="+a+" id="+b);
    // }

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
        <strong>ตรวจสอบหลักฐาน ผู้แทนองค์กรภาคเอกชน</strong>
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

        <form id="frmsearchngocheck" method="post" action="{{url('backend/check/ngoCheck')}}">
        {{ csrf_field() }}
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="txtname">ค้นหาจาก : </label>
                <input class="form-control" @if(request()->input('ok')=="1") value="{{request()->input('txtname')}}" @else value="" @endif
                name="txtname" id="txtname" placeholder="ค้นหาชื่อ, สกุล หรือรหัสเอกสาร">
                </div>
                <div class="form-group col-md-6">
                <label for="txtgroup">กลุ่มย่อย : </label>
                <select id="txtgroup" name="txtgroup" class="form-control">
                        <option value="" selected>กรุณาเลือก ...</option>
                        @foreach ($listgroupngo as $valgroup)
                        <option @if(request()->input('txtgroup')!=null && request()->input('ok')=="1" && request()->input('txtgroup') == $valgroup->id) selected @endif
                        value={{$valgroup->id}}>{{$valgroup->groupName}}</option>
                        @endforeach
                </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="txtprovince">จังหวัด : </label>
                    <select id="txtprovince" class="js-example-basic-multiple form-control" name="txtprovince[]" multiple="multiple">
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
                    <select id="txtstatus" name="txtstatus" class="form-control">
                        <option value="" selected>สถานะ ...</option>
                        @foreach ($liststatus as $valstatus)
                        <option @if(request()->input('txtstatus')!=null && request()->input('ok')=="1" && request()->input('txtstatus') == $valstatus->id) selected @endif
                        value={{$valstatus->id}}>{{$valstatus->status}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <button id="ok" name="ok" type="submit" value="1" class="btn btn-info">ค้นหา</button>&nbsp
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
                        <td align="middle">{{$valmember->nameTitle}}{{$valmember->firstname}}  {{$valmember->lastname}}</td>
                        <td>{{$valmember->groupName}}</td>
                        <td align="middle">{{$valmember->province}}</td>
                        <td align="middle"><a href="{{ asset('uploads/'.$valmember->zipFile) }}"><button type="button" class="btn btn-info">ดาวน์โหลด</button></a></td>
                        <td align="middle">{{$valmember->status}}</td>
                        <td align="middle">{{$valmember->username}}</td>
                        </tr>
                    @endforeach
                </table>
                <div class="d-flex justify-content-center"><h3>{{ $listmember->links() }} </h3></div>
            @endif
        </div>
    </div>
</div>

@endsection

@section('js')
    <script>
    $(function(){
        $('.js-example-basic-multiple').select2({
        maximumSelectionLength: 3
        });
    })
    </script>
@endsection

