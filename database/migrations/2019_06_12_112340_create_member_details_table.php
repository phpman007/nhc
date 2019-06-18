<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('memberId')->comment("เลขที่สมาชิก")->nullable();
            $table->string('docId', 6)->comment("เลขที่เอกสาร")->nullable();

            // information part 1 qulification
            $table->boolean('thaiStatus')->comment("เป็นคนไทย")->nullable();
            $table->boolean('ageQualify')->comment("อายุอยู่ในเกณฑ์")->nullable();
            $table->boolean('enoughAbility')->comment("ไม่ทุพลภาพ")->nullable();
            $table->boolean('noDrug')->comment("ไม่เคยเกี่ยวข้องกับคดียาเสพติด")->nullable();
            $table->boolean('noCriminal')->comment("ไม่ติดคดี")->nullable();
            $table->boolean('noJail')->comment("ไม่เคยติดคุก")->nullable();

            $table->boolean('noNHCworking')->comment("ไม่ได้ดำรงตำแหน่งที่มีส่วนเกี่ยวข้อง")->nullable();
            $table->boolean('enoughExperience')->comment("ประสบการณ์เพียงพอ")->nullable();
            $table->boolean('enoughProfile')->comment("คุณสมบัติตรงตามที่กำหนด")->nullable();

            // information part 2 separated group on members table already
            $table->date('dateOfBirth')->comment("วันเกิด")->nullable();
            $table->integer('genderId')->comment("เพศ")->nullable();
            $table->integer('addressType')->comment("ทีประเภทที่ยู่")->nullable();
            $table->string('no', 10)->comment("เลขที่")->nullable();
            $table->string('moo', 150)->comment("หมู่ที่")->nullable();
            $table->string('soi', 100)->comment("ซอย")->nullable();
            $table->string('street', 100)->comment("ถนน")->nullable();
            $table->integer('subDistrictId')->comment("ตำบล")->nullable();
            $table->integer('districtId')->comment("อำเภอ")->nullable();
            $table->integer('provinceId')->comment("จังหวัด")->nullable();
            $table->string('zipCode', 5)->comment("รหัสไปรษณีย์")->nullable();
            $table->string('tel', 18)->comment("โทรศัพท์บ้าน")->nullable();
            $table->string('mobile', 11)->comment("มือถือ")->nullable();

            // information part 3 graduated
            $table->string('graduated1')->comment("จบการศึกษาจาก1")->nullable();
            $table->string('faculty1')->comment("สาขาที่จบ1")->nullable();
            $table->string('graduated2')->comment("จบการศึกษาจาก2")->nullable();
            $table->string('faculty2')->comment("สาขาที่จบ2")->nullable();
            $table->string('graduated3')->comment("จบการศึกษาจาก3")->nullable();
            $table->string('faculty3')->comment("สาขาที่จบ3")->nullable();
            $table->string('graduated4')->comment("จบการศึกษาจาก4")->nullable();
            $table->string('faculty4')->comment("สาขาที่จบ4")->nullable();
            $table->string('graduated5')->comment("จบการศึกษาจาก5")->nullable();
            $table->string('faculty5')->comment("สาขาที่จบ5")->nullable();

            // information part 4 working
            $table->string('nowWork')->comment("ปัจจุบันทำงาน")->nullable();
            $table->string('nowWorkPlace', 255)->comment("สถานที่ทำงานปัจจุบัน")->nullable();
            $table->string('nowRole', 150)->comment("ตำแหน่งปัจจุบัน")->nullable();
            $table->string('pastWork1')->comment("ประวัติการทำงาน1")->nullable();
            $table->string('pastOrganization1', 255)->comment("สถานที่ทำงาน1")->nullable();
            $table->string('time1', 100)->comment("ตำแหน่ง1")->nullable();
            $table->string('pastWork2')->comment("ประวัติการทำงาน2")->nullable();
            $table->string('pastOrganization2', 255)->comment("สถานที่ทำงาน2")->nullable();
            $table->string('time2', 100)->comment("ตำแหน่ง2")->nullable();
            $table->string('pastWork3')->comment("ประวัติการทำงาน3")->nullable();
            $table->string('pastOrganization3', 255)->comment("สถานที่ทำงาน3")->nullable();
            $table->string('time3', 100)->comment("ตำแหน่ง3")->nullable();
            $table->string('importantMemo')->nullable();

            // information part 5 files
            $table->string('vision')->comment("วิสัยทัศน์")->nullable();
            $table->integer('statusId')->comment("สถานะ 4 แบบ รอการตรวจสอบ,อยู่ระหว่าง,ผ่าน,ไม่ผ่าน")->nullable();
            $table->integer('adminId')->comment("เลขที่แอดมิน")->nullable();
            $table->integer('reason')->comment("เหตุผลที่ไม่ผ่าน")->nullable();

            // information part 6 more information for organization group
            $table->integer('provinceMemberID')->comment("จังหวัดสมาชิก")->nullable();
            $table->integer('section')->comment("เขต")->nullable();
            $table->integer('organizationGroupId')->comment("ประเภทกลุ่มองค์กรอิสระ")->nullable();
            $table->string('officialId', 20)->comment("เลขที่บัตรข้าราชการ")->nullable();
            $table->text('portfolio')->comment("ผลงานที่ผ่านมา")->nullable();
            $table->string('roleTimeLeft', 100)->comment("ระยะเวลาที่เหลืออยู่ในตำแหน่ง")->nullable();
            $table->date('startDate')->comment("วันที่เริ่มทำงานตำแหน่งดังกล่าว")->nullable();
            $table->date('endDate')->comment("วันสิ้นสุด")->nullable();

            // information part 7 for ngo group
            $table->string('ngoName', 150)->comment("ชื่อองค์กร")->nullable();
            $table->string('ngoStatus')->comment("สถานะ")->nullable();
            $table->text('ngoNo', 10)->comment("เลขที่")->nullable();
            $table->text('ngoMoo', 2)->comment("หมู่ที่")->nullable();
            $table->text('ngoSoi', 50)->comment("ซอย")->nullable();
            $table->text('ngoStreet', 50)->comment("ถนน")->nullable();
            $table->integer('ngoSubDistrictID')->comment("ตำบล")->nullable();
            $table->integer('ngoDistrictID')->comment("อำเภอ")->nullable();
            $table->integer('ngoProvincetID')->comment("จังหวัด")->nullable();
            $table->text('ngoZipCode', 5)->comment("รหัสไปรษณีย์")->nullable();
            $table->date('ngoStartDate')->comment("วันที่เริ่มองค์กร")->nullable();
            $table->integer('ngoQtyMember')->comment("จำนวนสมาชิก")->nullable();
            $table->text('ngoObjective')->comment("วัตถุประสงค์")->nullable();
            $table->string('activity1', 255)->comment("กิจกรรมที่เกี่ยวข้อง1")->nullable();
            $table->text('detail1')->comment("รายละเอียด1")->nullable();
            $table->string('activity2', 255)->comment("กิจกรรมที่เกี่ยวข้อง2")->nullable();
            $table->text('detail2')->comment("รายละเอียด2")->nullable();
            $table->string('suggestNameTitle', 150)->comment("คำนำหน้าชื่อ")->nullable();
            $table->string('suggestFirstname', 50)->nullable();
            $table->string('suggestLastname', 50)->nullable();
            $table->string('suggestFullname', 150)->comment("ชื่อเต็มผู้ที่องค์กรเสนอชื่อ")->nullable();
            $table->string('suggestPosition', 50)->comment("ตำแหน่ง")->nullable();

            // information part 8 files
            $table->string('personalIdCard', 255)->comment("บัตรประชาชน")->nullable();
            $table->string('memberImg', 255)->comment("รูปหน้าตรง")->nullable();
            $table->string('sorChor1', 255)->comment("เอกสารสช.1")->nullable();

            $table->string('ngoConfirmDoc', 255)->comment("สำเนาเอกสารรับรองความเป็นนิติบุคคล")->nullable();
            $table->string('ngoObjectiveDoc', 255)->comment("สำเนาวัตถุประสงค์ในการก่อตั้ง")->nullable();
            $table->string('ngoActivityDoc', 255)->comment("สำเนากิจกรรม")->nullable();
            $table->string('ngoOrderDoc', 255)->comment("คำสั่งแต่งตั้ง")->nullable();
            $table->string('ngoPresidentIdCard', 255)->comment("บัตรประชาชนของประธานองค์กร")->nullable();
            $table->string('ngoSignatureDoc', 255)->comment("สำเนาเอกสารลงลายมือชื่อ")->nullable();

            $table->string('ngoApproveDoc', 255)->comment("หนังสือรับรององค์กร")->nullable();

            $table->string('zipFile', 255)->comment("ไฟล์บีบอัด")->nullable();

            $table->timestamps()->nullable();
            $table->softDeletes()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_details');
    }
}
