


    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page" style="margin-top: 0">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-12">
                        <h4 class=" mb-2">데이터 수정: 전체 환자 리스트</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <div>
                                <p>* 등록된 전체 환자 리스트입니다.</p>
                            </div>
<!--                            <div class="table-responsive" data-pattern="priority-columns">-->
                                <table id="data_list_table" class="table table-bordered mb-0 text-center">
                                    <thead>
                                    <tr style="background-color: #f2f2f2;">
                                        <th>구분</th>
                                        <th>환자 ID</th>
                                        <th>생년월일</th>
                                        <th>재태주령</th>
                                        <th>PMA</th>
                                        <th>나이(만)</th>
                                        <th>Wt(g)</th>
                                        <th>Ht(cm)</th>
                                        <th>HC(cm)</th>
                                        <th>죄근 입력일</th>
                                        <th>내용</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
<!--                            </div>-->
                            <div class="mt-4">
                                <p>* 더보기 클릭스 해당 아이디에 대한 세부 정보 확인 가능</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- container-fluid -->

        </div> <!-- content -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

<script>
    let data_list_table;

    function render_data_list_table(data,ready = false)
    {
        let dataset = [];

        for (let i = 0 ; i < data.length ; i++)
        {
            let dataset_temp = [];

            dataset_temp.push(i+1);
            dataset_temp.push(data[i]['ptn_id']);
            dataset_temp.push(data[i]['ptn_birthday']);
            dataset_temp.push(data[i]['ptn_ga_week']);
            dataset_temp.push(data[i]['ptn_ga_day']);
            dataset_temp.push(data[i]['ptn_combine_days']);
            dataset_temp.push(data[i]['ptn_regdate']);
            dataset_temp.push(data[i]['pdat_csvdate']);
            dataset_temp.push(data[i]['pdat_weight']);
            dataset_temp.push(data[i]['pdat_height']);
            dataset_temp.push(data[i]['pdat_hc']);
            dataset_temp.push(data[i]['ptn_latest_date']);
            dataset_temp.push(data[i]['pdat_ptn_idx']);

            dataset.push(dataset_temp);
        }

        data_list_table.clear();
        data_list_table.rows.add(dataset);
        data_list_table.draw();

        console.log(data);
    }

    $(document).ready(function () {

        let formData = new FormData();

        formData.append("csrf_token","<?= $csrf_token ?>");

        $.ajax({
            url: '<?php echo base_url() ?>data/data_modification',
            processData: false,
            contentType: false,
            data: formData,
            type: 'POST',
            success: function (result) {
                let msg = JSON.parse(result);
                console.log(msg);

                render_data_list_table(msg.jsonValue,true);
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
                {"data": 2},
                {"data": 3,
                    "render" : function (data, type, row) {
                        if (data == '0') {
                            return "<span>-</span>";
                        } else {
                            return "<span>" + data + 'w' + "</span>&nbsp;<span>" + row['4'] + 'd' + "</span>";
                        }
                    }
                },
                {"data": 5,
                    "render" : function (data, type, row) {
                        if (data == 0 || data == '-') {
                            return "<span>-</span>";
                        } else {

                            let regDateArr = row['6'].split('-');
                            let csvDateArr = row['7'].split('-');

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
                {"data": 2,
                    "render" : function (data, type, row) {

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
                },
                {"data": 8},
                {"data": 9},
                {"data": 10},
                {"data": 11},
                {"data": 0,
                    "render" : function (data, type, row) {
                        return "<input type='button' onclick=location.href='<?php echo base_url() ?>data/data_byPatientId/"+row['12']+"' class='btn btn-primary btn-sm' value='더보기'>";
                    }
                },
            ]
        }

        data_list_table = $('#data_list_table').DataTable(datatable_attr);
    });

</script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>


