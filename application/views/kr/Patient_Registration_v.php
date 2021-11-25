

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page" style="margin-top: 0">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-3">
                        <h2 class=" mb-2">환자 신규 등록</h2>
                    </div>
                    <div class="col-md-9">
                        <p class="mt-2" style="color: #ff6666">*환자 신규 등록시 주의사항! <br>
                            환자 기본정보를 잘못 입력했을 경우 추후 수정은 불가능하며, 삭제만 가능합니다. <br>
                            삭제시 해당ID에 대한 모든 데이터가 영구삭제되며, 복구 불가능하므로 신중히 입력바랍니다.</p>
                    </div>
                </div>

                <form id="patientRegistForm">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">

                            <div class="">
                                <div class="">
                                    <div class="table-responsive" data-pattern="priority-columns">
                                        <table id="tech-companies-1" class="table table-bordered mb-0">
                                            <thead>
                                            <tr style="background-color: #f2f2f2; text-align: center">
                                                <th>구분</th>
                                                <th>입력값</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th>1. 환자 ID</th>
                                                <td>
                                                    <div class="row" style="padding-left:10px">
                                                        <div class="col-sm-4">
                                                            <input type="text" id="patientID" class="form-control" required placeholder="환자 ID입력"/>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <button type="button" class="btn btn-info" id="checkID">중복확인</button>
                                                            &nbsp;&nbsp;<span id ='idcheck'></span>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>2. 생년월일</th>
                                                <td>
                                                    <div class="col-sm-3">
                                                        <input type="text" class="form-control" required
                                                               id="patientBirth" name="patientBirth" autocomplete="off" placeholder="생년월일 입력"/>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>3. 출산시 </th>
                                                <td>
                                                    <div class="row pl-4" style="padding-left: 10px">
                                                        <div class="col-sm-4">
                                                            <div class="radio width-sm form-check-inline">
                                                                <input type="radio" id="preterm" value="P" name="termType" checked>
                                                                <label for="preterm"> 미숙아 </label>
                                                            </div>
                                                            <div class="radio width-sm form-check-inline">
                                                                <input type="radio" id="term" value="T" name="termType">
                                                                <label for="term"> 만삭아 </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <p>*각 해당 그래프 적용</p>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>4. 재태주령</th>
                                                <td>
                                                    <div class="row pl-3">
                                                        <div class="col-sm-3">
                                                            <div class="form-group row">
                                                                <div class="col-sm-7">
                                                                    <input id="week" type="number" placeholder="0" class="form-control" min="22" max="50" required>
                                                                </div>
                                                                <label for="week" class="col-sm-4 col-form-label">주</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group row">
                                                                <div class="col-sm-7">
                                                                    <input id="day" type="number" placeholder="0" required class="form-control" min="0" max="6">
                                                                </div>
                                                                <label for="day" class="col-sm-4 col-form-label">일</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <p class="mt-1">(<span style="color: #ff6666">미숙아: 필수입력</span>/<span class="text-info">만삭아: 미입력</span>)</p>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>5. 성별</th>
                                                <td>
                                                    <div class="row pl-4" style="padding-left: 10px">
                                                        <div class="col-sm-4">
                                                            <div class="radio width-sm form-check-inline">
                                                                <input type="radio" id="genderMan" value="M" name="gender" checked>
                                                                <label for="genderMan"> 남자 </label>
                                                            </div>
                                                            <div class="radio width-sm form-check-inline">
                                                                <input type="radio" id="genderWoman" value="F" name="gender">
                                                                <label for="genderWoman"> 여자 </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 text-right">
                                    <button type="reset" class="btn btn-lighten-secondary waves-effect waves-light width-lg">
                                        취  소
                                    </button>
                                    <button type="submit" class="btn btn-primary waves-effect waves-light width-lg">
                                        등록
                                    </button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <span>4 재태주령</span><br>
                                    <span class="pl-2"> * Week:22-50주 사이값으로 입력</span><br>
                                    <span class="pl-2"> * Day: 0-6일 사이값으로 입력</span><br><br>
                                    <span>참고</span><br>
                                    <span class="pl-2"> * 미숙아: Fenton 2013 Growth Chart for Preterm Infants 적용</span><br>
                                    <span class="pl-2"> * 만삭아: 2017년 소아청소년성장도표 적용</span><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </form>

            </div> <!-- container-fluid -->

        </div> <!-- content -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<script>
    $(function (){
       $('#patientBirth').datepicker({
           dateFormat: 'yy-mm-dd',
           changeYear: true,
           yearRange: 'c-3:c+0',
           changeMonth: true,
           dayNamesMin: ['월', '화', '수', '목', '금', '토', '일'], // 요일의 한글 형식.
           monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'], // 월의 한글 형식.
           maxDate:0
       });
    });

    $('#checkID').click(function () {

        if($("#patientID").val().length == 0){
            alert("ID 를 입력해주세요");
            return;
        }

        var formData = new FormData();

        formData.append('checkID', $('#patientID').val());

        $.ajax({
            url: "<?php echo base_url(); ?>patient/checkID",
            processData: false,
            contentType: false,
            data: formData,
            type: 'POST',
            success: function (msg) {
                msg = JSON.parse(msg);
                // console.log(msg);

                if($("#patientID").val().length < 4)
                {
                    alert('아이디는 최소 4자 이상부터 가능합니다.');
                    return;
                }
                else if($("#patientID").val().length > 10)
                {
                    alert('아이디는 최대 10자 까지 가능합니다.');
                    return;
                }

                if (msg.statusCode == "dataOK") {
                    if (msg.jsonValue.length === 0) {

                        $('#idcheck').text('사용 가능한 아이디입니다.');
                        $('#patientID').addClass('is-valid');
                    } else {
                        $('#idcheck').text('이미 사용중인 아이디입니다.');
                        $('#patientID').addClass('is-invalid');
                    }
                } else {
                    alert(msg.statusValue);
                }
            }
        });
    });

    $('#patientID').focusin(function() {
        $('#idcheck').text('');
        $('#patientID').removeClass('is-valid is-invalid');
    });

    $(document).ready(function () {

        // $('input#patientBirth').inputmask({'mask': '9999.99.99'});  // yyyy.mm.dd

        // 미숙아 선택시에만 재태주령 입력가능, 만삭아 선택시 입력불가
        $('input:radio[name=termType]').change(function (){
            var radioValue = $(this).val();

            if (radioValue == 'T') {
                $("input#week").attr('disabled', true);
                $("input#day").attr('disabled', true);
                $("input#week").val('');
                $("input#day").val('');
            } else {
                $("input#week").attr('disabled', false);
                $("input#day").attr('disabled', false);
            }
        });


        $('#patientRegistForm').validate({
            submitHandler: function (form) {

                if ($('input:radio[name=termType]:checked').val() == 'P') {
                    if ($('#week').val() == '' || $('#day').val() == '') {
                        alert('필수항목을 입력하지 않았습니다');
                        return;
                    }

                    if ($('#week').attr('class') == 'form-control error') {
                        alert('22-50주 사이값으로 입력해주시기 바랍니다');
                        $('#week').focus();
                        return;
                    }

                    if ($('#day').attr('class') == 'form-control error') {
                        alert('0-6일 사이값으로 입력해주시기 바랍니다');
                        $('#day').focus();
                        return;
                    }
                }

                if($('#patientID').attr('class').slice(-8) !== 'is-valid')
                {
                    alert('아이디 중복체크를 해주세요');
                    return;
                }

                if (confirm('환자를 등록 하시겠습니까?')) {
                    let formData = new FormData();

                    formData.append('csrf_token', '<?= $csrf_token ?>');

                    formData.append('patientID', $('input#patientID').val());
                    formData.append('patientBirth', $('input#patientBirth').val());
                    formData.append('termType', $('input:radio[name=termType]:checked').val());
                    formData.append('week', $('input#week').val());
                    formData.append('day', $('input#day').val());
                    formData.append('gender', $('input:radio[name=gender]:checked').val());

                    $.ajax({
                        url: '<?php echo base_url() ?>patient/patient_registration',
                        processData: false,
                        contentType: false,
                        data: formData,
                        type: 'POST',
                        success: function (result) {
                            let msg = JSON.parse(result);
                            console.log(msg);

                            if (msg.statusValue === 'ok') {

                                alert('환자가 정상적으로 등록되었습니다.');
                                location.reload();

                            } else {
                                alert(msg.statusValue);
                                return;
                            }
                        }
                    });
                }
            }
        });

        // 아이디 입력시엔 영문 숫자만 허용
        $("#patientID").keyup(function(event){
            if (!(37 <= event.keyCode && event.keyCode<=40)) {
                var inputVal = $(this).val();
                $(this).val(inputVal.replace(/[^a-z0-9]/gi,''));
            }
        });

    });
</script>

