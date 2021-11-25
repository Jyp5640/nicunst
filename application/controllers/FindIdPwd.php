<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FindIdPwd extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('Member_m','Admin_m'));
        $this->load->helper(array('proc_send_result','aes_encode','getdbkey'));

    }

    public function findIdView()
    {
        $public_view_data['view_title'] = '키니신생아 | 아이디 찾기';

        $data['csrf_token'] = $this->security->get_csrf_hash();

        $this->load->view('/kr/publicHeader_v',$public_view_data );
        $this->load->view('/kr/findId_v', $data);

    }

    public function findId()
    {
        if ($_POST) {

            $AdminEmail = $_POST['AdminEmail'];

            $AdminEmail  = get_Encode_Email($AdminEmail);
            $result = $this->Admin_m->findId($AdminEmail);

            ut_procSuccess($result);
        }
    }

    public function findPwd()
    {
        if ($_POST) {
            $AdminID = $_POST['AdminID'];
            $AdminEmail = $_POST['AdminEmail'];

            $AdminEmail  = get_Encode_Email($AdminEmail);
            $result = $this->Admin_m->findPwd($AdminID, $AdminEmail);

            ut_procSuccess($result);

        } else {
            $public_view_data['view_title'] = '키니신생아 | 비밀번호 재설정';

            $data['csrf_token'] = $this->security->get_csrf_hash();

            $this->load->view('/kr/publicHeader_v',$public_view_data );
            $this->load->view('/kr/findPwd_v', $data);
        }
    }
}