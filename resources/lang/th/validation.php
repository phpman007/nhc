<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute must be accepted.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute may only contain letters.',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute may only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => ':attribute การยืนยันไม่ตรงกัน',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => ':attribute ต้องเป็นที่อยู่อีเมลที่ถูกต้อง',
    'ends_with' => 'The :attribute must end with one of the following: :values',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file' => 'การอัพโหลด :attribute ต้องไม่เกิน :max กิโลไบต์',
        'string' => ':attribute ต้องไม่เกิน :max ตัวอักษร',
        'array' => 'The :attribute may not have more than :max items.',
    ],
    'mimes' => ':attribute ต้องเป็นไฟล์ประเภท :values',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => ':attribute ต้องมีอย่างน้อย :min',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => ':attribute ต้องมีอย่างน้อย :min ตัวอักษร',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'รูปแบบ :attribute ไม่ถูกต้อง',
    'required' => 'กรุณากรอกข้อมูล :attribute',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => ':attribute ถูกใช้งานแล้ว กรุณาตรวจสอบแล้วลองใหม่อีกครั้ง',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute format is invalid.',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'thaiStatus' => [
            'required' => 'กรุณาคลิกในช่องว่างเพื่อยืนยันคุณสมบัติ :attribute',
        ],
        'ageQualify' => [
            'required' => 'กรุณาคลิกในช่องว่างเพื่อยืนยันคุณสมบัติ :attribute',
        ],
        'enoughAbility' => [
            'required' => 'กรุณาคลิกในช่องว่างเพื่อยืนยันคุณสมบัติ :attribute',
        ],
        'noDrug' => [
            'required' => 'กรุณาคลิกในช่องว่างเพื่อยืนยันคุณสมบัติ :attribute',
        ],
        'noCriminal' => [
            'required' => 'กรุณาคลิกในช่องว่างเพื่อยืนยันคุณสมบัติ :attribute',
        ],
        'noJail' => [
            'required' => 'กรุณาคลิกในช่องว่างเพื่อยืนยันคุณสมบัติ :attribute',
        ],
        'noNHCworking' => [
            'required' => 'กรุณาคลิกในช่องว่างเพื่อยืนยันคุณสมบัติ :attribute',
        ],
        'enoughExperience' => [
            'required' => 'กรุณาคลิกในช่องว่างเพื่อยืนยันคุณสมบัติ :attribute',
        ],
        'enoughProfile' => [
            'required' => 'กรุณาคลิกในช่องว่างเพื่อยืนยันคุณสมบัติ :attribute',
        ],
        'soi' => [
            'required' => 'กรุณากรอกข้อมูล :attribute หากไม่มีกรุณากรอกเครื่องหมาย "-"',
        ],
        'street' => [
            'required' => 'กรุณากรอกข้อมูล :attribute หากไม่มีกรุณากรอกเครื่องหมาย "-"',
        ],
        'no' => [
            'required' => 'กรุณากรอกข้อมูล :attribute หากไม่มีกรุณากรอกเครื่องหมาย "-"',
        ],
        'moo' => [
            'required' => 'กรุณากรอกข้อมูล :attribute หากไม่มีกรุณากรอกเครื่องหมาย "-"',
        ],
        'ngoSoi' => [
            'required' => 'กรุณากรอกข้อมูล :attribute หากไม่มีกรุณากรอกเครื่องหมาย "-"',
        ],
        'ngoStreet' => [
            'required' => 'กรุณากรอกข้อมูล :attribute หากไม่มีกรุณากรอกเครื่องหมาย "-"',
        ],
        'ngoNo' => [
            'required' => 'กรุณากรอกข้อมูล :attribute หากไม่มีกรุณากรอกเครื่องหมาย "-"',
        ],
        'ngoMoo' => [
            'required' => 'กรุณากรอกข้อมูล :attribute หากไม่มีกรุณากรอกเครื่องหมาย "-"',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'personalId'            => 'เลขบัตรประชาชน',
        'email'                 => 'อีเมล',
        'password'              => 'รหัสผ่าน',
        'password_confirmation' => 'ยืนยันรหัสผ่าน',
        'nameTitle'             => 'คำนำหน้า',
        'firstname'             => 'ชื่อ',
        'lastname'              => 'นามสกุล',

        // step From 4
        'no'            => 'เลขที่',
        'moo'           => 'หมู่ที่',
        'soi'           => 'ตรอก/ซอย',
        'street'        => 'ถนน',
        'subDistrictId'    => 'ตำบล/แขวง',
        'districtId'    => 'อำเภอ/เขต',
        'provinceId'    => 'จังหวัด',
        'zipCode'       => 'รหัสไปรษณีย์',
        'tel'           => 'โทรศัพท์',
        'mobile'        => 'โทรศัพท์เคลื่อนที่ (มือถือ)',
        'graduated1'    => 'วุฒิการศึกษา',
        'faculty1'      => 'สาขา',
        'institution1'  => 'สถาบัน',
        'yearend1'      => 'ปีที่จบ',
        'fromyear1' 		   =>'จากปีที่',
        'toyear1'      =>'ถึงปี่ที่',
        'nowWork'       => 'ปัจจุบันปฏิบัติหน้าที่',
        'nowWorkPlace'  => 'สถานที่ปฏิบัติงาน',
        'nowRole'       => 'งานในความรับผิดชอบ',
        'pastWork1'     => 'ปฏิบัติหน้าที่',
        'pastOrganization1'     => 'องค์กร',
        'time1'         => 'ระยะเวลาการปฏิบัติหน้าที่',
        'importantMemo' => 'ประสบการณ์สำคัญหรือประสบการณ์ที่ภาคภูมิใจที่สัมพันธ์กับประเภทกลุ่มผู้ทรงคุณวุฒิที่เลือกสมัคร',
        'vision'        => 'วิสัยทัศน์ของข้าพเจ้าต่อการพัฒนาระบบสุขภาพแห่งชาติ',
        'uploadBtn01'   => 'สำเนาบัตรประจำตัวประชาชน',
        'uploadBtn02'   => 'รูปถ่าย',
        'uploadBtn04'   => 'แนบไฟล์วิสัยทัศน์',
        'uploadBtn03'   => 'เอกสารสรุปผลงานอันเป็นที่ประจักษ์',
        'uploadBtn033'   => 'แบบ สช./แบบขอขึ้นทะเบียนองค์กรภาคเอกชนและยืนยันการส่งผู้แทนภาคเอกชน/2562 พร้อมเอกสารหลักฐานประกอบ 1 ชุด',
        'thaiStatus'    => 'มีสัญชาติไทย',
        'ageQualify'    => 'มีอายุไม่ต่ำกว่ายี่สิบปีบริบูรณ์ ณ วันที่สมัคร',
        'enoughAbility'    => 'ไม่เป็นคนไร้ความสามารถหรือคนเสมือนไร้ความสามารถ',
        'noDrug'    => 'ไม่ติดยาเสพติดให้โทษ',
        'noCriminal'    => 'ไม่เคยถูกลงโทษไล่ออก ปลดออก เลิกจ้าง หรือพ้นจากตำแหน่ง เพราะเหตุจากการทุจริตหรือประพฤติมิชอบ',
        'noJail'    => 'ไม่เคยได้รับโทษจำคุกโดยคำพิพากษาถึงที่สุดให้จำคุก ไม่ว่าจะถูกจำคุกจริงหรือไม่ก็ตาม
                                    เว้นแต่เป็นโทษสำหรับความผิดที่ได้กระทำโดยประมาทหรือ ความผิดลหุโทษ',
        'noNHCworking'    => 'ไม่เป็นผู้ประกอบวิชาชีพด้านสาธารณสุขตามนิยามในพระราชบัญญัติสุขภาพแห่งชาติ พ.ศ. ๒๕๕๐',
        'enoughExperience'    => 'มีประสบการณ์การทำงานไม่น้อยกว่า ๑๐ ปี',
        'enoughProfile'    => 'มีผลงานเป็นที่ประจักษ์ที่สอดคล้องกับประเภทกลุ่มผู้ทรงคุณวุฒิที่เลือกสมัคร',
        'dateOfBirth'   => 'วันเดือนปีเกิด',
        'file_ref'      => 'สำเนาบัตรประจำตัวข้าราชการ',
        'roleTimeLeft'  => 'วาระการดำรงตำแหน่งในองค์กร',
        'startDate'     => 'เริ่มตั้งแต่',
        'endDate'     => 'หมดวาระ',

        'ngoName'         => 'ชื่อองค์กร',
        'ngoNo'           => 'เลขที่',
        'ngoMoo'           => 'หมู่ที่',
        'ngoSoi'           => 'ตรอก/ซอย',
        'ngoStreet'        => 'ถนน',
        'ngoZipCode'       => 'รหัสไปรษณีย์',
        'ngoStartDate'     => 'ก่อตั้งองค์กรวันที่',
        'ngoQtyMember'     => 'จำนวนสมาชิกในปัจจุบัน',
        'ngoObjective'     => 'วัตถุประสงค์',
        'activity1'        => 'ชื่อกิจกรรม',
        'addressType'        => 'สถานที่ ที่สามารถติดต่อได้สะดวก',
        'detail1'             => 'สรุปผลงานที่สำคัญ',
        'workPlaceName' => 'สถานที่ทำงาน',
        'suggestTel' => 'เบอร์โทรศํพท์',
        'ngoStatus' => 'สถานภาพขององค์กร',
        "suggestNameTitle"    => 'คำนำหน้า',
            "suggestNameTitle"      => 'คำนำหน้า',
            "suggestFullname" => 'ชื่อ สกุล',
            "suggestPosition" => 'ตำแหน่ง',
            "byNgo"     => 'องค์กร',
            "file1"     => ' ',
            "file2"     => ' ',
            "file3"     => ' ',
            "file4"     => ' ',
            "file5"     => ' ',
    ],

];
