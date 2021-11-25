<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <!--    <title>Responsive Tables | Adminto - Responsive Bootstrap 4 Admin Dashboard</title>-->
    <title>키니신생아</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- CSS 로드 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>include/css/jquery-ui.css">
    <link rel="shortcut icon" href="<?php echo base_url() ?>include/images/favicon.png">
    <link href="<?php echo base_url() ?>include/css/rwd-table.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>include/css/bootstrap.min.css" id="bootstrap-stylesheet" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>include/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url() ?>include/css/app.min.css" id="app-stylesheet" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

    <!-- JS 로드 -->
    <script src="<?php echo base_url() ?>include/js/jquery-2.2.3.min.js"></script>

<!--    <script src="--><?php //echo base_url() ?><!--include/js/jquery.inputmask.bundle.min.js"></script>-->
<!--    <script src="--><?php //echo base_url() ?><!--include/js/jquery.validate/jquery.validate.min.js"></script>-->
</head>
<script>
    var userID = "<?= $this->session->userdata["AdminID"] ?>";
    var InstCd = "<?= $this->session->userdata["InstCd"] ?>";

    $(document).ready(function () {

        $("#headeruserName").text(userID);
        $("#instName").text(InstCd);

        // 관리자 일때만 담당의 관리 메뉴표시
        if ('<?= $AdminType ?>' == 'A')
        {
            $("#adminType").text('관리자');
            $("#side-menu").append("<li class='menu-title' style='text-align: center; font-weight: 600; color: #000000; background-color: #f2f2f2; font-size: 14px'>담당의 관리</li>");
            $("#side-menu").append("<li><a href='<?php echo base_url() ?>administration/admin_list'><i class='fe-list'></i><span> 담당의 리스트</span></a></li>");
        } else {
            $("#adminType").text('담당의');
        }

    });

</script>
<body>

<header class="main-header">

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a id='sidebarset' href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
<!--            <span class="sr-only">Toggle navigation</span>-->
        </a>
        <div>
            <span>계정타입 : </span>
            <span id="adminType"></span>&nbsp;/&nbsp;
            <span>병원 : </span>
            <span id="instName"></span>
        </div>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#"  class="dropdown-toggle" data-toggle="dropdown">
                        <span>로그인 ID : </span>
                        <span class="hidden-xs" id="headeruserName"></span>&nbsp;
                        <input class='btn btn-secondary width-sm' type='button' value='logout' onclick="location.href='<?php echo base_url() ?>auth/logout'">
                    </a>
                </li>
                <!-- Control Sidebar Toggle Button -->
            </ul>
        </div>
    </nav>
</header>

<!-- Begin page -->
<div id="wrapper">

    <!-- end Topbar -->

<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu" style="top: 0; padding: 0">

    <div class="slimscroll-menu">

        <!-- User box -->

        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">
                <li class="menu-title" style="text-align: center; font-weight: 600; color: #000000; background-color: #f2f2f2; font-size: 14px">환자 관리</li>

                <li>
                    <a href="<?php echo base_url() ?>patient/patient_registration">
                        <i class="mdi mdi-account-edit"></i>
                        <span> 신규 등록 </span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url() ?>patient/patient_list">
                        <i class="fe-list"></i>
                        <span> 환자 리스트  </span>
                    </a>
                </li>

                <li class="menu-title" style="text-align: center; font-weight: 600; color: #000000; background-color: #f2f2f2; font-size: 14px">데이터 관리</li>

                <li>
                    <a href="<?php echo base_url() ?>data/data_registration">
                        <i class="mdi mdi-cash-register"></i>
                        <span> 데이터 등록 </span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url() ?>data/data_modification">
                        <i class="mdi mdi-database-edit"></i>
                        <span> 데이터 수정 </span>
                    </a>
                </li>

                <li class="menu-title" style="text-align: center; font-weight: 600; color: #000000; background-color: #f2f2f2; font-size: 14px">TPN계산</li>

                <li>
                    <a href="<?php echo base_url() ?>tPN/tpn_list">
                        <i class="fe-archive"></i>
                        <span> 전체 리스트 </span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fe-list"></i>
                        <span> ID당 리스트 </span>
                    </a>
                </li>

                <li class="menu-title" style="text-align: center; font-weight: 600; color: #000000; background-color: #f2f2f2; font-size: 14px">리포트</li>

                <li>
                    <a href="#">
                        <i class="mdi mdi-reply-outline"></i>
                        <span> 회신지 </span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="mdi mdi-chart-bar"></i>
                        <span> Fenton chart</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="mdi mdi-chart-areaspline"></i>
                        <span> 성장그래프 </span>
                    </a>
                </li>

<!--                <li class="menu-title" style="text-align: center; font-weight: 600; color: #000000; background-color: #f2f2f2; font-size: 14px">담당의 관리</li>-->
<!---->
<!--                <li>-->
<!--                    <a href="--><?php //echo base_url() ?><!--administration/admin_list">-->
<!--                        <i class="fe-list"></i>-->
<!--                        <span> 담당의 리스트</span>-->
<!--                    </a>-->
<!--                </li>-->
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
<!-- Left Sidebar End -->