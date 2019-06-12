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
            $table->string('memberId');
            $table->string('docId', 6);

            // information part 1 qulification
            $table->boolean('thaiStatus');
            $table->boolean('ageQualify');
            $table->boolean('enoughAbility');
            $table->boolean('noDrug');
            $table->boolean('noCriminal');
            $table->boolean('noJail');
            $table->boolean('noNHCworking');
            $table->boolean('enoughTime');
            $table->boolean('enoughProfile');

            // information part 2 separated group on members table already
            $table->date('dateOfBirth');
            $table->integer('genderId');
            $table->integer('addressType');
            $table->string('no', 10);
            $table->string('village', 150);
            $table->string('soi', 100);
            $table->string('street', 100);
            $table->integer('subDistrictId');
            $table->integer('districtId');
            $table->integer('provinceId');
            $table->string('zipCode', 5);
            $table->string('tel', 18);
            $table->string('mobile', 11);

            // information part 3 graduated
            $table->string('graduated1');
            $table->string('faculty1');
            $table->string('graduated2');
            $table->string('faculty2');
            $table->string('graduated3');
            $table->string('faculty3');
            $table->string('graduated4');
            $table->string('faculty4');
            $table->string('graduated5');
            $table->string('faculty5');

            // information part 4 working
            $table->string('nowWork')->comment("");
            $table->string('nowWorkPlace', 255);
            $table->string('nowRole', 150);
            $table->string('pastWork1');
            $table->string('pastOrganization1', 255);
            $table->string('time1', 100);
            $table->string('pastWork2');
            $table->string('pastOrganization2', 255);
            $table->string('time2', 100);
            $table->string('pastWork3');
            $table->string('pastOrganization3', 255);
            $table->string('time3', 100);
            $table->string('importantMemo');

            // information part 5 files
            $table->string('vision');
            $table->integer('statusId');
            $table->integer('adminId');
            $table->integer('reason');

            // information part 6 more information for organization group
            $table->integer('provinceMemberID');
            $table->integer('section');
            $table->integer('organizationGroupId');
            $table->string('officialId', 20);
            $table->text('portfolio');
            $table->string('roleTimeLeft', 100);
            $table->date('startDate');
            $table->date('endDate');

            // information part 7 for ngo group
            $table->string('ngoName', 150);
            $table->string('ngoStatus');
            $table->text('ngoNo', 10);
            $table->text('ngoMoo', 2);
            $table->text('ngoSoi', 50);
            $table->text('ngoStreet', 50);
            $table->integer('ngoSubDistrictID');
            $table->integer('ngoDistrictID');
            $table->integer('ngoProvincetID');
            $table->text('ngoZipCode', 5);
            $table->date('ngoStartDate');
            $table->integer('ngoQtyMember');
            $table->text('ngoObjective');
            $table->string('activity1', 255);
            $table->text('detail1');
            $table->string('activity2', 255);
            $table->text('detail2');
            $table->string('suggestNameTitle', 150);
            $table->string('suggestFirstname', 50);
            $table->string('suggestLastname', 50);
            $table->string('suggestPosition', 50);

            // information part 8 files
            $table->string('personalIdCard', 255);
            $table->string('memberImg', 255);
            $table->string('document', 255);

            $table->string('ngoDoc', 255);
            $table->string('ngoObject', 255);
            $table->string('ngoBasis', 255);
            $table->string('ngoOrder', 255);
            $table->string('ngoPresidentIdCard', 255);
            $table->string('ngoInform', 255);
            $table->string('ngoRequest', 255);
            $table->string('ngoApprove', 255);

            $table->string('zipFile', 255);

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
