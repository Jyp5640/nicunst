<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>등록완료 팝업</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>include/images/favicon.png">

    <!-- Responsive Table css -->
    <link href="<?php echo base_url() ?>include/css/rwd-table.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="<?php echo base_url() ?>include/css/bootstrap.min.css" id="bootstrap-stylesheet" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?php echo base_url() ?>include/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?php echo base_url() ?>include/css/app.min.css" id="app-stylesheet" rel="stylesheet" type="text/css" />

</head>

<body>

<!-- Begin page -->
<div id="wrapper">

    <!-- end Topbar -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page" style="margin-top: 0">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="offset-sm-4 col-sm-4">
                        <div class="alert alert-light fade show mb-0 text-center" style="min-width: 20%; margin-top: 30vh; padding: 40px 0 0 0; border: 1px solid #e6e6e6">
                            <p>
                                총 <span id="test1"></span> 건이 등록완료 되었습니다. <br> (등록불가 <span id="test2"></span>건 제외)
                            </p>
                            <p><button type="button" class="btn btn-lighten-secondary mt-2 width-lg" id="confirm">확인</button></p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->

        </div> <!-- content -->

        <!-- Footer Start -->
        <!--        <footer class="footer">-->
        <!--            <div class="container-fluid">-->
        <!--                <div class="row">-->
        <!--                    <div class="col-md-6">-->
        <!--                        2016 - 2020 &copy; Adminto theme by <a href="">Coderthemes</a>-->
        <!--                    </div>-->
        <!--                    <div class="col-md-6">-->
        <!--                        <div class="text-md-right footer-links d-none d-sm-block">-->
        <!--                            <a href="javascript:void(0);">About Us</a>-->
        <!--                            <a href="javascript:void(0);">Help</a>-->
        <!--                            <a href="javascript:void(0);">Contact Us</a>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </footer>-->
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Vendor js -->
<script src="<?php echo base_url() ?>include/js/vendor.min.js"></script>

<!-- Responsive Table js -->
<script src="<?php echo base_url() ?>include/js/rwd-table.min.js"></script>

<!-- Init js -->
<!--<script src="/webassets/js/pages/responsive-table.init.js"></script>-->

<!-- App js -->
<script src="<?php echo base_url() ?>include/js/app.min.js"></script>

</body>
<script>
    $(document).ready(function () {

        console.log("<?php echo $this->uri->segment(3) ?>");
        console.log("<?php echo $this->uri->segment(4) ?>");

        $('#test1').text("<?php echo $this->uri->segment(3) ?>");
        $('#test2').text("<?php echo $this->uri->segment(4) ?>");
    });

    $('#confirm').click(function (){
        close();
    });
</script>
</html>


