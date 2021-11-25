<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminRegister extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Admin_m');
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

        $main_view_data['csrf_token'] = $this->security->get_csrf_hash();

        $this->load->view('/kr/publicHeader_v',$public_view_data );
		$this->load->view('/kr/admin_register_v', $main_view_data);
//        $this->load->view('/backup/admin_register_v_backup', $main_view_data);
	}
	public function checkInst()
    {
        if ($_POST) {

            $result = $this->Admin_m->check_instAuthCd($_POST['InstAuthCd']);
            ut_procSuccess($result);
        }
    }
    public function checkDmName()
    {
        if ($_POST) {

            $result = $this->Admin_m->check_department($_POST['InstCd'],$_POST['DmName']);

            if (!empty($result)) {
                $Admin_Name   = get_Decode_CustInfo($result[0]['AdminID'],$result[0]['AdminName']);
                $result[0]['AdminName'] = $Admin_Name;
            }

            ut_procSuccess($result);
        }
    }
    public function checkID()
    {
        if ($_POST) {

            $result = $this->Admin_m->checkID($_POST['checkID']);
            ut_procSuccess($result);
        }
    }
    public function adminResgister()
    {
        if ($_POST) {

            try {

                $AuthCd     = $this->input->post('AuthCd',TRUE);
                $DmName     = $this->input->post('DmName',TRUE);
                $DmCmt     = $this->input->post('DmCmt',TRUE);

                $Admin_ID     = $this->input->post('Admin_ID',TRUE);
                $Admin_Pwd    = $this->input->post('Admin_Pwd',TRUE);
                $Admin_Name   = $this->input->post('Admin_Name',TRUE);
                $Admin_Email  = $this->input->post('Admin_Email',TRUE);
                $Admin_Phone  = $this->input->post('Admin_Phone',TRUE);

                $this->db->trans_begin();

                $inst_check_result = $this->Admin_m->check_instAuthCd($AuthCd);
                $instCd = $inst_check_result[0]['InstCd'];

                $Admin_Pwd    = get_Encode_Pwd($Admin_ID,$Admin_Pwd);
                $Admin_Email  = empty($Admin_Email)? NULL : get_Encode_Email($Admin_Email);
                $Admin_Phone  = get_Encode_CustInfo($Admin_ID,$Admin_Phone);
                $Admin_Name   = get_Encode_CustInfo($Admin_ID,$Admin_Name);

                $result1 = $this->Admin_m->departmentResgister($DmName,$DmCmt,$Admin_ID,$instCd);

                $dmCd_result = $this->Admin_m->check_dmCd($Admin_ID);
                $dmCd = $dmCd_result[0]['DmCd'];

                $AdminType = 'A';
                $AdminActYN = 'Y';

                $result2 = $this->Admin_m->adminResgister($Admin_ID,$Admin_Pwd,$Admin_Name,$AdminType,$Admin_Email,$Admin_Phone,
                    $instCd,$AdminActYN,$dmCd);

                $this->db->trans_commit();

//                if($result1 === TRUE && $result2 === TRUE)
//                {
//                    ut_procSuccess();
//                }
//                else
//                {
//                    ut_ProcError('에러입니다.');
//                }
                ut_procSuccess();
            }
            catch(Exception $e)
            {

                $this->db->trans_rollback();

                log_send($e,$this);
                err_log($e);
                ut_ProcError('[Server Error] 서버에 문제가 있습니다.');

            }
        }
    }
}
