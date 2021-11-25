<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('Patient_m'));
        $this->load->helper(array('proc_send_result','aes_encode','getdbkey'));

    }

    public function test_list()
    {
        if (!$_POST) {

            $Logined_view_data['view_title'] = '키니신생아';
            $data['csrf_token'] = $this->security->get_csrf_hash();
            $data['AdminType'] = $this->session->userdata['AdminType'];

            $this->load->view('/kr/Logined_Header_v2.php',$data);
            $this->load->view('/kr/Test_List_v.php',$data);
            $this->load->view('/kr/Public_Footer_v.php');

        } else {



        }
    }
}