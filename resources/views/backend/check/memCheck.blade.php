@extends('backend.theme.master')
@section('title','NHC ADMIN')
{{-- @section('loginname','สวัสดี A') --}}
@section('content')
<div class="card border-info mb-3">
    <div class="card-header">
        <strong>ตรวจสอบหลักฐานผู้รับสิทธิ์ลงคะแนน ผู้แทนองค์กรส่วนท้องถิ่น</strong>
    </div>
    <div class="card-body">

        {{-- <form method="GET"> --}}
            {{-- <div class="uk-grid data-uk-grid-margin">
                <div class="uk-width-medium-1-5">
                        <div class="uk-form-row">
                            <label>เลขที่แจ้ง: </label>
                            <input type="text" name="no" class="md-input label-fixed" value="{{request()->input('no')}}">
                        </div>
                </div>
            <div class="uk-width-medium-1-5">
                <div class="uk-form-row">
                    <label>เรื่องที่แจ้ง: </label>
                    <input type="text" name="title" class="md-input label-fixed" value="{{request()->input('title')}}">
            </div></div></div> --}}

            {{-- <div class="row">
                <div class="form-group"><label class="form-check-label">ค้นหาจาก : </label><input type="text" name="txtsearch" class="md-input label-fixed" value="" placeholder="กรุณากรอกชื่อ-สกุล หรือรหัสเอกสาร"></div>
                <div class="form-group">
                    <label class="form-check-label">กลุ่มย่อย : </label>
                        <select>
                            <option value="กลุ่มย่อย 1">กลุ่มย่อย 1</option>
                            <option value="กลุ่มย่อย 2">กลุ่มย่อย 2</option>
                            <option value="กลุ่มย่อย 3">กลุ่มย่อย 3</option>
                            <option value="กลุ่มย่อย 4">กลุ่มย่อย 4</option>
                        </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group"><label class="form-check-label">จังหวัด : </label>
                    <select>
                            <option value="จังหวัด 1">จังหวัด 1</option>
                    </select>
                </div>
                <div class="form-group"><label class="form-check-label">สถานะ : </label>
                    <select>
                        <option value="สถานะ 1">สถานะ 1</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">ค้นหา</button> <button type="reset" class="btn btn-primary">ล้างข้อมูล</button>
        </form>
        <div>
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
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td align="middle"><button type="submit">ดาวน์โหลด</button></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div> --}}

    <form>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">ค้นหาจาก : </label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="กรุณากรอกชื่อ-สกุล หรือรหัสเอกสาร">
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">กลุ่มย่อย : </label>
                <select id="inputState" class="form-control">
                        <option selected>กรุณาเลือก ...</option>
                        <option>...</option>
                </select>
              </div>
            </div>
            <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">จังหวัด : </label>
                      <select id="inputState" class="form-control">
                            <option selected>จังหวัด ...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">สถานะ : </label>
                      <select id="inputState" class="form-control">
                              <option selected>สถานะ ...</option>
                              <option>...</option>
                      </select>

                      {{-- <select class="js-example-basic-multiple" name="states[]" multiple="multiple">
                            <option selected>สถานะ ...</option>
                            <option>...</option>
                      </select> --}}

                    </div>
                  </div>
                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary btn-lg">ค้นหา</button>&nbsp<button type="reset" class="btn btn-primary btn-lg">ล้างข้อมูล</button>
                </div>
          </form>

          <hr>

          <div>
                <table class="table table-striped table-bordered">
                    <tr align="middle">
                        <th>ลำดับ</th>
                        <th>รหัสเอกสาร</th>
                        <th>ชื่อ - นามสกุล</th>
                        <th>กลุ่มย่อย</th>
                        <th>จังหวัด</th>
                        <th>ดาวน์โหลด</th>
                        <th>สถานะ</th>
                        <th>ผู้ที่ตรวจสอบ</th>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td align="middle"><button type="submit">ดาวน์โหลด</button></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>
</div>

{{-- <script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
    });
</script> --}}

@endsection
