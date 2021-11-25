<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('Patient_m'));
        $this->load->helper(array('proc_send_result','aes_encode','getdbkey'));

    }

//    /**
//     * 접근 권한 체크
//     *
//     * @param int $level : 0 제한없음 / 1 고객(P) / 2 영양사(N) / 3 기관관리자(A) / 4 슈퍼관리자(T)
//     */
//    private function checkSession($level = 0)
//    {
//        $check = check_Session_level($this->session->userdata, $level);
//
//        if(!$check)
//        {
//            $this->session->sess_destroy();
//
//            $this->load->helper(Array('alert'));
//            alert('잘못된 접근입니다','login');
//            exit;
//        }
//    }

    public function patient_list()
    {
//        $this->checkSession(2);

        if (!$_POST) {

            $Logined_view_data['view_title'] = '키니신생아';
            $data['csrf_token'] = $this->security->get_csrf_hash();
            $data['AdminType'] = $this->session->userdata['AdminType'];

            $this->load->view('/kr/Logined_Header_v.php',$data);
            $this->load->view('/kr/Patient_List_v.php',$data);
            $this->load->view('/kr/Public_Footer_v.php');

            $a = 123.456 - 123.4;
            $result = bcadd(123.456, 123.4);
            error_log('12');
            error_log(print_r($result,true));

//            if ($c === 0.3) {
//                error_log('-----11--');
//            } else {
//                error_log('-----22--');
//            }

        } else {

            $AdminID = $this->session->userdata['AdminID'];
            $patientID = $this->input->post('patientID',true);
//            $patientID = $_POST['patientID'];

            $patient_list = $this->Patient_m->select_patient_list($AdminID,$patientID);
            ut_procSuccess($patient_list);

        }
    }

    public function patient_registration()
    {
        if (!$_POST) {

            $Logined_view_data['view_title'] = '키니신생아';
            $data['csrf_token'] = $this->security->get_csrf_hash();
            $data['AdminType'] = $this->session->userdata['AdminType'];

            $this->load->view('/kr/Logined_Header_v.php',$data);
            $this->load->view('/kr/Patient_Registration_v.php',$data);
            $this->load->view('/kr/Public_Footer_v.php');

        } else {

            $AdminID = $this->session->userdata['AdminID'];
            $patientID = $_POST['patientID'];
            $termType = $_POST['termType'];
            $patientBirth = $_POST['patientBirth'];
            $week = $_POST['week'];
            $day = $_POST['day'];
            $gender = $_POST['gender'];

            $patientBirth = str_replace('.','-',$patientBirth);

            $combineDays = 0;
            if (!empty($week)) {
                $combineDays = (7 * $week) + $day;
            }

            $result = $this->Patient_m->insertPatientInfo($AdminID,$patientID,$termType,$patientBirth,$week,$day,$gender,$combineDays);

            if ($result === TRUE)
            {
                ut_procSuccess();
            }
            else
            {
                ut_ProcError($result);
            }

        }
    }

    public function delete_patient()
    {
        $AdminID = $this->session->userdata['AdminID'];
        $patientID = $_POST['patientID'];

        $this->Patient_m->deletePatient($AdminID, $patientID);
        ut_procSuccess();
    }

    public function checkID()
    {
        if ($_POST) {

            $result = $this->Patient_m->checkID($_POST['checkID']);
            ut_procSuccess($result);
        }
    }
}