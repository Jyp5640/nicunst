


    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page" style="margin-top: 0">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-12">
                        <h4 class=" mb-2">TPN - 전제 리스트</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-sm-3">
                                    <select class="form-control">
                                        <option>전제</option>
                                        <option>신교입력</option>
                                    </select>
                                </div>
                                <div class="col-sm-9">
                                    <p class="mt-5" style="color: #ff6666">* 환자 ID를 클릭하명, 신규 TPN 처방이 가능합니다.</p>
                                </div>
                            </div>
                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table  table-centered table-bordered mb-0 text-center">
                                    <thead>
                                    <tr style="background-color: #f2f2f2;">
                                        <th>구분</th>
                                        <th>환자 ID</th>
                                        <th>저방일자</th>
                                        <th>생년월일</th>
                                        <th>성별</th>
                                        <th>PMA</th>
                                        <th>Calory<br>(kcal/d)</th>
                                        <th>Protein<br>(g/d)</th>
                                        <th>최근 입력/수정일</th>
                                        <th>내용</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>117</td>
                                        <td>-</td>
                                        <td>2020-05-14</td>
                                        <td>여</td>
                                        <td>28w 2d</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>
                                            <button type="reset" class="btn btn-primary " style="width: 100%; padding: 0">신규입력</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>116</td>
                                        <td>-</td>
                                        <td>2020-05-14</td>
                                        <td>여</td>
                                        <td>28w 2d</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>
                                            <button type="reset" class="btn btn-primary " style="width: 100%; padding: 0">신규입력</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>115</td>
                                        <td>2020-05-13</td>
                                        <td>2020-05-11</td>
                                        <td>남</td>
                                        <td>29w 0d</td>
                                        <td>60</td>
                                        <td>8</td>
                                        <td>2020-05-14</td>
                                        <td>
                                            <button type="reset" class="btn btn-danger " style="width: 100%; padding: 0">수정하기</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>115</td>
                                        <td>2020-05-13</td>
                                        <td>2020-05-11</td>
                                        <td>남</td>
                                        <td>29w 0d</td>
                                        <td>60</td>
                                        <td>8</td>
                                        <td>2020-05-14</td>
                                        <td>
                                            <button type="reset" class="btn btn-danger " style="width: 100%; padding: 0">수정하기</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>115</td>
                                        <td>2020-05-13</td>
                                        <td>2020-05-11</td>
                                        <td>남</td>
                                        <td>29w 0d</td>
                                        <td>60</td>
                                        <td>8</td>
                                        <td>2020-05-14</td>
                                        <td>
                                            <button type="reset" class="btn btn-danger " style="width: 100%; padding: 0">수정하기</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>115</td>
                                        <td>2020-05-13</td>
                                        <td>2020-05-11</td>
                                        <td>남</td>
                                        <td>29w 0d</td>
                                        <td>60</td>
                                        <td>8</td>
                                        <td>2020-05-14</td>
                                        <td>
                                            <button type="reset" class="btn btn-danger " style="width: 100%; padding: 0">수정하기</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>115</td>
                                        <td>2020-05-13</td>
                                        <td>2020-05-11</td>
                                        <td>남</td>
                                        <td>29w 0d</td>
                                        <td>60</td>
                                        <td>8</td>
                                        <td>2020-05-14</td>
                                        <td>
                                            <button type="reset" class="btn btn-danger " style="width: 100%; padding: 0">수정하기</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-8">
                                    <p>* TPN 리스트는 모든 환자ID 대상으로 적용됨/ 아이디 클릭시 신규입력으로 인식<br>
                                        * 용어 등 전부 수정 가능<br>
                                        * 한페이지에 20개 목록 노출  <br>
                                        * TPN의 최근 입력일의 경우 마지막 입력일을 의미
                                    </p>
                                </div>
                                <div class="col-md-4 text-right">
                                    <nav>
                                        <ul class="pagination pagination-split" style="float: right">
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                                            <li class="page-item"><a class="page-link" href="#">5</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>



            </div> <!-- container-fluid -->

        </div> <!-- content -->

        <!--         Footer Start -->

        <!--         end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->


