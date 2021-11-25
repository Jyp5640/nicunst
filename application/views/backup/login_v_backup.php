
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        신생아 관리 시스템
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">신생아 시스템 로그인</p>

<!--            <form action="../../index3.html" method="post">-->
                <div class="input-group mb-3">
<!--                    <input type="email" class="form-control" placeholder="아이디">-->
                    <input id="Admin_ID" name="Admin_ID" type="adminid" class="form-control" placeholder="ID">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-address-card"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input id="Admin_Pwd" name="Admin_Pwd" type="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                아이디 기억하기
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block" id="_submit">로그인</button>
                    </div>
                    <!-- /.col -->
                </div>
<!--            </form>-->

            <div class="social-auth-links text-center mb-3">
                <p>- 또는 -</p>
                <a href="#" class="btn btn-block btn-primary btn_admin_register">
                    관리자로 가입
                </a>
                <a href="#" class="btn btn-block btn-success btn_member_join">
                    담당자로 가입요청
                </a>
            </div>
            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="forgot-password.html">비밀번호 찾기</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->
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
                        location.href = "<?php echo base_url() ?>welcome";
                    } else {
                        // location.href = "main";
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
