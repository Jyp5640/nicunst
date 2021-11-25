
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page" style="margin-top: 0">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-12">
                        <h4 class=" mb-2">환자 데이터 등록</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">

                                <form method="post" name="frmCsvUp" id="frmCsvUp">
                                    <div class="form-row align-items-center">
                                        <div class="col-auto">

                                                <a href="" class="btn btn-lighten-secondary" target="_blank">CSV파일 예제/ 다운로드 받으세요 </a>
                                                <!--                                                <label class="sr-only" for="inlineFormInput">Name</label>-->
                                                <!--                                                <input type="text" class="form-control" id="inlineFormInput" placeholder="CSV파일 예제/ 다운로드 받으세요 ">-->

                                        </div>
                                        <div class="col-sm-5">
                                            <div class="">
                                                <div class="">
<!--                                                    <input type="file" class="custom-file-input" name="file" id="inputFile" aria-describedby="fileHelp">-->
<!--                                                    <label class="custom-file-label" for="inputFile" id="fileLabel">-->
<!--                                                        + 버튼을 눌러 CSV파일을 업로드 해주세요!-->
<!--                                                    </label>-->
                                                    <input type="file" class="border w-50" name="upCsv" id="upCsv" />
                                                    <a href="#" class="btn btn-primary btnUpCsv"><span class="text">파일 업로드</span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div style="padding-left: 40px">
                                                <button type="reset" id="cancel" class="btn btn-lighten-secondary width-sm">취소</button>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <div class="">
                                                <button type="submit" class="btn btn-primary width-sm">등록하기</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            <br>
<!--                            <div class="table-responsive" data-pattern="priority-columns">-->

                                <table id="data_reg_table" class="table table-bordered table-centered mb-0 text-center">
                                    <thead>
                                    <tr style="background-color: #f2f2f2; text-align: center">
                                        <th>구분</th>
                                        <th>CSV ID</th>
                                        <th>ID</th>
                                        <th>CSV 일자</th>
                                        <th>최근 등록일</th>
                                        <th>PMA</th>
                                        <th>등록 여부</th>
                                        <th>내용</th>
                                        <th>삭제</th>
                                    </tr>
                                    </thead>
                                    <tbody>
<!--                                    <tr>-->
<!--                                        <td>1</td>-->
<!--                                        <td>입력값</td>-->
<!--                                        <td style="color: #ff6666">자동산출</td>-->
<!--                                        <td>입력값</td>-->
<!--                                        <td style="color: #ff6666">자동산출</td>-->
<!--                                        <td style="color: #ff6666">00w 00d</td>-->
<!--                                        <td style="color: #ff6666">등록불가</td>-->
<!--                                        <td class="text-center">-->
<!--                                            <button type="reset" class="btn btn-primary width-sm" style="padding: 0">상세보기</button>-->
<!--                                        </td>-->
<!--                                        <td class="text-center">-->
<!--                                            <button type="reset" class="btn btn-danger width-sm" style="padding: 0">삭제</button>-->
<!--                                        </td>-->
<!--                                    </tr>-->
<!--                                    <tr>-->
<!--                                        <td>2</td>-->
<!--                                        <td>입력값</td>-->
<!--                                        <td style="color: #ff6666">자동산출</td>-->
<!--                                        <td>입력값</td>-->
<!--                                        <td style="color: #ff6666">자동산출</td>-->
<!--                                        <td style="color: #ff6666">00w 00d</td>-->
<!--                                        <td class="text-info">등록불가</td>-->
<!--                                        <td class="text-center">-->
<!--                                            <button type="reset" class="btn btn-primary width-sm" style="padding: 0">상세보기</button>-->
<!--                                        </td>-->
<!--                                        <td class="text-center">-->
<!--                                            <button type="reset" class="btn btn-danger width-sm" style="padding: 0">삭제</button>-->
<!--                                        </td>-->
<!--                                    </tr>-->

                                    </tbody>
                                </table>
<!--                            </div>-->


                            <div class="row">
                                <div class="col-sm-12">
                                    <p style="color: #ff6666">
                                        * 등록불가 판정 이유 <br>
                                        1) CSV ID와 동일한 정보가 없는 경우(ID, 성별, 생년월일) => CSV 정보(ID, 성별, 생년월일)와 동일하게 환자 신규 등록한 후 데이터 업로드하기<br>
                                        2) CSV 일자가 최근 등록일과 동일한 경우 => 등록하고자 하는 CSV 파일의 일자를 변경 또는 "데이터 수정" 메뉴에서 해당일자 데이터를 삭제하기
                                    </p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <p class="text-info">* 등록하기 버튼을 반드시 눌러야 데이터가 시스템에 최종 등록됩니다.</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <p>* 등록여부 중 등록 불가능한 사례 1) CSV 날짜 동일시 등록불가 2) CSV ID 미 매칭시 등록불가 <br>
                                        * PN값의 경우 TPN산출값이 있을 경우 PN값은 입력되지 않음
                                    </p>
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

    <!-- Data Modal-->
    <div class="modal fade modalEdit" tabindex="-1" role="dialog" data-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">CSV 환자 데이터 확인</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="post" name="frmCsvEdit" id="frmCsvEdit" action="" data-no="">
                    <div class="modal-body">
                        <h3>기본정보</h3>
                        <div class="row">
                            <div class="col">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                    <th width="20%">CSV ID</th>
                                    <th width="20%">환자 ID</th>
                                    <th width="20%">최근 등록일</th>
                                    <th width="20%">CSV 일자</th>
                                    <th width="20%">등록 여부*</th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="text" name="csvid" id="csvid"></td>
                                        <td id="id"></td>
                                        <td id="latest_date"></td>
                                        <td><input type="text" name="csvdate" id="csvdate"></td>
                                        <td id="state"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                    <th width="20%">생년월일</th>
                                    <th width="20%">재태주령</th>
                                    <th width="20%">출생상태</th>
                                    <th width="20%">성별</th>
                                    <th width="20%">분류</th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td id="birthday"></td>
                                        <td id="ga"></td>
                                        <td id="termtype"></td>
                                        <td id="sex"></td>
                                        <td id="div"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                    <th width="20%">Wt(g)</th>
                                    <th width="20%">Ht(cm)</th>
                                    <th width="20%">HC(cm)</th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="text" name="weight" id="weight"></td>
                                        <td><input type="text" name="height" id="height"></td>
                                        <td><input type="text" name="hc" id="hc"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <h3>EN 및 PN</h3>
                        <div class="row">
                            <div class="col">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                    <th width="20%">G(GIR)</th>
                                    <th width="20%">A(g/kg)</th>
                                    <th width="20%">L(g/kg)</th>
                                    <th width="20%">cc/kg(PN)</th>
                                    <th width="20%">kcal(PN)</th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="text" name="g" id="g"></td>
                                        <td><input type="text" name="a" id="a"></td>
                                        <td><input type="text" name="l" id="l"></td>
                                        <td><input type="text" name="cc" id="cc"></td>
                                        <td><input type="text" name="kcal" id="kcal"></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <table class="table table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                    <th width="20%">EN 종류</th>
                                    <th width="20%">총 용량(cc/d)</th>
                                    <th width="20%">공급횟수(회)</th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="text" name="en1" id="en1"></td>
                                        <td><input type="text" name="en1_cc" id="en1_cc"></td>
                                        <td><input type="text" name="en1_feedings" id="en1_feedings"></td>
                                        <td><a href="#" class="btn btn-primary btn-sm btnEnDel"><span class="text">삭제</span></a></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="en2" id="en2"></td>
                                        <td><input type="text" name="en2_cc" id="en2_cc"></td>
                                        <td><input type="text" name="en2_feedings" id="en2_feedings"></td>
                                        <td><a href="#" class="btn btn-primary btn-sm btnEnDel"><span class="text">삭제</span></a></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="en3" id="en3"></td>
                                        <td><input type="text" name="en3_cc" id="en3_cc"></td>
                                        <td><input type="text" name="en3_feedings" id="en3_feedings"></td>
                                        <td><a href="#" class="btn btn-primary btn-sm btnEnDel"><span class="text">삭제</span></a></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="en4" id="en4"></td>
                                        <td><input type="text" name="en4_cc" id="en4_cc"></td>
                                        <td><input type="text" name="en4_feedings" id="en4_feedings"></td>
                                        <td><a href="#" class="btn btn-primary btn-sm btnEnDel"><span class="text">삭제</span></a></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="en5" id="en5"></td>
                                        <td><input type="text" name="en5_cc" id="en5_cc"></td>
                                        <td><input type="text" name="en5_feedings" id="en5_feedings"></td>
                                        <td><a href="#" class="btn btn-primary btn-sm btnEnDel"><span class="text">삭제</span></a></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">닫기</button>
<!--                    <a class="btn btn-primary btnEditComplete" href="#">수정</a>-->
<!--                    <input type="button" class="btn btn-primary btnEditComplete" value="수정">-->
                    <button class="btn btn-primary btnEditComplete" type="button">수정</button>
                </div>
            </div>
        </div>
    </div>

<script>
    $('#cancel').click(function (_e){
        location.reload();
    });

    $('.btnEnDel').click(function(_e){
        $(this).closest('tr').find('input').val('');
    });

    let data_reg_table;
    let csvDataSave;
    let csvDataRow;
    let csvDataArr = new Array();

    $('.btnUpCsv').click(function(_e){

        let formData = new FormData( document.getElementById('frmCsvUp') );
        formData.append('sMode','PROC_CSV_UP');

        $.ajax({
            url: "<?php echo base_url(); ?>data/data_registration",
            processData:false,
            contentType:false,
            data:formData,
            type:'POST',
            enctype:'multipart/form-data',
            cache:false,
            timeout:60000,
            // dataType:'json',
            error:function(_e){
                console.log(_e.responseText);
                console.log('error');
            },
            success:function(result){
                let msg = JSON.parse(result);
                // if( _json.sResult == 'Y' ) location.reload();
                // else alert( _json.sMessage );
                console.log('success');
                console.log(msg);
                csvDataSave = msg.jsonValue.csvData;
                render_data_reg_table(msg.jsonValue,true);
            }
        });
    });

    function csvPopup(data) {

        let formData = new FormData;

        formData.append('csvDataSave', csvDataSave);
        formData.append('csvNumber', data);

        $.ajax({
            url: "<?php echo base_url(); ?>data/data_detail",
            processData: false,
            contentType: false,
            data: formData,
            type: 'POST',
            cache:false,
            success: function (result) {
                let msg = JSON.parse(result);
                // console.log(msg);
                let csvData = msg.jsonValue['csvData'];
                let pnData = msg.jsonValue['patientData'];
                // csvData[3] = '1012';
                $('.btnEditComplete').val(data);

                $('#csvid').val(csvData[1]);
                $('#csvdate').val(csvData[2]);
                $('#weight').val(csvData[3]);
                $('#height').val(csvData[4]);
                $('#hc').val(csvData[5]);

                $('#g').val(csvData[21]);
                $('#a').val(csvData[22]);
                $('#l').val(csvData[23]);
                $('#cc').val(csvData[24]);
                $('#kcal').val(csvData[25]);

                $('#en1').val(csvData[6]);
                $('#en1_cc').val(csvData[7]);
                $('#en1_feedings').val(csvData[8]);

                $('#en2').val(csvData[9]);
                $('#en2_cc').val(csvData[10]);
                $('#en2_feedings').val(csvData[11]);

                $('#en3').val(csvData[12]);
                $('#en3_cc').val(csvData[13]);
                $('#en3_feedings').val(csvData[14]);

                if (Array.isArray(pnData) && pnData.length === 0) {
                    $('#id').html('-');
                    $('#birthday').html('-');
                    $('#ga').html('-');
                    $('#termtype').html('-');
                    $('#sex').html('-');
                    $('#state').html('불가');
                } else {
                    let ptn_termtype = '';
                    let ptn_sex = '';
                    pnData[0]['ptn_termtype'] == 'P' ? ptn_termtype = '미숙아' : ptn_termtype = '만삭아';
                    pnData[0]['ptn_sex'] == 'M' ? ptn_sex = '남자' : ptn_sex = '여자';

                    $('#id').html(pnData[0]['ptn_id']);
                    $('#birthday').html(pnData[0]['ptn_birthday']);
                    $('#ga').html(pnData[0]['ptn_ga_week']+'주 '+pnData[0]['ptn_ga_day']+'일');
                    $('#termtype').html(ptn_termtype);
                    $('#sex').html(ptn_sex);
                    $('#state').html('가능');
                }

                // Array.isArray(pnData) && pnData.length === 0 ? $('#birthday').html(''); : $('#birthday').html(pnData[0]['ptn_id']);

            }
        });
    }

    $('.btnEditComplete').on('click',function(){

        let csvData = new Array();

        csvData[0] = '';
        csvData[1] = $('#csvid').val();
        csvData[2] = $('#csvdate').val();
        csvData[3] = $('#weight').val();
        csvData[4] = $('#height').val();
        csvData[5] = $('#hc').val();
        csvData[6] = $('#en1').val();
        csvData[7] = $('#en1_cc').val();
        csvData[8] = $('#en1_feedings').val();
        csvData[9] = $('#en2').val();
        csvData[10] = $('#en2_cc').val();
        csvData[11] = $('#en2_feedings').val();
        csvData[12] = $('#en3').val();
        csvData[13] = $('#en3_cc').val();
        csvData[14] = $('#en3_feedings').val();
        csvData[15] = $('#en4').val();
        csvData[16] = $('#en4_cc').val();
        csvData[17] = $('#en4_feedings').val();
        csvData[18] = $('#en5').val();
        csvData[19] = $('#en5_cc').val();
        csvData[20] = $('#en5_feedings').val();
        csvData[21] = $('#g').val();
        csvData[22] = $('#a').val();
        csvData[23] = $('#l').val();
        csvData[24] = $('#cc').val();
        csvData[25] = $('#kcal').val();

        let orderData = $('.btnEditComplete').val();

        let formData = new FormData;

        // formData.append('csvDataSave', csvDataSave);
        formData.append('csvData', csvData);
        formData.append('csvNumber', orderData);

        if (confirm('수정하시겠습니까?')) {
            $.ajax({
                url: "<?php echo base_url(); ?>data/data_detail",
                processData: false,
                contentType: false,
                data: formData,
                type: 'POST',
                // cache:false,
                success: function (result2) {
                    let msg2 = JSON.parse(result2);
                    console.log(msg2);
                    csvDataSave[orderData] = msg2.jsonValue.csvData;
                    console.log('---------------000----------');
                    console.log(csvDataSave);
                }
            });
        }
    });

    function deleteCsvData(data,thisTag) {
        if (confirm('삭제하시겠습니까?')) {

            for (let i = 0; i < csvDataSave.length; i++) {
                if (csvDataSave[i][1] == data) {
                    csvDataSave.splice(i,1);
                }
            }

            data_reg_table.row(thisTag.closest('td').closest('tr')).remove().draw();
        }
    }

    var iNo = '';

    // # CSV 데이터 팝업
    // $('.btnEdit').click(function(_e){
    //     iNo = $(this).closest('tr').attr('data-no');
    //
    //     var formData = new FormData();
    //     formData.append('sMode','CSV_ONE');
    //     formData.append('valNo',iNo);
    //
    //     $.ajax({type:'POST',enctype:'multipart/form-data',processData:false,contentType:false,cache:false,timeout:60000
    //         ,url:'./_ajax/_ajax.data.php',data:formData,dataType:'json'
    //         ,error:function(_e){
    //             console.log(_e.responseText);
    //         },success:function(_json){
    //             if( _json.sResult == 'Y' ) {
    //                 var oJson = _json.aData
    //                 $.each(oJson, function(_idx, _val) {
    //                     var obj = $('#'+_idx);
    //                     if( obj.is('input') == true ) obj.val(_val);
    //                     else obj.html(_val);
    //                 });
    //
    //                 sState = '가능';
    //                 switch(oJson.state) {
    //                     case 'ID': sState = '불가 [환자ID 미등록]'; break;
    //                     case 'DATE' : sState = '불가 [CSV 일자 중복]';break;
    //                 }
    //
    //                 $('#state').text( sState );
    //                 $('#div').text( 'SGA/AGA/LGA 중 하나');
    //             }
    //         }
    //     });
    // });

    //# CSV 데이터 수정
    // $('.btnEditComplete').click(function(_e){
    //     var formData = new FormData( document.getElementById('frmCsvEdit') );
    //     formData.append('sMode','PROC_CSV_EDIT');
    //     formData.append('valNo',iNo);
    //
    //     $.ajax({
    //         type:'POST',
    //         enctype:'multipart/form-data',
    //         processData:false,
    //         contentType:false,
    //         cache:false,
    //         timeout:60000,
    //         url:'./_ajax/_ajax.patient.php',
    //         data:formData,
    //         dataType:'json'
    //         ,error:function(_e){
    //             console.log(_e.responseText);
    //         },success:function(_json){
    //             console.log( _json );
    //             if( _json.sResult == 'Y' ) location.reload();
    //         }
    //     });
    // });

    function render_data_reg_table(data,ready = false)
    {
        let dataset = [];
        let j = 0;

        for (let i = 1 ; i < data['csvData'].length ; i++)
        {
            console.log(data);
            let dataset_temp = [];

            // dataset_temp.push("<a href='<?php //echo base_url(); ?>//delivery/cust_delivery_view/"+data[i]['od_id']+"'>"+data[i]['od_id']+"</a>");
            // dataset_temp.push("<input type='checkbox' class='d_list_checkbox' d_idx='"+data[i]['d_idx']+"'>");
            dataset_temp.push(i);
            dataset_temp.push(data['csvData'][i][1]);

            if (Array.isArray(data['patientID'][i-1]) && data['patientID'][i-1].length === 0) {
                dataset_temp.push('-');
            } else {
                dataset_temp.push(data['csvData'][i][1]);
            }

            dataset_temp.push(data['csvData'][i][2]);

            if (Array.isArray(data['patientID'][i-1]) && data['patientID'][i-1].length === 0) {
                dataset_temp.push('-');
            } else {
                dataset_temp.push(data['pmaData'][j][0]['ptn_latest_date']);
                // j++;
            }

            if (Array.isArray(data['patientID'][i-1]) && data['patientID'][i-1].length === 0) {
                dataset_temp.push('-');
            } else {
                dataset_temp.push(data['pmaData'][j][0]['ptn_combine_days']);
                j++;
            }

            if (Array.isArray(data['patientID'][i-1]) && data['patientID'][i-1].length === 0) {
                dataset_temp.push('-');
            } else {
                dataset_temp.push(data['pmaData'][j-1][0]['ptn_regdate']);
            }

            dataset.push(dataset_temp);
        }

        data_reg_table.clear();
        data_reg_table.rows.add(dataset);
        data_reg_table.draw();
    }

    $(document).ready(function () {

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
                {"data": 2},
                {"data": 3},
                {"data": 4},
                {"data": 5,
                    "render" : function (data, type, row) {
                    if (data == 0 || data == '-') {
                        return "<span>-</span>";
                    } else {

                        let regDateArr = row['6'].split('-');
                        let csvDateArr = row['3'].split('-');

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
                {"data": 6,
                    "render" : function (data, type, row) {

                    let regDateArr = data.split('-');
                    let csvDateArr = row['3'].split('-');

                    let regDateCompare = new Date(regDateArr[0],parseInt(regDateArr[1])-1,regDateArr[2]);
                    let csvDateCompare = new Date(csvDateArr[0],parseInt(csvDateArr[1])-1,csvDateArr[2]);

                    if (csvDateCompare.getTime() > regDateCompare.getTime()) {

                        // csvDataRow = csvDataSave[row['0']];
                        // csvDataRow.splice(0,1);

                        // csvDataArr.push(csvDataRow);

                        return "<span>등록가능</span>"
                    } else {
                        return "<span>등록불가</span>"
                    }
                    }
                },
                {"data": 0,
                    "render" : function (data, type, row) {
                        // return "<input type='button' class='btn btn-danger' value='삭제' onclick=deletePatient('" + data + "')>";
                        return "<input type='button' onclick=csvPopup('" + data + "') class='btn btn-primary btn-sm btnEdit' data-toggle='modal' data-target='.modalEdit' value='상세보기'></input>";
                    }
                },
                {"data": 1,
                    "render" : function (data, type, row) {
                        return "<input type='button' class='btn btn-danger' value='삭제' onclick=deleteCsvData('" + data + "',this)>";
                    }
                },
            ]
        }

        data_reg_table = $('#data_reg_table').DataTable(datatable_attr);

        $('#frmCsvUp').validate({
            submitHandler: function (form) {

                let spanValue = $('#data_reg_table tr td span');

                let regAble = new Array();
                let regUnable = new Array();

                for (let i = 0; i < spanValue.length; i++) {
                    if (spanValue[i].childNodes[0].nodeValue == '등록가능') {
                        regAble.push(1);
                    }
                    // else if (spanValue[i].childNodes[0].nodeValue == '등록불가') {
                    //     regUnable.push(1);
                    // }
                }

                if (regAble.length == 0) {  // 목록에 등록 가능한 데이터가 없을때 리턴
                    alert('등록가능한 데이터가 없습니다.');
                    return;
                }

                console.log('-----------2323');
                console.log(data_reg_table.rows().data().length);
                console.log(csvDataSave);

                for (let i = 0; i < data_reg_table.rows().data().length; i++) {

                    let regDate = data_reg_table.rows().data()[i][6];
                    let csvDate = data_reg_table.rows().data()[i][3];

                    let regDate2 = regDate.split('-');
                    let csvDate2 = csvDate.split('-');

                    let regDateCompare = new Date(regDate2[0],parseInt(regDate2[1])-1,regDate2[2]);
                    let csvDateCompare = new Date(csvDate2[0],parseInt(csvDate2[1])-1,csvDate2[2]);

                    if (csvDateCompare.getTime() > regDateCompare.getTime()) {

                        csvDataRow = csvDataSave[i+1];
                        csvDataArr.push(csvDataRow);

                        console.log(csvDataArr);

                    } else {
                        console.log(csvDataSave[i+1]);
                        regUnable.push(csvDataSave[i+1]);
                    }
                }
                console.log(csvDataArr.length);

                // if (regUnable.length > 0) {
                //     alert('등록불가한 데이터가 있습니다.');
                //     return;
                // }

                let ptnIdArr = new Array();
                for (let i = 0; i < csvDataArr.length; i++) {
                    ptnIdArr.push(csvDataArr[i][1]);
                }

                let formData = new FormData();

                formData.append('csrf_token', '<?= $csrf_token ?>');
                formData.append('csvDataArr', csvDataArr);
                formData.append('ptnIdArr', ptnIdArr);

                if (confirm('환자데이터를 등록 하시겠습니까?')) {
                    $.ajax({
                        url: '<?php echo base_url() ?>data/csv_data_registration',
                        processData: false,
                        contentType: false,
                        data: formData,
                        type: 'POST',
                        success: function (result) {
                            let msg = JSON.parse(result);
                            console.log(msg);

                            if (msg.statusValue === 'ok') {
                                window.open("./csv_data_registration_popup/"+csvDataArr.length+"/"+regUnable.length,"popup","top=150,left=350,width=500,height=350");
                                location.reload();

                            } else {
                                alert(msg.statusValue);
                                return;
                            }
                        },
                        error:function (request, status, error) {
                            alert('등록에 실패했습니다.');
                            location.reload();
                        }
                    });
                }
            }
        });

    });
</script>

