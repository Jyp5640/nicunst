
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page" style="margin-top: 0">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-12">
                        <h4 class=" mt-2">데이터 수정 > 환자 ID별 데이터</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <div>
                                <p>* 등록된 전체 환자 리스트입니다.</p>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="table-responsive" data-pattern="priority-columns">
                                        <table id="patient_info" class="table table-bordered mb-0 text-center">
                                            <thead>
                                            <tr style="background-color: #f2f2f2;">
                                                <th>환자 ID</th>
                                                <th>생년월일</th>
                                                <th>재태주령</th>
                                                <th>성별</th>
                                                <th>나이(만)</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td><span id="week"></span>w <span id="day"></span>d</td>
                                                <td><span id="ptn_sex"></span></td>
                                                <td></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <button type="reset" class="btn btn-lighten-secondary width-sm" style="width: 100%">전체 환자 목록 보기</button>
                                </div>
                            </div>

                            <div class="table-responsive" data-pattern="priority-columns">
                                <table id="data_byPatientId_list_table" class="table table-bordered table-centered text-center">
                                    <thead>
                                    <tr style="background-color: #f2f2f2;">
                                        <th rowspan="2">구분</th>
                                        <th rowspan="2">날짜</th>
                                        <th rowspan="2">PMA</th>
                                        <th rowspan="2">분류</th>
                                        <th rowspan="2">Wt(g)</th>
                                        <th rowspan="2">Ht(cm)</th>
                                        <th rowspan="2">HC(cm)</th>
                                        <th colspan="3">Z-score </th>
                                        <th colspan="3">%ile</th>
                                        <th colspan="2">영양요구량</th>
                                        <th colspan="2">영양공급</th>
                                        <th colspan="2">요구량 대비 공급랑</th>
                                        <th rowspan="2">내용</th>
                                        <th rowspan="2">비고</th>
                                    </tr>
                                    <tr style="background-color: #f2f2f2; text-align: center; ">
                                        <th>Wt</th>
                                        <th>Ht</th>
                                        <th>HC</th>
                                        <th>Wt</th>
                                        <th>Ht</th>
                                        <th>HC</th>
                                        <th>Energy<br>(kcal/d)</th>
                                        <th>Protein<br>(g/d)</th>
                                        <th>Energy<br>(kcal/d)</th>
                                        <th>Protein<br>(g/d)</th>
                                        <th>Energy<br>(%)</th>
                                        <th>Protein<br>(%)</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-5">
                                <p>* 가장 죄근 입력일이 상단 위치</p>
                            </div>
                        </div>
                    </div>
                </div>

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

<script>

    // 만나이 계산
    function international_age(data)
    {
        let now = new Date();

        let bdayData = data.split('-');
        let birthday = new Date(bdayData[0],parseInt(bdayData[1])-1,bdayData[2]);

        let age = now.getFullYear() - birthday.getFullYear();

        let birthMonth = birthday.getMonth();
        let thisMonth = now.getMonth();

        let birthDate = birthday.getDate();
        let thisDate = now.getDate();

        if (birthMonth < thisMonth) {
            return age;
        } else if (birthMonth > thisMonth) {
            return age - 1;
        } else {
            if (birthDate <= thisDate) {
                return age;
            } else {
                return age - 1;
            }
        }
    }

    let data_byPatientId_list_table;

    function render_data_byPatientId_list_table(data,ready = false)
    {
        console.log(data);
        let dataset = [];

        for (let i = 0 ; i < data.length ; i++)
        {
            let dataset_temp = [];

            dataset_temp.push(i+1);
            dataset_temp.push(data[i]['pdat_csvdate']);
            dataset_temp.push(data[i]['ptn_combine_days']);
            dataset_temp.push(data[i]['ptn_regdate']);
            dataset_temp.push(data[i]['pdat_csvdate']);
            dataset_temp.push('');
            dataset_temp.push(data[i]['pdat_weight']);
            dataset_temp.push(data[i]['pdat_height']);
            dataset_temp.push(data[i]['pdat_hc']);

            dataset.push(dataset_temp);
        }

        data_byPatientId_list_table.clear();
        data_byPatientId_list_table.rows.add(dataset);
        data_byPatientId_list_table.draw();
    }

    $(document).ready(function () {

        let formData = new FormData();

        formData.append("csrf_token","<?= $csrf_token ?>");
        formData.append("ptn_idx","<?= $ptn_idx ?>");

        $.ajax({
            url: '<?php echo base_url() ?>data/data_byPatientId',
            processData: false,
            contentType: false,
            data: formData,
            type: 'POST',
            success: function (result) {
                let msg = JSON.parse(result);
                console.log(msg);

                $('#patient_info > tbody > tr > td:nth-child(1)').text(msg.jsonValue[0]['ptn_id']);
                $('#patient_info > tbody > tr > td:nth-child(2)').text(msg.jsonValue[0]['ptn_birthday']);
                $('#week').text(msg.jsonValue[0]['ptn_ga_week']);
                $('#day').text(msg.jsonValue[0]['ptn_ga_day']);

                if (msg.jsonValue[0]['ptn_sex'] == 'M') {
                    $('#ptn_sex').text('남자');
                } else {
                    $('#ptn_sex').text('여자');
                }

                let internationalAge = international_age(msg.jsonValue[0]['ptn_birthday']);

                $('#patient_info > tbody > tr > td:nth-child(5)').text(internationalAge);

                render_data_byPatientId_list_table(msg.jsonValue,true);
            }
        });

        let datatable_attr = {
            "paging": true,
            "pagingType": "full_numbers",
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": true,
            "order" : [],
            "columns" : [
                {"data": 0},
                {"data": 1},
                {"data": 2,
                    "render" : function (data, type, row) {
                        if (data == 0 || data == '-') {
                            return "<span>-</span>";
                        } else {

                            let regDateArr = row['3'].split('-');
                            let csvDateArr = row['4'].split('-');

                            let regDateCompare = new Date(regDateArr[0],parseInt(regDateArr[1])-1,regDateArr[2]);
                            let csvDateCompare = new Date(csvDateArr[0],parseInt(csvDateArr[1])-1,csvDateArr[2]);

                            let diffDay = (csvDateCompare.getTime() - regDateCompare.getTime())/1000/60/60/24;

                            if (csvDateCompare.getTime() > regDateCompare.getTime()) {
                                data = diffDay + parseInt(data);
                                return "<span>" + parseInt(data / 7) + 'w' + "</span>&nbsp;<span>" + data % 7 + 'd' + "</span>";
                            } else {
                                return "<span>-</span>";
                            }
                        }

                    }

                },
                {"data": 5},
                {"data": 6},
                {"data": 7},
                {"data": 8},
            ]
        }

        data_byPatientId_list_table = $('#data_byPatientId_list_table').DataTable(datatable_attr);
    });

</script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
