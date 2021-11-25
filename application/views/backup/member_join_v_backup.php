    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>담당의사선생님 등록 요청</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Login</a></li>
                        <li class="breadcrumb-item active">RequestJoinMember</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- Form Element sizes -->

                    <!-- Input addon -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">병원 소속 정보</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>병원 선택</label>
                                        <select class="form-control" id="hospitalList" name="hospitalList">
                                            <option value="">--- 병원선택 ---</option>
<!--                                            <option>option 2</option>-->
<!--                                            <option>option 3</option>-->
<!--                                            <option>option 4</option>-->
<!--                                            <option>option 5</option>-->
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div>
<!--                                <p>병원명   : 연세대학교 원주세브란스기독병원 <br>병원주소 :  강원도 원주시 일산로 20(일산동)</p>-->
                                <p><span id ='instName'></span> <br><span id ='instAddr'></span></p>
                            </div>

                            <div class="row">
                                <div class="col-sm-9">
                                    <!-- select -->
                                    <div class="form-group">
                                        <label>소속 선택</label>
                                        <select class="form-control" id="departmentList" name="departmentList">
                                            <option>--- 소속선택 ---</option>
<!--                                            <option>option 2</option>-->
<!--                                            <option>option 3</option>-->
<!--                                            <option>option 4</option>-->
<!--                                            <option>option 5</option>-->
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div>
<!--                                <p>소속관리자명   : 김은진 (교수님)<br>소속정보 : 신생아담당</p>-->
                                <p><span id ='adminName'></span> <br><span id ='dmCmt'></span></p>
                            </div>
                            <!-- /input-group -->

<!--                            <p>Small <code>.input-group.input-group-sm</code></p>-->
<!--                            <div class="input-group input-group-sm">-->
<!--                                <input type="text" class="form-control">-->
<!--                                <span class="input-group-append">-->
<!--                    <button type="button" class="btn btn-info btn-flat">Go!</button>-->
<!--                  </span>-->
<!--                            </div>-->
                            <!-- /input-group -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">
                    <!-- general form elements disabled -->
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">담당의 정보</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <p>ID </p>
                            <div class="input-group mb-3">
                                <!-- /btn-group -->
                                <input type="text" class="form-control" id="adminID" placeholder="ID를 입력해주세요"/>
                                <div class="input-group-prepend">
                                    <button type="button" class="btn btn-info" id="checkID">중복확인</button>
                                </div>
                            </div>
                            <div>
                                <p><span id ='idcheck'></span></p>
                            </div>

                            <p>비밀번호 </p>
                            <div class="input-group mb-3">
                                <!-- /btn-group -->
                                <input type="password" class="form-control" id="Admin_Pwd" placeholder="비밀번호를 입력해주세요"/>
                            </div>

                            <p>비밀번호 확인 </p>
                            <div class="input-group mb-3">
                                <!-- /btn-group -->
                                <input type="password" class="form-control" id="Admin_Pwd2" placeholder="비밀번호를 다시 입력해주세요"/>
                            </div>

                            <p>이름 </p>
                            <div class="input-group mb-3">
                                <!-- /btn-group -->
                                <input type="text" class="form-control" id="Admin_Name" placeholder="이름을 입력해주세요"/>
                            </div>

                            <p>전화번호 </p>
                            <div class="input-group mb-3">
                                <!-- /btn-group -->
                                <input type="text" class="form-control" id="Admin_Phone" placeholder="전화번호를 입력해주세요"/>
                            </div>
                            <p>이메일 </p>
                            <div class="input-group mb-3">
                                <!-- /btn-group -->
                                <input type="text" class="form-control" id="Admin_Email" placeholder="이메일을 입력해주세요"/>
                            </div>
                                <!-- input states -->
<!--                                <div class="form-group">-->
<!--                                    <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i> Input with-->
<!--                                        success</label>-->
<!--                                    <input type="text" class="form-control is-valid" id="inputSuccess" placeholder="Enter ...">-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label class="col-form-label" for="inputWarning"><i class="far fa-bell"></i> Input with-->
<!--                                        warning</label>-->
<!--                                    <input type="text" class="form-control is-warning" id="inputWarning" placeholder="Enter ...">-->
<!--                                </div>-->
<!--                                <div class="form-group">-->
<!--                                    <label class="col-form-label" for="inputError"><i class="far fa-times-circle"></i> Input with-->
<!--                                        error</label>-->
<!--                                    <input type="text" class="form-control is-invalid" id="inputError" placeholder="Enter ...">-->
<!--                                </div>-->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-info" id="_submit">등록 요청</button>
                            <button type="submit" class="btn btn-default float-right" id="cancel">취소</button>
                        </div>
                    </div>
                    <!-- /.card -->
                    <!-- general form elements disabled -->
                    <!-- /.card -->
                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
<script>
    var instInfo = Array();

    $('#hospitalList').change(function(){
        let value = $(this).val();

        let formData = new FormData();

        formData.append('InstCd', value);

        // 병원 선택시
        if (value !== null && value !== '') {

            $.ajax({
                url: "<?php echo base_url(); ?>MemberJoin/checkInst",
                processData: false,
                contentType: false,
                data: formData,
                type: 'POST',
                success: function(msg) {
                    msg = JSON.parse(msg);
                    // console.log(msg);
                    if (msg.statusCode == "dataOK") {
                        instInfo = msg.jsonValue;

                        $('#instName').text('병원이름: '+ msg.jsonValue[0].InstName);
                        $('#instAddr').text('병원주소: '+ msg.jsonValue[0].InstAddr);

                        $('select#departmentList *').remove();

                        formData.append('InstCd', msg.jsonValue[0].InstCd);
                        formData.append('DmCd', 0); // 선택병원의 소속 전체를 보여주기 위해

                        $.ajax({
                            url: "<?php echo base_url(); ?>MemberJoin/checkDepartment",
                            processData: false,
                            contentType: false,
                            data: formData,
                            type: 'POST',
                            success: function(result) {
                                result = JSON.parse(result);
                                // console.log(result);
                                if (result.statusCode == "dataOK") {
                                    $('select#departmentList').append($('<option>', {
                                        'value': '',
                                        'text': '--- 소속선택 ---',
                                    }));

                                    for (let i = 0; i < result.jsonValue.length; i++) {
                                        $('select#departmentList').append($('<option>', {
                                            'value' : result.jsonValue[i].DmCd,
                                            'text' : result.jsonValue[i].DmName
                                        }));
                                    }
                                } else {
                                    alert(result.statusValue);
                                }
                            }
                        });

                    } else {
                        alert(msg.statusValue);
                    }
                }
            });
        } else {    // 병원,소속 선택 초기화
            $('#instName').text('');
            $('#instAddr').text('');

            $('#departmentList').val('');
            $('#adminName').text('');
            $('#dmCmt').text('');

            $('select#departmentList').children('option:not(:first)').remove();
            // $('select#departmentList *').remove();

            // $('select#departmentList').append($('<option>', {
            //     'value': '',
            //     'text': '--- 소속선택 ---',
            // }));
        }
    });

    $('#departmentList').change(function(){
        let value = $(this).val();
        // if (instInfo.length === 0) {
        //     alert('병원을 먼저 선택해 주세요.');
        //     return;
        // }

        var formData = new FormData();

        formData.append('InstCd', instInfo[0].InstCd);
        formData.append('DmCd', $("#departmentList option:selected").val());

        if (value !== null && value !== '') {

            $.ajax({
                url: "<?php echo base_url(); ?>MemberJoin/checkDepartment",
                processData: false,
                contentType: false,
                data: formData,
                type: 'POST',
                success: function(msg) {
                    msg = JSON.parse(msg);

                    $('#adminName').text('소속관리자명: '+ msg.jsonValue[0].AdminName + '(교수님)');
                    $('#dmCmt').text('소속정보: '+ msg.jsonValue[0].DmCmt);
                }
            });
        } else {
            $('#adminName').text('');
            $('#dmCmt').text('');
        }
        // console.log($("#departmentList option:selected").val());
    });

    $('#checkID').click(function () {

        if($("#adminID").val().length == 0){
            alert("ID 를 입력해주세요");
            return;
        }

        var formData = new FormData();

        formData.append('checkID', $('#adminID').val());

        $.ajax({
            url: "<?php echo base_url(); ?>AdminRegister/checkID",
            processData: false,
            contentType: false,
            data: formData,
            type: 'POST',
            success: function (msg) {
                msg = JSON.parse(msg);
                // console.log(msg);

                if($("#adminID").val().length < 5)
                {
                    alert('아이디는 최소 5자 이상부터 가능합니다.');
                    return;
                }
                else if($("#adminID").val().length > 10)
                {
                    alert('아이디는 최대 10자 까지 가능합니다.');
                    return;
                }

                if (msg.statusCode == "dataOK") {
                    if (msg.jsonValue.length === 0) {

                        $('#idcheck').text('사용 가능한 아이디입니다.');
                        $('#adminID').addClass('is-valid');
                    } else {
                        $('#idcheck').text('이미 사용중인 아이디입니다.');
                        $('#adminID').addClass('is-invalid');
                    }
                } else {
                    alert(msg.statusValue);
                }
            }
        });
    });
    $('#adminID').focusin(function() {
        $('#idcheck').text('');
        $('#adminID').removeClass('is-valid is-invalid');
    });

    $("#_submit").click(function(){
        var jsonObj = {};
        var inputdata = $('input');

        for($i = 0 ; $i < inputdata.length ; $i++)
        {
            jsonObj[inputdata[$i].id] = inputdata[$i].value;

            if(inputdata[$i].value == '')
            {
                alert('필수항목이 입력되지 않았습니다.');
                return;
            }
        }

        if($("#hospitalList").val() == '')
        {
            alert('병원을 선택해주세요');
            return;
        }
        if($("#departmentList").val() == '')
        {
            alert('소속을 선택해주세요');
            return;
        }
        if($('#adminID').attr('class').slice(-8) !== 'is-valid')
        {
            alert('아이디 중복체크를 해주세요');
            return;
        }

        if($("#Admin_Pwd").val() != $("#Admin_Pwd2").val())
        {
            alert('비밀번호가 일치하지 않습니다.');
            return;
        }
        else
        {
            if($("#Admin_Pwd").val().length < 5)
            {
                alert('비밀번호가 너무 짧습니다. 5자 이상으로 입력해주세요.');
                return;
            }
            else if($("#Admin_Pwd").val().length > 16)
            {
                alert('비밀번호는 최대 16자 까지 가능합니다.');
                return;
            }
        }

        // jsonObj["func"] = "custjoin_n";
        var formData = new FormData();

        formData.append("Admin_ID",$("#adminID").val());
        //formData.append("csrf_token","<?//= $csrf_token ?>//");
        formData.append("Admin_Pwd",jsonObj['Admin_Pwd']);
        formData.append("Admin_Name",jsonObj['Admin_Name']);
        formData.append("Admin_Phone",jsonObj['Admin_Phone']);
        formData.append("Admin_Email",jsonObj['Admin_Email']);

        formData.append('InstCd', instInfo[0].InstCd);
        formData.append('DmCd', $("#departmentList option:selected").val());

        $.ajax({
            url: "<?php echo base_url(); ?>MemberJoin/adminResgister",
            processData: false,
            contentType: false,
            data: formData,
            type: 'POST',
            success: function(result) {
                var msg = JSON.parse(result);
                // console.log(msg);
                console.log(msg.statusCode);
                if(msg.statusCode == "statOK")
                {
                    alert('회원가입 완료');
                    location.href = '<?php echo base_url() ?>login';
                }
                else
                {
                    alert('dddd');
                }
                return;
            }
        });
    });

    $("#cancel").click(function(){
        location.href = '<?php echo base_url() ?>login';
    });

    $(document).ready(function () {

        // 아이디 입력시엔 영문 숫자만 허용
        $("#adminID").keyup(function(event){
            if (!(37 <= event.keyCode && event.keyCode<=40)) {
                var inputVal = $(this).val();
                $(this).val(inputVal.replace(/[^a-z0-9@.]/gi,''));
            }
        });

        // 이메일 입력시엔 영문,숫자,@, . 허용
        $("#Admin_Email").keyup(function(event){
            if (!(37 <= event.keyCode && event.keyCode<=40)) {
                var inputVal = $(this).val();
                $(this).val(inputVal.replace(/[^a-z0-9@.]/gi,''));
            }
        });

        // 전화번호는 숫자만 허용
        $("#Admin_Phone").keyup(function(event){
            $adminPhone = $('#Admin_Phone').val();

            regNumber = /^[0-9]*$/;

            if(!regNumber.test($adminPhone))
            {
                alert('숫자만 입력가능합니다.');
                $adminPhone = $('#Admin_Phone').val('');
                return;
            }
        });

        let hospitalList = '<?= $hospital_list ?>';

        hospitalList = (hospitalList !== '') ? JSON.parse(hospitalList) : hospitalList;

        // $('select#departmentList').append($('<option>', {
        //     'value': '',
        //     'text': '--- 병원선택 ---',
        // }));

        for (let i=0; i<hospitalList.length; i++) {

            $('select#hospitalList').append($('<option>', {
                'value': hospitalList[i].InstCd,
                'text': hospitalList[i].InstName,
            }));
        }

    });
</script>