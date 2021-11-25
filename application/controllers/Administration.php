<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administration extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('Member_m','Admin_m'));
        $this->load->helper(array('proc_send_result','aes_encode','getdbkey'));

    }

    public function admin_list()
    {

        $Logined_view_data['view_title'] = '키니신생아';
        $data['csrf_token'] = $this->security->get_csrf_hash();

        $data['AdminType'] = $this->session->userdata['AdminType'];
//        $AdminType = $this->session->userdata['AdminType'];

        $this->load->view('/kr/Logined_Header_v.php',$data);
        $this->load->view('/kr/Admin_List_v.php',$data);
        $this->load->view('/kr/Public_Footer_v.php');
    }

    public function adminLists()
    {
        try {

            $AadminID = $this->session->userdata['AdminID'];
            $InstCd = $this->session->userdata['InstCd'];
            $DmCd = $this->session->userdata['DmCd'];
            error_log(print_r($AadminID,true));

            $result = $this->Admin_m->selectAdminList($InstCd, $DmCd);

            error_log(print_r($result,true));

            for ($i = 0; $i < count($result); $i++) {
                $AdminName = get_Decode_CustInfo($result[$i]['AdminID'], $result[$i]['AdminName']);
                $AdminEmail = get_Decode_Email($result[$i]['AdminEmail']);
                $AdminPhone = get_Decode_CustInfo($result[$i]['AdminID'], $result[$i]['AdminPhone']);

                $result[$i]['AdminName'] = $AdminName;
                $result[$i]['AdminEmail'] = $AdminEmail;
                $result[$i]['AdminPhone'] = $AdminPhone;
            }
            $result[0]['AadminID'] = $AadminID;

            ut_procSuccess($result);

        } catch (Exception $e) {

            error_log(print_r($e,true));
            log_send($e, $this);
            ut_ProcError('[Server Error] 서버에 문제가 있습니다.');

        }
    }

    public function adminActYN()
    {
        $AdminID = $_POST['AdminID'];

        $select_result = $this->Admin_m->selectAdminActYN($AdminID);
        error_log(print_r($select_result,true));

        $update_result = $this->Admin_m->updateAdminActYN($AdminID, $select_result[0]['AdminActYN']);

        ut_procSuccess($select_result);
    }

}