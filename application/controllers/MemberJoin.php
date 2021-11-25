<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MemberJoin extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model(array('Member_m','Admin_m'));
        $this->load->helper(array('proc_send_result','aes_encode','getdbkey'));

    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $public_view_data['view_title'] = 'KiniCare | Log in';

//        $main_view_data['csrf_token'] = $this->security->get_csrf_hash();
        $data['csrf_token'] = $this->security->get_csrf_hash();

        $hospital_list = $this->Member_m->hospital_info();   // 병원 선택목록
        $data['hospital_list'] = json_encode($hospital_list);

        $this->load->view('/kr/publicHeader_v',$public_view_data );
		$this->load->view('/kr/member_join_v', $data);
//        $this->load->view('/backup/member_join_v_backup', $data);
	}
    public function checkInst()
    {
        if ($_POST) {

            $result = $this->Member_m->hospital_info($_POST['InstCd']);
            ut_procSuccess($result);
        }
    }

    public function checkDepartment()
    {
        if ($_POST) {

            $result = $this->Member_m->department_info($_POST['InstCd'], $_POST['DmCd']);

            if (!empty($result[0]['AdminID'])) {
                $Admin_Name   = get_Decode_CustInfo($result[0]['AdminID'],$result[0]['AdminName']);
                $result[0]['AdminName'] = $Admin_Name;
            }

            ut_procSuccess($result);
        }
    }

    public function adminResgister()
    {
        if ($_POST) {

            $Admin_ID     = $this->input->post('Admin_ID',TRUE);
            $Admin_Pwd    = $this->input->post('Admin_Pwd',TRUE);
            $Admin_Name   = $this->input->post('Admin_Name',TRUE);
            $Admin_Email  = $this->input->post('Admin_Email',TRUE);
            $Admin_Phone  = $this->input->post('Admin_Phone',TRUE);

            $Admin_Pwd    = get_Encode_Pwd($Admin_ID,$Admin_Pwd);
            $Admin_Email  = empty($Admin_Email)? NULL : get_Encode_Email($Admin_Email);
            $Admin_Phone  = get_Encode_CustInfo($Admin_ID,$Admin_Phone);
            $Admin_Name   = get_Encode_CustInfo($Admin_ID,$Admin_Name);

            $AdminType = 'S';
            $AdminActYN = 'N';
            $instCd  = $this->input->post('InstCd',TRUE);
            $dmCd  = $this->input->post('DmCd',TRUE);


            $result = $this->Admin_m->adminResgister($Admin_ID,$Admin_Pwd,$Admin_Name,$AdminType,$Admin_Email,$Admin_Phone,
                $instCd,$AdminActYN,$dmCd);

            if($result === TRUE)
            {
                ut_procSuccess();
            }
            else
            {
                ut_ProcError('에러입니다.');
            }
        }
    }
}
