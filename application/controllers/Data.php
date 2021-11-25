<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//setlocale(LC_CTYPE, "ko_KR.eucKR");
//setlocale(LC_CTYPE, "en_US.UTF-8");
class Data extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('Patient_m','Data_m'));
        $this->load->helper(array('proc_send_result','aes_encode','getdbkey'));

    }

    public function data_registration()
    {
        if (!$_POST) {

            $Logined_view_data['view_title'] = '키니신생아';
            $data['csrf_token'] = $this->security->get_csrf_hash();
            $data['AdminType'] = $this->session->userdata['AdminType'];

            $this->load->view('/kr/Logined_Header_v.php',$data);
            $this->load->view('/kr/Data_Registration_v.php',$data);
            $this->load->view('/kr/Public_Footer_v.php');

        } else {

            // error_log(print_r($_POST,true));
            // error_log(print_r($_FILES,true));

            $csvNumber = 1;

            $AdminID = $this->session->userdata['AdminID'];

            $csvName = $_FILES['upCsv']['tmp_name'];

            $dataArr = array();

            $row = 1;
            if (($handle = fopen($csvName, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
//                    error_log(print_r($data,true));
                    $num = count($data);
//                    echo "<p> $num fields in line $row: <br /></p>\n";
                    $row++;

                    for ($c=0; $c < $num; $c++) {
//                        echo $data[$c] . "<br />\n";
                        $data[$c] = iconv("EUC-KR", "UTF-8", $data[$c]);
                    }
                    array_push($dataArr,$data);

                }
                fclose($handle);
            }

            $ptnIdArr = array();
            $ptnDataArr = array();
            for ($i =1; $i < count($dataArr); $i++) {

                $patientID = $this->Patient_m->checkID($dataArr[$i][1]);
                array_push($ptnIdArr,$patientID);

                if (!empty($patientID[0])) {
                    $patient_list = $this->Patient_m->select_patient_list($AdminID,$patientID[0]['ptn_id']);
                    array_push($ptnDataArr,$patient_list);
                }
            }

//            $patientID = $this->Patient_m->select_patient_id($params);

            $result = [
                'csvData' => $dataArr,
                'patientID' => $ptnIdArr,
                'pmaData' => $ptnDataArr
            ];

            ut_procSuccess($result);

        }
    }

    public function csv_data_registration()
    {
        try
        {
            $AdminID = $this->session->userdata['AdminID'];
            $csvDataArr = $_POST['csvDataArr'];
            $ptnIdArr = $_POST['ptnIdArr'];

            $ptnIdArr = explode(',',$ptnIdArr);

            $result = $this->Patient_m->selectPtn_idx($ptnIdArr);

            $csvDataArr = explode(',',$csvDataArr);
            $csvDataArr = array_chunk($csvDataArr,26);

            for ($i = 0; $i < count($csvDataArr); $i++) {
                $csvDataArr[$i] = array_splice($csvDataArr[$i],1,25);
                $csvDataArr[$i][0] = $result[$i]['ptn_idx'];
            }

            $JsonObject = json_encode($csvDataArr,JSON_UNESCAPED_UNICODE);

            $JsonObject = substr($JsonObject,1);
            $JsonObject = substr($JsonObject,0,-1);
            $JsonObject = str_replace('[','(',$JsonObject);
            $JsonObject = str_replace(']',')',$JsonObject);
            $JsonObject = str_replace('""',0,$JsonObject);

            $this->db->trans_begin();

            $this->Patient_m->insertPatientData($JsonObject);

            $this->Patient_m->updateCsvDate($result);

            $this->db->trans_commit();

            ut_procSuccess();
        }
        catch(Exception $e)
        {
            $this->db->trans_rollback();

            error_log(print_r($e,true));
            log_send($e, $this);
            ut_ProcError('[Server Error] 서버에 문제가 있습니다.');
            return FALSE;
        }
    }

    public function csv_data_registration_popup()
    {
        if (!$_POST) {
            // $data['csrf_token'] = $this->security->get_csrf_hash();

            $this->load->view('/kr/csvRegistration_popup.php');
        }
    }

    public function data_detail()
    {
        $AdminID = $this->session->userdata['AdminID'];

//        $csvNumber = 1;
        $csvNumber = $_POST['csvNumber'];

        $csvData = $this->input->post('csvData');

        if (empty($csvData)) {
            $csvDataSave = $_POST['csvDataSave'];
            $csvDataSave = explode(',',$csvDataSave);
            $csvDataSave = array_chunk($csvDataSave,26);

            $patientData = $this->Patient_m->select_patient_list($AdminID,$csvDataSave[$csvNumber][1]);

            $result = [
                'csvData' => $csvDataSave[$csvNumber],
                'patientData' => $patientData
            ];

            ut_procSuccess($result);

        } else {
            $csvData = explode(',',$csvData);

            // $dataArr[$csvNumber] = $csvData;

            $result2 = [
                'csvData' => $csvData,
                // 'patientData' => $patientData
            ];

            ut_procSuccess($result2);
        }
    }

    public function data_modification()
    {
        if (!$_POST) {

            $Logined_view_data['view_title'] = '키니신생아';
            $data['csrf_token'] = $this->security->get_csrf_hash();
            $data['AdminType'] = $this->session->userdata['AdminType'];

            $this->load->view('/kr/Logined_Header_v.php',$data);
            $this->load->view('/kr/Data_Modification_v.php',$data);
            $this->load->view('/kr/Public_Footer_v.php');

        } else {

            $patient_list = $this->Data_m->select_patient_data_list();

            error_log(print_r($patient_list,true));

            ut_procSuccess($patient_list);

        }
    }

    public function data_byPatientId()
    {
        if (!$_POST) {

            $Logined_view_data['view_title'] = '키니신생아';
            $data['csrf_token'] = $this->security->get_csrf_hash();
            $data['AdminType'] = $this->session->userdata['AdminType'];

            $data['ptn_idx'] = $this->uri->segment(3);

            $this->load->view('/kr/Logined_Header_v.php',$data);
            $this->load->view('/kr/Data_byPatientId_v.php',$data);
            $this->load->view('/kr/Public_Footer_v.php');

        } else {
            $ptn_idx = $_POST['ptn_idx'];

            $data_byPatientId_list = $this->Data_m->select_data_byPatientId_list($ptn_idx);

            error_log(print_r($data_byPatientId_list,true));

            ut_procSuccess($data_byPatientId_list);
        }
    }
}