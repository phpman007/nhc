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
            $table->string('memberId')->comment("เลขที่สมาชิก");
            $table->string('docId', 6)->comment("เลขที่เอกสาร");

            // information part 1 qulification
            $table->boolean('thaiStatus')->comment("เป็นคนไทย");
            $table->boolean('ageQualify')->comment("อายุอยู่ในเกณฑ์");
            $table->boolean('enoughAbility')->comment("ไม่ทุพลภาพ");
            $table->boolean('noDrug')->comment("ไม่เคยเกี่ยวข้องกับคดียาเสพติด");
            $table->boolean('noCriminal')->comment("ไม่ติดคดี");
            $table->boolean('noJail')->comment("ไม่เคยติดคุก");

            $table->boolean('noNHCworking')->comment("ไม่ได้ดำรงตำแหน่งที่มีส่วนเกี่ยวข้อง");
            $table->boolean('enoughExperience')->comment("ประสบการณ์เพียงพอ");
            $table->boolean('enoughProfile')->comment("คุณสมบัติตรงตามที่กำหนด");

            // information part 2 separated group on members table already
            $table->date('dateOfBirth')->comment("วันเกิด");
            $table->integer('genderId')->comment("เพศ");
            $table->integer('addressType')->comment("ทีประเภทที่ยู่");
            $table->string('no', 10)->comment("เลขที่");
            $table->string('moo', 150)->comment("หมู่ที่");
            $table->string('soi', 100)->comment("ซอย");
            $table->string('street', 100)->comment("ถนน");
            $table->integer('subDistrictId')->comment("ตำบล");
            $table->integer('districtId')->comment("อำเภอ");
            $table->integer('provinceId')->comment("จังหวัด");
            $table->string('zipCode', 5)->comment("รหัสไปรษณีย์");
            $table->string('tel', 18)->comment("โทรศัพท์บ้าน");
            $table->string('mobile', 11)->comment("มือถือ");

            // information part 3 graduated
            $table->string('graduated1')->comment("จบการศึกษาจาก1");
            $table->string('faculty1')->comment("สาขาที่จบ1");
            $table->string('graduated2')->comment("จบการศึกษาจาก2");
            $table->string('faculty2')->comment("สาขาที่จบ2");
            $table->string('graduated3')->comment("จบการศึกษาจาก3");
            $table->string('faculty3')->comment("สาขาที่จบ3");
            $table->string('graduated4')->comment("จบการศึกษาจาก4");
            $table->string('faculty4')->comment("สาขาที่จบ4");
            $table->string('graduated5')->comment("จบการศึกษาจาก5");
            $table->string('faculty5')->comment("สาขาที่จบ5");

            // information part 4 working
            $table->string('nowWork')->comment("ปัจจุบันทำงาน");
            $table->string('nowWorkPlace', 255)->comment("สถานที่ทำงานปัจจุบัน");
            $table->string('nowRole', 150)->comment("ตำแหน่งปัจจุบัน");
            $table->string('pastWork1')->comment("ประวัติการทำงาน1");
            $table->string('pastOrganization1', 255)->comment("สถานที่ทำงาน1");
            $table->string('time1', 100)->comment("ตำแหน่ง1");
            $table->string('pastWork2')->comment("ประวัติการทำงาน2");
            $table->string('pastOrganization2', 255)->comment("สถานที่ทำงาน2");
            $table->string('time2', 100)->comment("ตำแหน่ง2");
            $table->string('pastWork3')->comment("ประวัติการทำงาน3");
            $table->string('pastOrganization3', 255)->comment("สถานที่ทำงาน3");
            $table->string('time3', 100)->comment("ตำแหน่ง3");
            $table->string('importantMemo');

            // information part 5 files
            $table->string('vision')->comment("วิสัยทัศน์");
            $table->integer('statusId')->comment("สถานะ 4 แบบ รอการตรวจสอบ,อยู่ระหว่าง,ผ่าน,ไม่ผ่าน");
            $table->integer('adminId')->comment("เลขที่แอดมิน");
            $table->integer('reason')->comment("เหตุผลที่ไม่ผ่าน");

            // information part 6 more information for organization group
            $table->integer('provinceMemberID')->comment("จังหวัดสมาชิก");
            $table->integer('section')->comment("เขต");
            $table->integer('organizationGroupId')->comment("ประเภทกลุ่มองค์กรอิสระ");
            $table->string('officialId', 20)->comment("เลขที่บัตรข้าราชการ");
            $table->text('portfolio')->comment("ผลงานที่ผ่านมา");
            $table->string('roleTimeLeft', 100)->comment("ระยะเวลาที่เหลืออยู่ในตำแหน่ง");
            $table->date('startDate')->comment("วันที่เริ่มทำงานตำแหน่งดังกล่าว");
            $table->date('endDate')->comment("วันสิ้นสุด");

            // information part 7 for ngo group
            $table->string('ngoName', 150)->comment("ชื่อองค์กร");
            $table->string('ngoStatus')->comment("สถานะภาพ");
            $table->text('ngoNo', 10)->comment("เลขที่");
            $table->text('ngoMoo', 2)->comment("หมู่ที่");
            $table->text('ngoSoi', 50)->comment("ซอย");
            $table->text('ngoStreet', 50)->comment("ถนน");
            $table->integer('ngoSubDistrictID')->comment("ตำบล");
            $table->integer('ngoDistrictID')->comment("อำเภอ");
            $table->integer('ngoProvincetID')->comment("จังหวัด");
            $table->text('ngoZipCode', 5)->comment("รหัสไปรษณีย์");
            $table->date('ngoStartDate')->comment("วันที่เริ่มองค์กร");
            $table->integer('ngoQtyMember')->comment("จำนวนสมาชิก");
            $table->text('ngoObjective')->comment("วัตถุประสงค์");
            $table->string('activity1', 255)->comment("กิจกรรมที่เกี่ยวข้อง1");
            $table->text('detail1')->comment("รายละเอียด1");
            $table->string('activity2', 255)->comment("กิจกรรมที่เกี่ยวข้อง2");
            $table->text('detail2')->comment("รายละเอียด2");
            $table->string('suggestNameTitle', 150)->comment("คำนำหน้าชื่อ");
            // $table->string('suggestFirstname', 50);
            // $table->string('suggestLastname', 50);
            $table->string('suggestFullname', 150)->comment("ชื่อเต็มผู้ที่องค์กรเสนอชื่อ");
            $table->string('suggestPosition', 50)->comment("ตำแหน่ง");

            // information part 8 files
            $table->string('personalIdCard', 255)->comment("บัตรประชาชน");
            $table->string('memberImg', 255)->comment("รูปหน้าตรง");
            $table->string('sorChor1', 255)->comment("เอกสารสช.1");

            $table->string('ngoDoc', 255)->comment("สำเนาเอกสารรับรองความเป็นนิติบุคคล");
            $table->string('ngoObject', 255)->comment("สำเนาวัตถุประสงค์ในการก่อตั้ง");
            $table->string('ngoBasis', 255)->comment("สำเนากิจกรรม");
            $table->string('ngoProject', 255)->comment("คำสั่งแต่งตั้ง");
            $table->string('ngoPresidentIdCard', 255)->comment("บัตรประชาชนของประธานองค์กร");
            $table->string('ngoReport', 255)->comment("สำเนาเอกสารลงลายมือชื่อ");

            $table->string('ngoApprove', 255)->comment("หนังสือรับรององค์กร");

            $table->string('zipFile', 255)->comment("ไฟล์บีบอัด");

            $table->timestamps();
            $table->softDeletes();
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
