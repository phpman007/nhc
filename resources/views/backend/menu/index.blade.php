@extends('backend.theme.master')
@section('title','NHCO ADMIN')

@section('content')
<div class="card border-info mb-3">

    <div class="card-header">
        <strong>การจัดการเมนู</strong>
        <div style="float: right;">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        <span><i class="fa fa-plus-circle mr-1"></i> เพิ่มเมนู</span>
                </button>
                <form action="{{route('backend.menu.resort')}}" method="post" style="display:inline;">
                    <input type="hidden" id="inputSidebar" name="sidebar">
                    <input type="hidden" id="inputMain" name="main">
                        <button type="submit" class="btn btn-primary" >
                                <span><i class="glyphicon glyphicon-refresh"></i> บันทึกการเรียงลำดับ</span>
                        </button>
                </form>

        </div>

    </div>

    <div class="card-body">
        <div class="page-inner">

            <!-- .page-section -->
            <div class="page-section">



                <!-- grid row -->
                <div class="row">
                    <!-- grid column -->
                    <div class="col-lg-6">
                        เมนูหน้าบ้าน

                          <div class="dd dd-main">
                             <ol class="dd-list">
                                 @foreach ($items['main'] as $item)
                                 <li class="dd-item" data-id="{{$item->id}}">
                                     <div class="dd-handle">
                                            <div><span class="drag-indicator"></span>{{$item->menu_title}}</div>
                                            <div class="dd-nodrag btn-group ml-auto">
                                                <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#{{$item->id}}Modal">Edit</button>
                                                <button class="btn btn-sm btn-danger destroy" type="button" data-id="{{$item->id}}"><i class="glyphicon glyphicon-trash"></i></button>
                                            </div>
                                     </div>
                                     @if(!$item->parent->isEmpty())
                                      <ol class="dd-list">
                                            @foreach ($item->parent as $parent)
                                            <li class="dd-item" data-id="{{$parent->id}}">
                                                <div class="dd-handle">
                                                    <div><span class="drag-indicator"></span>{{$parent->menu_title}}</div>
                                                    <div class="dd-nodrag btn-group ml-auto">
                                                        <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#{{$parent->id}}Modal">Edit</button>
                                                        <button class="btn btn-sm btn-danger destroy" type="button" data-id="{{$parent->id}}"><i class="glyphicon glyphicon-trash"></i></button>
                                                    </div>
                                                </div>
                                                @if(!$parent->parent->isEmpty())
                                                <ol class="dd-list">
                                                    @foreach ($parent->parent as $underparent)
                                                        <li class="dd-item" data-id="{{$underparent->id}}">
                                                            <div class="dd-handle">
                                                                <div><span class="drag-indicator"></span>{{$underparent->menu_title}}</div>
                                                                <div class="dd-nodrag btn-group ml-auto">
                                                                    <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#{{$underparent->id}}Modal">Edit</button>
                                                                    <button class="btn btn-sm btn-danger destroy" type="button" data-id="{{$underparent->id}}"><i class="glyphicon glyphicon-trash"></i></button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ol>


                                                @endif
                                            </li>
                                            @endforeach

                                     </ol>
                                     @endif
                                 </li>
                                 @endforeach


                             </ol>
                         </div>

                    </div>
                    <!-- /grid column -->
                     <!-- grid column -->
                     <div class="col-lg-6">
                         เมนูหลังบ้าน


                         <div class="dd dd-sidebar">
                             <ol class="dd-list">
                                 @foreach ($items['sidebar'] as $item)
                                 <li class="dd-item" data-id="{{$item->id}}">
                                     <div class="dd-handle">
                                            <div><span class="drag-indicator"></span>{{$item->menu_title}}</div>
                                            <div class="dd-nodrag btn-group ml-auto">
                                                <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#{{$item->id}}Modal">Edit</button>
                                                <button class="btn btn-sm btn-danger destroy" type="button" data-id="{{$item->id}}"><i class="glyphicon glyphicon-trash"></i></button>
                                            </div>
                                     </div>
                                     @if(!$item->parent->isEmpty())
                                      <ol class="dd-list">
                                            @foreach ($item->parent as $parent)
                                            <li class="dd-item" data-id="{{$parent->id}}">
                                                <div class="dd-handle">
                                                    <div><span class="drag-indicator"></span>{{$parent->menu_title}}</div>
                                                    <div class="dd-nodrag btn-group ml-auto">
                                                        <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#{{$parent->id}}Modal">Edit</button>
                                                        <button class="btn btn-sm btn-danger destroy" type="button" data-id="{{$parent->id}}"><i class="glyphicon glyphicon-trash"></i></button>
                                                    </div>
                                                </div>
                                                @if(!$parent->parent->isEmpty() != null)
                                                <ol class="dd-list">
                                                    @foreach ($parent->parent as $underparent)
                                                        <li class="dd-item" data-id="{{$underparent->id}}">
                                                            <div class="dd-handle">
                                                                <div><span class="drag-indicator"></span>{{$underparent->menu_title}}</div>
                                                                <div class="dd-nodrag btn-group ml-auto">
                                                                    <button class="btn btn-sm btn-primary" type="button" data-toggle="modal" data-target="#{{$underparent->id}}Modal">Edit</button>
                                                                    <button class="btn btn-sm btn-danger destroy" type="button" data-id="{{$underparent->id}}"><i class="glyphicon glyphicon-trash"></i></button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ol>


                                                @endif
                                            </li>
                                            @endforeach

                                     </ol>
                                     @endif
                                 </li>
                                 @endforeach


                             </ol>
                         </div>

                     </div>
                     <!-- /grid column -->
                </div>
                <!-- /grid row -->

            </div>
            <!-- /.page-section -->
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <form action="{{ route('backend.menu.store') }}" method="POST">

                    {{ csrf_field() }}
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มเมนู</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                            <div class="form-group">
                                <label for="menu name">ชื่อเมนู</label>
                                <input type="text" class="form-control" required name="menu_title"  >

                            </div>
                            <div class="form-group">
                                    <label for="">เมนูไอคอน</label>
                                    <input type="text" name="menu_icon" class="form-control"  >
                                    <small  class="form-text text-muted" >เลือกไอคอน <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">fontawesome</a> </small>

                            </div>
                            <div class="form-group">
                                <label for="">ลิงค์</label>
                                <input type="text" name="menu_link" required class="form-control"  >
                                <small class="form-text text-muted">external : https://www.example.co.th internal : /backend/example</small>
                            </div>
                            <div class="form-group">
                                    <label for="">ประเภทลิงค์</label>
                                    <select name="menu_link_type" required class="form-control">
                                            <option >-- กรุณาเลือก --</option>
                                            <option value="internal">internal</option>
                                            <option value="external">external</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                    <label for="">ประเภทการแสดง</label>
                                    <select name="menu_type" required class="form-control">
                                            <option >-- กรุณาเลือก --</option>
                                            <option value="main">เมนูหน้าบ้าน</option>
                                            <option value="sidebar">เมนูหลังบ้าน</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                    <label for="">target</label>
                                    <select name="menu_target" required class="form-control">
                                            <option >-- กรุณาเลือก --</option>
                                            <option value="#">#</option>
                                            <option value="_self">_self</option>
                                            <option value="_blank">_blank</option>
                                            <option value="_parent">_parent</option>
                                            <option value="_top">_top</option>
                                    </select>
                            </div>
                            <div class="form-group">
                                    <label for="">การเผยแพร่</label>
                                    <select name="menu_state" class="form-control">
                                            <option value="1">เผยแพร่ </option>
                                            <option value="0">ไม่เผยแพร่</option>
                                    </select>
                            </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>
                </form>
        </div>
    </div>
</div>
@foreach ($items['all'] as  $menuAll)
<div class="modal fade" id="{{$menuAll->id}}Modal" tabindex="-1" role="dialog" aria-labelledby="{{$menuAll->id}}ModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('backend.menu.update') }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$menuAll->id}}">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="{{$menuAll->id}}ModalLabel">แก้ใขเมนู</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="menu name">ชื่อเมนู</label>
                    <input type="text" class="form-control" name="menu_title" value="{{$menuAll->menu_title}}">

                </div>
                <div class="form-group">
                    <label for="">เมนูไอคอน</label>
                    <input type="text" name="menu_icon" value="{{$menuAll->menu_icon}}" class="form-control">
                    <small class="form-text text-muted">เลือกไอคอน <a target="_blank"
                            href="https://fontawesome.com/v4.7.0/icons/">fontawesome</a> </small>

                </div>
                <div class="form-group">
                    <label for="">ลิงค์</label>
                    <input type="text" name="menu_link" class="form-control" value="{{$menuAll->menu_link}}">
                    <small class="form-text text-muted">external : https://www.example.co.th internal : /backend/example</small>
                </div>
                <div class="form-group">
                    <label for="">ประเภทลิงค์</label>
                    <select name="menu_link_type" class="form-control">
                        <option {{$menuAll->menu_link_type == 'internal'?'selected':''}} value="internal">internal</option>
                        <option {{$menuAll->menu_link_type == 'external'?'selected':''}} value="external">external</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">ประเภทการแสดง</label>
                    <select name="menu_type" class="form-control">
                        <option {{$menuAll->menu_type == 'main'?'selected':''}} value="main">เมนูหน้าบ้าน</option>
                        <option {{$menuAll->menu_type == 'sidebar'?'selected':''}} value="sidebar">เมนูหลังบ้าน</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">target</label>
                    <select name="menu_target" class="form-control">
                        <option {{$menuAll->menu_target == '#'?'selected':''}} value="#">#</option>
                        <option {{$menuAll->menu_target == '_blank'?'selected':''}} value="_blank">_blank</option>
                        <option {{$menuAll->menu_target == '_self'?'selected':''}} value="_self">_self</option>
                        <option {{$menuAll->menu_target == '_parent'?'selected':''}} value="_parent">_parent</option>
                        <option {{$menuAll->menu_target == '_top'?'selected':''}} value="_top">_top</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">การเผยแพร่</label>
                    <select name="menu_state" class="form-control">
                        <option {{$menuAll->menu_state == 1?'selected':''}} value="1">เผยแพร่ </option>
                        <option {{$menuAll->menu_state == 0?'selected':''}} value="0">ไม่เผยแพร่</option>
                    </select>
                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                <button type="submit" class="btn btn-primary">บันทึก</button>
            </div>
        </div>
        </form>
    </div>
</div>
@endforeach
@stop
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js"></script>
<script>
    $(function(){
        $('.dd-sidebar').nestable({
        maxDepth:3,
        callback: function(l,e){
            $('#inputSidebar').val(JSON.stringify($('.dd-sidebar').nestable('serialize')));
            $('#inputMain').val(JSON.stringify($('.dd-main').nestable('serialize')));

            }
        });
        $('.dd-main').nestable({
            maxDepth:3,
            callback: function(l,e){
                $('#inputMain').val(JSON.stringify($('.dd-main').nestable('serialize')));
                $('#inputSidebar').val(JSON.stringify($('.dd-sidebar').nestable('serialize')));
            }
        });

    });


    $('.destroy').click(function(){
        var id = $(this).data('id');
        $.ajax({
            url:'{{route('backend.menu.destroy')}}',
            type:'post',
            data:{id:id},
            success:function(res){
                location.reload();
            }
        })
    });
    @if(Session::has('success'))
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 2000
    };
    toastr.success("{{ Session::get('success') }}", "");
    @endif

    @if(Session::has('error'))
    toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 2000
    };
    toastr.error("{{ Session::get('error') }}", "");
    @endif
</script>



@endsection
