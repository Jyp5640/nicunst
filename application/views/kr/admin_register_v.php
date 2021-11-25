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
                        <h1>관리자등록</h1>
<!--                    </a>-->
                </div>
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">병원 소속 등록</h3>
                    </div>
                    <div class="card-body p-4">
                        <form class="form-horizontal group-border-dashed">

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
                                <label class="col-sm-2 col-form-label">기관검증코드</label>
                                <div class="col-sm-4">
                                    <!-- select -->
                                    <div class="input-group mb-3">
                                        <!-- /btn-group -->
                                        <input type="text" class="form-control" id="authCd" required/>
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-info" id="searchAuthCd">검색</button>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p><span id ='instName'></span> <br><span id ='instAddr'></span></p>
                                </div>
                            </div>

<!--                            <div class="form-group row">-->
<!--                                <label class="col-sm-2 col-form-label">기관명 </label>-->
<!--                                <div class="col-sm-4">-->
<!--                                    <input type="email" class="form-control" required-->
<!--                                           parsley-type="email" placeholder="강남세브란스병원"/>-->
<!--                                </div>-->
<!--                                <div class="col-auto">-->
<!--                                    <button type="reset" class="btn btn-lighten-secondary width-lg">-->
<!--                                        검색-->
<!--                                    </button>-->
<!--                                </div>-->
<!--                            </div>-->
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">소속명</label>
                                <div class="col-sm-4">
                                    <!-- select -->
                                    <div class="input-group mb-3">
                                        <!-- /btn-group -->
                                        <input type="text" class="form-control" id="dmName" required />
                                        <div class="input-group-prepend">
                                            <button type="button" class="btn btn-info" id="checkDm">중복확인</button>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p><span id ='dmMent'></span> <br><span id ='dmAdminName'></span></p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">소속설명</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" required />
                                </div>
                            </div>
                    </div>

                </div>

                <div class="card card-warning">
                    <div class="card-header" style="padding: 0.75rem">
                        <h3 class="card-title">관리자(교수님) 정보</h3>
                    </div>
                    <div class="card-body p-4">

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
                                    <input type="email" parsley-type="email" class="form-control" id="Admin_Email"
                                           required parsley-type="email" placeholder="이메일을 입력해주세요" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12 mt-2 text-center">
                                    <button type="button" class="btn btn-lighten-secondary width-lg mb-2 mr-2" id="cancel">취소</button>
                                    <button type="submit" class="btn btn-primary width-lg mb-2" id="_submit">등록</button>
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
    $('#searchAuthCd').click(function () {
        var formData = new FormData();

        formData.append('InstAuthCd', $('#authCd').val());

        $.ajax({
            url: "<?php echo base_url(); ?>AdminRegister/checkInst",
            processData: false,
            contentType: false,
            data: formData,
            type: 'POST',
            success: function(msg) {
                msg = JSON.parse(msg);
                // console.log(msg);
                if (msg.statusCode == "dataOK") {
                    instInfo = msg.jsonValue;
                    if (msg.jsonValue.length === 0) {
                        $('#instName').text('해당하는 병원정보가 없습니다.');
                        $('#instAddr').text('기관검증코드는 유티인프라에 문의하세요.');
                        $('#authCd').addClass('is-invalid');
                    }
                    else {
                        $('#instName').text('병원이름: '+ msg.jsonValue[0].InstName);
                        $('#instAddr').text('병원주소: '+ msg.jsonValue[0].InstAddr);
                        $('#authCd').addClass('is-valid');
                    }
                } else {
                    alert(msg.statusValue);
                }
            }
        });
    });
    $('#authCd').focusin(function () {
        $('#instName').text('');
        $('#instAddr').text('');
        $('#authCd').removeClass('is-valid is-invalid');
    });

    $('#checkDm').click(function () {

        if($("#dmName").val().length == 0){
            alert("소속명을 입력해주세요");
            return;
        }

        var formData = new FormData();

        if (instInfo.length === 0) {
            alert('기관검증코드를 먼저 검증해 주세요.');
            return;
        }

        formData.append('InstCd', instInfo[0].InstCd);
        formData.append('DmName', $('#dmName').val());

        $.ajax({
            url: "<?php echo base_url(); ?>AdminRegister/checkDmName",
            processData: false,
            contentType: false,
            data: formData,
            type: 'POST',
            success: function (msg) {
                msg = JSON.parse(msg);
                // console.log(msg);
                if (msg.statusCode == "dataOK") {
                    if (msg.jsonValue.length === 0) {
                        $('#dmMent').text('사용 가능한 소속명입니다.');
                        $('#dmAdminName').text('');
                        $('#dmName').addClass('is-valid');
                    } else {
                        $('#dmMent').text('사용 불가능한 소속명입니다.');
                        $('#dmAdminName').text(msg.jsonValue[0].AdminName + ' 교수님이 사용중이십니다.');
                        $('#dmName').addClass('is-invalid');
                    }
                } else {
                    alert(msg.statusValue);
                }
            }
        });
    });
    $('#dmName').focusin(function () {
        $('#dmMent').text('');
        $('#dmAdminName').text('');
        $('#dmName').removeClass('is-valid is-invalid');
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

        if($('#authCd').attr('class').slice(-8) !== 'is-valid')
        {
            alert('기관검증코드 체크를 해주세요');
            return;
        }
        if($('#dmName').attr('class').slice(-8) !== 'is-valid')
        {
            alert('소속명 중복체크를 해주세요');
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

        formData.append("AuthCd",jsonObj['authCd']);
        formData.append("DmName",jsonObj['dmName']);
        formData.append("DmCmt",jsonObj['dmCmt']);

        formData.append("Admin_ID",$("#adminID").val());
        //formData.append("csrf_token","<?//= $csrf_token ?>//");
        formData.append("Admin_Pwd",jsonObj['Admin_Pwd']);
        formData.append("Admin_Name",jsonObj['Admin_Name']);
        formData.append("Admin_Phone",jsonObj['Admin_Phone']);
        formData.append("Admin_Email",jsonObj['Admin_Email']);

        $.ajax({
            url: "<?php echo base_url(); ?>AdminRegister/adminResgister",
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

    $(document).ready(function(){

        // 아이디 입력시엔 영문 숫자만 허용
        $("#adminID").keyup(function(event){
            if (!(37 <= event.keyCode && event.keyCode<=40)) {
                var inputVal = $(this).val();
                $(this).val(inputVal.replace(/[^a-z0-9]/gi,''));
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

    });
</script>