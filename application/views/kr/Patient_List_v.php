


    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page" style="margin-top: 0">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class=" mb-2">환자 리스트</h2>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-6">
                        <input type="text" id="searchPatientID" class="form-control" placeholder="환자 ID를 입력하세요"/>
                    </div>
                    <div class="col-md-3">
                        <button type="button" id="btnSearch" class="btn btn-secondary width-sm">
                            검색
                        </button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card-box mt-4">
<!--                            <div class="table-responsive">-->

                                <table id="patient_list_table" class="table table-bordered table-centered mb-0 text-center">
                                    <thead>
                                    <tr style="background-color: #f2f2f2;">
                                        <th>구분</th>
                                        <th>환자ID</th>
                                        <th>출생시</th>
                                        <th>생년월일</th>
                                        <th>재태주령</th>
                                        <th>성별</th>
                                        <th>등록일</th>
                                        <th >비고</th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>

<!--                            </div>-->
<!--                            <div class="row mt-4 text-center">-->
<!--                                <div class="col-sm-12">-->
<!--                                    <nav>-->
<!--                                        <ul class="pagination pagination-split" style="float: right">-->
<!--                                            <li class="page-item">-->
<!--                                                <a class="page-link" href="#" aria-label="Previous">-->
<!--                                                    <span aria-hidden="true">&laquo;</span>-->
<!--                                                    <span class="sr-only">Previous</span>-->
<!--                                                </a>-->
<!--                                            </li>-->
<!--                                            <li class="page-item"><a class="page-link" href="#">1</a></li>-->
<!--                                            <li class="page-item active"><a class="page-link" href="#">2</a></li>-->
<!--                                            <li class="page-item"><a class="page-link" href="#">3</a></li>-->
<!--                                            <li class="page-item"><a class="page-link" href="#">4</a></li>-->
<!--                                            <li class="page-item"><a class="page-link" href="#">5</a></li>-->
<!--                                            <li class="page-item">-->
<!--                                                <a class="page-link" href="#" aria-label="Next">-->
<!--                                                    <span aria-hidden="true">&raquo;</span>-->
<!--                                                    <span class="sr-only">Next</span>-->
<!--                                                </a>-->
<!--                                            </li>-->
<!--                                        </ul>-->
<!--                                    </nav>-->
<!--                                </div>-->
<!--                            </div>-->


                            <div class="row mt-4">
                                <div class="col-sm-12">
                                    <p>*위 표에서 노란색 셀 부분은 자동 산출 부분임</p>
                                </div>
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


</div>
<!-- END wrapper -->
<script>

    let patient_list_table;

    function deletePatient(data) {
        if (confirm('삭제하시겠습니까?')) {
            let formData = new FormData();

            formData.append('csrf_token', '<?= $csrf_token ?>');

            formData.append('patientID', data);

            $.ajax({
                url: '<?php echo base_url() ?>patient/delete_patient',
                processData: false,
                contentType: false,
                data: formData,
                type: 'POST',
                success: function (result) {
                    let msg = JSON.parse(result);
                    console.log(msg);

                    if (msg.statusValue === 'ok') {

                        alert('환자가 정상적으로 삭제되었습니다.');
                        location.reload();

                    } else {
                        alert(msg.statusValue);
                        return;
                    }
                }
            });
        }
    }

    function render_patient_list_table(data,ready = false)
    {
        let dataset = [];

        for (let i = 0 ; i < data.length ; i++)
        {
            let dataset_temp = [];

            // dataset_temp.push("<a href='<?php //echo base_url(); ?>//delivery/cust_delivery_view/"+data[i]['od_id']+"'>"+data[i]['od_id']+"</a>");
            // dataset_temp.push("<input type='checkbox' class='d_list_checkbox' d_idx='"+data[i]['d_idx']+"'>");
            dataset_temp.push(i+1);
            dataset_temp.push(data[i]['ptn_id']);
            dataset_temp.push(data[i]['ptn_termtype']);
            dataset_temp.push(data[i]['ptn_birthday']);
            dataset_temp.push(data[i]['ptn_ga_week']);
            dataset_temp.push(data[i]['ptn_sex']);
            dataset_temp.push(data[i]['ptn_regdate']);
            dataset_temp.push(data[i]['ptn_ga_day']);

            dataset.push(dataset_temp);
        }

        // let datatable_attr = {}

        patient_list_table.clear();
        patient_list_table.rows.add(dataset);
        patient_list_table.draw();
    }

    function search() {

        let formData = new FormData();

        formData.append("csrf_token","<?= $csrf_token ?>");
        formData.append('patientID', $('#searchPatientID').val());

        $.ajax({
            url: '<?php echo base_url() ?>patient/patient_list',
            processData: false,
            contentType: false,
            data: formData,
            type: 'POST',
            success: function (result) {
                let msg = JSON.parse(result);
                console.log(msg);

                render_patient_list_table(msg.jsonValue,true);
            }
        });
    }

    $(document).ready(function () {
        let x = 123.456; let y = 123.4;
        let result = 0.056;
        console.log(2.3*100);
        console.log((123.456 - 123.4).toFixed(3));
        console.log(Math.round((123.456-123.4)*1000)/1000);
        if (x - y === result) {
            console.log('rrr');
        }

        let datatable_attr = {
            "paging": true,
            // "data" : dataset,
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
                        switch (data) {
                            case 'P' : return '미숙아'; break;
                            case 'T' : return '만삭아'; break;
                        }
                    }
                },
                {"data": 3},
                {"data": 4,
                    "render" : function (data, type, row) {
                        if (data == '0') {
                            return "<span>-</span>";
                        } else {
                            return "<span>" + data + 'w' + "</span>&nbsp;<span>" + row['7'] + 'd' + "</span>";
                        }
                    }
                },
                {"data": 5,
                    "render" : function (data, type, row) {
                        switch (data) {
                            case 'M' : return '남자'; break;
                            case 'F' : return '여자'; break;
                        }
                    }
                },
                {"data": 6},
                {"data": 1,
                    "render" : function (data, type, row) {
                        return "<input type='button' class='btn btn-danger' value='삭제' onclick=deletePatient('" + data + "')>";
                    }
                }
            ],
        };

        patient_list_table = $('#patient_list_table').DataTable(datatable_attr);

        search();

        $( '#btnSearch' ).click( function() {
            // alert($('#searchPatientID').val());
            search();
        });

    });
</script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
