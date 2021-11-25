<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>KINI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
<!--    <link rel="shortcut icon" href="http://kinirecipeadmin.test/webassets/images/favicon.png">-->

    <!-- Bootstrap Css -->
    <link href="<?php echo base_url() ?>include/css/bootstrap.min.css" id="bootstrap-stylesheet" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo base_url() ?>include/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo base_url() ?>include/css/app.min.css" id="app-stylesheet" rel="stylesheet" type="text/css" />

</head>


<body class="authentication-bg">

<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-10 col-xl-10">
                <div class="text-center">
<!--                    <a href="index.html" class="logo">-->
                        <h1>담당의사선생님 등록 요청</h1>
<!--                    </a>-->
                </div>
                <div class="card card-info">
                    <div class="card-header" style="padding: 0.75rem">
                        <h3 class="card-title">병원 소속 정보</h3>
                    </div>
                    <div class="card-body p-4">
                        <form class="form-horizontal group-border-dashed" action="#">

<!--                            <div class="form-group row">-->
<!--                                <label class="col-sm-2 col-form-label">기관분류</label>-->
<!--                                <div class="col-sm-3">-->
<!--                                    <select class="form-control">-->
<!--                                        <option>병원</option>-->
<!--                                        <option>학교(연구용)</option>-->
<!--                                        <option>개인(연구용)</option>-->
<!--                                        <option>기타</option>-->
<!--                                    </select>-->
<!--                                </div>-->
<!--                            </div>-->

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">병원선택</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="hospitalList" name="hospitalList" required>
                                        <option value="">--- 병원선택 ---</option>
                                    </select>
                                </div>
                                <div>
<!--                                    <p>병원명   : 연세대학교 원주세브란스기독병원 <br>병원주소 :  강원도 원주시 일산로 20(일산동)</p>-->
                                    <p><span id ='instName'></span> <br><span id ='instAddr'></span></p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">소속선택</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="departmentList" name="departmentList" required>
                                        <option>--- 소속선택 ---</option>
                                    </select>
                                </div>
                                <div>
<!--                                    <p>소속관리자명   : 김은진 (교수님)<br>소속정보 : 신생아담당</p>-->
                                    <p><span id ='adminName'></span> <br><span id ='dmCmt'></span></p>
                                </div>
                            </div>

<!--                        </form>-->
                    </div>
                </div>

                <div class="card card-warning">
                    <div class="card-header" style="padding: 0.75rem">
                        <h3 class="card-title">담당의 정보</h3>
                    </div>
                    <div class="card-body p-4">
<!--                        <form class="form-horizontal group-border-dashed" action="#">-->

<!--                            ID입력-->
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">ID</label>
                                <div class="col-sm-5">
                                    <!-- select -->
                                    <div class="input-group mb-3">
                                        <!-- /btn-group -->
                                        <input type="text" class="form-control" id="adminID" placeholder="ID를 입력해주세요" required/>
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-info" id="checkID">중복확인</button>
                                        </div>
                                    </div>
                                    <div>
                                        <p><span id ='idcheck'></span></p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">비밀번호</label>
                                <div class="col-sm-4">
                                    <!-- /btn-group -->
                                    <input type="password" class="form-control" id="Admin_Pwd" placeholder="비밀번호를 입력해주세요" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">비밀번호 확인</label>
                                <div class="col-sm-4">
                                    <!-- /btn-group -->
                                    <input type="password" class="form-control" id="Admin_Pwd2" placeholder="비밀번호를 다시 입력해주세요" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">성명</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="Admin_Name" placeholder="이름을 입력해주세요" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">연락처</label>
                                <div class="col-sm-4">
                                    <!--                                    <input type="text" id="pass2" class="form-control" required-->
                                    <!--                                           placeholder="010"/>-->
                                    <input type="text" class="form-control" id="Admin_Phone" placeholder="- 빼고 번호만입력" required/>
                                </div>
                                <!--                                <div class="col-auto">-->
                                <!--                                    <button type="reset" class="btn btn-lighten-secondary">-->
                                <!--                                        인증번호받기-->
                                <!--                                    </button>-->
                                <!--                                </div>-->
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">이메일</label>
                                <div class="col-sm-4">
                                    <!-- /btn-group -->
                                    <input type="email" parsley-type="email" class="form-control" id="Admin_Email" placeholder="이메일을 입력해주세요" required/>
<!--                                    <input type="email" class="form-control" required-->
<!--                                           parsley-type="email" placeholder="1234"/>-->
                                </div>
                            </div>

                            <div class="form-group row">
                                <!--                                <div class="col-sm-6 text-right">-->
                                <!--                                    <button type="reset" class="btn btn-secondary waves-effect">-->
                                <!--                                        취소하기-->
                                <!--                                    </button>-->
                                <!--                                </div>-->
                                <!--                                <div class="col-sm-6 text-left">-->
                                <!--                                    <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">-->
                                <!--                                        가입하기-->
                                <!--                                    </button>-->
                                <!--                                </div>-->
                                <div class="col-sm-12 mt-2 text-center">
<!--                                    <button type="reset" class="btn btn-lighten-secondary width-lg mb-2 mr-2">-->
<!--                                        취소하기-->
<!--                                    </button>-->
                                    <button type="submit" class="btn btn-lighten-secondary width-lg mb-2 mr-2" id="cancel">취소</button>
                                    <button type="submit" class="btn btn-primary width-lg mb-2" id="_submit">등록 요청</button>
<!--                                    <button type="submit" class="btn btn-primary width-lg mb-2">-->
<!--                                        가입하기-->
<!--                                    </button>-->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->


<!-- Vendor js -->
<script src="<?php echo base_url() ?>include/js/vendor.min.js"></script>

<!-- App js -->
<script src="<?php echo base_url() ?>include/js/app.min.js"></script>

</body>
</html>

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

            // if(inputdata[$i].value == '')
            // {
            //     alert('필수항목이 입력되지 않았습니다.');
            //     return;
            // }
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