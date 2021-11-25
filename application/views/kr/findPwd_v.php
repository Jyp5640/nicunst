
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
                <div class="card">
                    <div class="card-body p-4">
                        <div class=" row">
                            <div  class="col-sm-3 text-right">
                                <h2>비밀번호 재설정</h2>
                            </div>
                            <div class="col-sm-9">
                                <div class="form-horizontal group-border-dashed mt-2">

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">아이디</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" required
                                                   placeholder="아이디를 입력해주세요" id="adminID"/>
                                        </div>
                                    </div>

                                    <div class="form-group row mt-4">
                                        <label class="col-sm-2 col-form-label">이메일</label>
                                        <div class="col-sm-5">
                                            <input type="email" class="form-control" required
                                                   placeholder="이메일을 입력해주세요" id="adminEmail"/>
                                        </div>
                                    </div>

<!--                                    <div class="form-group row mt-4">-->
<!--                                        <p class="offset-2 col-auto" style="color: #ff6666">-->
<!--                                            인증하기 인증하기 인증하기 인증하기 인증하기-->
<!--                                        </p>-->
<!--                                    </div>-->
                                    <div class="form-group row mt-2">
                                        <span class="offset-2 col-auto" style="color: #ff6666" id="findPwd">a</span>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-2 col-auto ">
                                            <button type="reset" class="btn btn-lighten-secondary width-lg mb-2 mr-2" id="cancel">
                                                취소
                                            </button>
                                            <button type="submit" class="btn btn-primary width-lg mb-2 " id="_submit">
<!--                                                변경메일보내기-->
                                                비밀번호 찾기
                                            </button>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
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
    $("#cancel").click(function(){
        location.href = '<?php echo base_url() ?>login';
    });

    $("#_submit").click(function(){

        if($("#adminID").val() == '')
        {
            alert('아이디를 입력해주세요');
            return;
        }

        if($("#adminEmail").val() == '')
        {
            alert('이메일을 입력해주세요');
            return;
        }

        var formData = new FormData();

        formData.append("AdminID",$("#adminID").val());
        formData.append("AdminEmail",$("#adminEmail").val());

        $.ajax({
            url: "<?php echo base_url(); ?>FindIdPwd/findPwd",
            processData: false,
            contentType: false,
            data: formData,
            type: 'POST',
            success: function(result) {
                var msg = JSON.parse(result);
                console.log(msg);

                if (msg.statusCode == "dataOK") {
                    if (msg.jsonValue.length === 0) {
                        $('#adminEmail').val('');
                        $('#adminID').focus();
                        $('#findPwd').text('일치하는 비밀번호가 없습니다');
                    } else {
                        $('#findPwd').text('비밀번호: '+ msg.jsonValue[0].AdminPwd);
                    }
                } else {
                    alert(msg.statusValue);
                }
            }
        });
    });
</script>