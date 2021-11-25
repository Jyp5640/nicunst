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

</head>
<script>

</script>
<body>

<header class="main-header">

    <nav class="navbar navbar-static-top">
        <a id='sidebarset' href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        </a>
        <div>
            <span>계정타입 : </span>
            <span id="adminType"></span>&nbsp;/&nbsp;
        </div>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#"  class="dropdown-toggle" data-toggle="dropdown">
                        <span>로그인 ID : </span>
                        <span class="hidden-xs" id="headeruserName"></span>&nbsp;
                        <input class='btn btn-secondary width-sm' type='button' value='logout' onclick="location.href='<?php echo base_url() ?>auth/logout'">
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<div id="wrapper">
    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu" style="top: 0; padding: 0">

        <div class="slimscroll-menu">

            <!-- User box -->

            <div id="sidebar-menu">

                <ul class="metismenu" id="side-menu">
                    <li class="menu-title" style="text-align: center; font-weight: 600; color: #000000; background-color: #f2f2f2; font-size: 14px">통합계정 테스트</li>

                    <li>
                        <a href="<?php echo base_url() ?>test/test_list">
                            <i class="mdi mdi-account-edit"></i>
                            <span> 통합계정 회원 목록 </span>
                        </a>
                    </li>
                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->
    </div>


