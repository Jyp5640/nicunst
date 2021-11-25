
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
            <div class="col-md-8 col-lg-8 col-xl-8">
                <div class="text-center">
<!--                    <a href="index.html" class="logo">-->
                        <h1>키니신생아</h1>
<!--                    </a>-->
                    <!--                            <p class="text-muted mt-2 mb-4">Responsive Admin Dashboard</p>-->
                </div>
                <div class="card">
                    <div class="card-body p-4">
                        <form action="/login" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class=" mb-4" style="border-bottom: solid 1px #ddd">
                                        <h4 class="text-uppercase mt-0">KINI 로그인</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 pr-0">
                                            <div class="form-group mb-1">
                                                <input id="Admin_ID" name="Admin_ID" type="adminid" class="form-control" placeholder="ID">
<!--                                                <input class="form-control" type="text" id="id" value="" name="email" required="" placeholder="ID">-->
                                            </div>
                                            <div class="form-group mb-1">
                                                <input id="Admin_Pwd" name="Admin_Pwd" type="password" class="form-control" placeholder="Password">
<!--                                                <input class="form-control" type="password" id="password" value="" name="password" placeholder="Password" required="">-->
                                            </div>
<!--                                            <div class="form-group">-->
<!--                                                <input class="form-control" type="password" id="Repassword" value="" name="password" placeholder="Password 확인" required="">-->
<!--                                            </div>-->
                                        </div>
                                        <div class="col-md-4 pl-1">
<!--                                            <div class="form-group mb-1 text-center">-->
<!--                                                <button class="btn btn-lighten-secondary btn-block"  style="height: 37px; padding: 0"> 중복체크-->
<!--                                                </button>-->
<!--                                            </div>-->
                                            <div class="form-group mb-0 text-center">
                                                <button class="btn btn-primary btn-block btn-lg" type="submit" style="height: 81px;" id="_submit"> 로그인</button>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mt-2">
                                            <div class="form-group mb-0 text-center">
                                                <a href="<?php echo base_url() ?>FindIdPwd/findIdView" class="btn btn-light"> 아이디 찾기</a>
                                                <a href="<?php echo base_url() ?>FindIdPwd/findPwd" class="btn btn-light"> 비밀번호 찾기</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 mt-2">
                                            <div class="form-group mb-0 text-center">
<!--                                                <a href="" class="btn btn-light"> 회원가입</a>-->
                                                <a href="#" class="btn btn-block btn-primary btn_admin_register">
                                                    관리자로 가입
                                                </a>
                                                <a href="#" class="btn btn-block btn-success btn_member_join">
                                                    담당자로 가입요청
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-4" style="border-bottom: solid 1px #ddd">
                                        <h4 class="text-uppercase mt-0">약관</h4>
                                    </div>
                                    <div >
                                        <textarea required class="form-control" rows="5" placeholder="내용을 입력해주세요"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mt-2">
                                            <div class="checkbox">
                                                <input id="remember-1" type="checkbox">
                                                <label for="remember-1"> 상기 약관에 동의합니다 </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>


                    </div>

                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <!--                        <p> <a href="pages-recoverpw.html" class="text-muted ml-1"><i class="fa fa-lock mr-1"></i>Forgot your password?</a></p>-->
                        <!--                        <p class="text-muted">Don't have an account? <a href="pages-register.html" class="text-dark ml-1"><b>Sign Up</b></a></p>-->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

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
<script>

    $("#_submit").button().click(function() {
        var formData = new FormData();

        formData.append("Admin_ID",$("#Admin_ID").val());
        formData.append("Admin_Pwd",$("#Admin_Pwd").val());
        formData.append("csrf_token","<?= $csrf_token ?>");

        $.ajax({
            url: "<?php echo base_url() ?>auth/login",
            processData: false,
            contentType: false,
            data: formData,
            type: 'POST',
            success: function(result){
                result = JSON.parse(result);
                console.log(result);
                if(result.statusCode === 'dataOK')
                {
                    alert("환영합니다");

                    if (result.jsonValue.AdminType === 'A' || result.jsonValue.AdminType === 'S') {
                        location.href = "<?php echo base_url() ?>patient/patient_list";
                    } else {
                        // location.href = "main";
                        location.href = "<?php echo base_url() ?>test/test_list";   // 이른둥이 통합계정 테스트
                    }
                }
                else
                {
                    alert(result.statusValue);
                    $('#Admin_Pwd').focus();
                }

            }
        });
    });

    $('.btn_admin_register').click( function () {
        location.href = '<?php echo base_url() ?>AdminRegister';
    });
    $('.btn_member_join').click( function () {
        location.href = '<?php echo base_url() ?>MemberJoin';
    });
</script>
</html>
