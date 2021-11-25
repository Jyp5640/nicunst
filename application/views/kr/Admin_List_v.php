
<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="content-page" style="margin-top: 0">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h4 class=" mb-2">담당의 리스트</h4>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-2">
                </div>
                <div class="col-md-6">
                    <input type="email" class="form-control" required
                           parsley-type="email" placeholder="담당의 ID를 입력하세요"/>
                </div>
                <div class="col-md-3">
                    <button type="reset" class="btn btn-secondary width-sm">
                        검색
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card-box mt-4">

                        <div class="table-responsive">
                            <table  class="table table-bordered table-centered mb-0 text-center">
                                <thead>
                                <tr style="background-color: #f2f2f2;">
                                    <th rowspan="2">관리자 ID</th>
                                    <th rowspan="2">소속병원</th>
                                    <th rowspan="2">소속명</th>
                                    <th rowspan="2">소속 설명</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th id="AadminID"></th>
                                    <th id="instName"></th>
                                    <td id="dmName"></td>
                                    <td id="dmCmt"></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="box" align="center">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12" id="consultListGrid"></div>
                                </div>
                            </div>
                        </div>
<!--                        <div class="row mt-4 text-center">-->
<!--                            <div class="col-sm-12">-->
<!--                                <nav>-->
<!--                                    <ul class="pagination pagination-split" style="float: right">-->
<!--                                        <li class="page-item">-->
<!--                                            <a class="page-link" href="#" aria-label="Previous">-->
<!--                                                <span aria-hidden="true">&laquo;</span>-->
<!--                                                <span class="sr-only">Previous</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                        <li class="page-item"><a class="page-link" href="#">1</a></li>-->
<!--                                        <li class="page-item active"><a class="page-link" href="#">2</a></li>-->
<!--                                        <li class="page-item"><a class="page-link" href="#">3</a></li>-->
<!--                                        <li class="page-item"><a class="page-link" href="#">4</a></li>-->
<!--                                        <li class="page-item"><a class="page-link" href="#">5</a></li>-->
<!--                                        <li class="page-item">-->
<!--                                            <a class="page-link" href="#" aria-label="Next">-->
<!--                                                <span aria-hidden="true">&raquo;</span>-->
<!--                                                <span class="sr-only">Next</span>-->
<!--                                            </a>-->
<!--                                        </li>-->
<!--                                    </ul>-->
<!--                                </nav>-->
<!--                            </div>-->
<!--                        </div>-->
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
<script type="text/javascript" src="https://uicdn.toast.com/tui.pagination/v3.4.0/tui-pagination.js"></script>
<script src="<?php echo base_url() ?>include/js/toastui/tui-code-snippet.js"></script>
<script src="<?php echo base_url() ?>include/js/toastui/tui-grid.full.min.js"></script>
<script src="<?php echo base_url() ?>include/js/morris.min.js"></script>
<script>
    function adminActYN(AdminID) {

        var formData = new FormData();

        formData.append('csrf_token', '<?= $csrf_token ?>');
        formData.append('AdminID', AdminID);

        $.ajax({
            url: '<?php echo base_url() ?>administration/adminActYN',
            processData: false,
            contentType: false,
            data: formData,
            type: 'POST',
            success: function(result) {
                var msg = JSON.parse(result);
                console.log(msg.jsonValue[0].AdminActYN);
                // let abc = "'" + '#' + AdminID + "'";
                if (msg.jsonValue[0].AdminActYN == 'N') {
                    // $('#'+AdminID).removeClass('btn-primary btn-danger');
                    // $('#'+AdminID).addClass('btn-danger');
                    $('#'+AdminID).text('활성화');
                } else {
                    // $('#'+AdminID).removeClass('btn-primary btn-danger');
                    // $('#'+AdminID).addClass('btn-primary');
                    $('#'+AdminID).text('비활성화');
                }
            }
        });
    }

    var consultListGrid;

    $(document).ready(function () {

        var formData = new FormData();

        formData.append('csrf_token', '<?= $csrf_token ?>');

        var dataset = [];

        $.ajax({
            url: '<?php echo base_url() ?>administration/adminLists',
            processData: false,
            contentType: false,
            data: formData,
            type: 'POST',
            success: function(result) {

                var msg = JSON.parse(result);
                // console.log(msg);

                if (msg.statusCode == 'ERROR') {

                    alert(msg.statusValue);
                    return false;

                } else if (msg.statusCode == 'dataOK') {

                    for (var i = 0; i < msg.jsonValue.length; i++) {

                        var consultStatus = '';

                        var dataset_temp = {
                            // 'consultIdx': msg.jsonValue[i].ConsultIdx,
                            // 'bmiIdx': msg.jsonValue[i].BmiIdx,
                            // 'no': i+1,
                            'AdminID': msg.jsonValue[i].AdminID,
                            'AdminName': msg.jsonValue[i].AdminName,
                            'AdminEmail': msg.jsonValue[i].AdminEmail,
                            'AdminPhone': msg.jsonValue[i].AdminPhone,
                            // 'InstName': msg.jsonValue[i].InstName,
                            // 'DmName': msg.jsonValue[i].DmName,
                            // 'DmCmt': msg.jsonValue[i].DmCmt,
                            'AdminActYN': msg.jsonValue[i].AdminActYN,
                            // 'regDate': msg.jsonValue[i].RegDate,
                            // 'consultDate': msg.jsonValue[i].ConsultDate,
                        };

                        dataset.push(dataset_temp);
                    }

                    $('#AadminID').text(msg.jsonValue[0].AadminID);
                    $('#instName').text(msg.jsonValue[0].InstName);
                    $('#dmName').text(msg.jsonValue[0].DmName);
                    $('#dmCmt').text(msg.jsonValue[0].DmCmt);
                }

                consultListGrid.setData(dataset);

            },
            error: function() {
                alert('[Server Error] 서버에 문제가 있습니다.');
                return false;
            }
        });

        let prevValue = '';

        const consultListGrid = new tui.Grid({
            el: $('#consultListGrid'),
            bodyHeight: 420,
            scrollX: false,
            scrollY: true,
            columns: [
                {
                    title: 'consultIdx',
                    name: 'consultIdx',
                    hidden: true
                },
                // {
                //     title: '순번',
                //     name: 'no',
                //     align: 'center',
                //     width: 50
                // },
                {
                    title: '담당의 ID',
                    name: 'AdminID',
                    align: 'center',
                },
                {
                    title: '성명',
                    name: 'AdminName',
                    align: 'center',
                    // width: 60
                },
                {
                    title: '이메일',
                    name: 'AdminEmail',
                    align: 'center',
                    // width: 80
                },
                {
                    title: '전화번호',
                    name: 'AdminPhone',
                    align: 'center',
                },
                // {
                //     title: '소속병원',
                //     name: 'InstName',
                //     align: 'center',
                // },
                // {
                //     title: '소속명',
                //     name: 'DmName',
                //     align: 'center',
                // },
                // {
                //     title: '소속 설명',
                //     name: 'DmCmt',
                //     align: 'center',
                // },
                {
                    title: '활성화 여부',
                    name: 'AdminActYN',
                    align: 'center',
                    formatter: function(value, rowData) {
                        switch (value) {
                            case 'N' : value = '비활성화'; break;
                            case 'Y' : value = '활성화'; break;
                        }
                        //input type = 'button'
                        return "<button id='" + rowData.AdminID + "' onclick=adminActYN('" + rowData.AdminID + "') " +
                            " class='btn btn-xs btn-primary'>" + value + "</button>";

                    }
                }
            ],
            rowHeaders: ['rowNum'],
            // pageOptions: {
            //     // useClient: true,
            //     perPage: true
            // }
            pagination:true
        });

        tui.Grid.applyTheme('clean');

        if ($('#test15').text('N')) {
            $('#test15').text('비활성화');
        }
        // console.log($('#test15').val());
    });

</script>
<link rel="stylesheet" href="<?php echo base_url() ?>include/css/toastui/tui-grid.min.css" />
<link rel="stylesheet" href="<?php echo base_url() ?>include/css/toastui/pagination.css" />