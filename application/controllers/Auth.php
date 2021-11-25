<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model(Array('auth_m'));
        $this->load->helper(array('form','url','getdbkey','aes_encode','proc_send_result'));
    }

    public function index()
    {
        show_404();
        exit;
    }

    // 로그인
    function login()
    {
        $this->load->helper('alert');

        // 파라미터 유효성 검증
        $params[0] = Array('Admin_ID','아이디','required|alpha_numeric');
        $params[1] = Array('Admin_Pwd','비밀번호','required');

        $form_result = form_validation_run($params);

        // 파라미터 유효성 검증 실패시
        if(!$form_result)
        {
            ut_ProcError(validation_errors());
        }
        else
        {
            error_log('--------------------------------------------1');
            $auth_data['Admin_ID'] = strtolower($this->input->post('Admin_ID',TRUE));
            $auth_data['Admin_Pwd'] = $this->input->post('Admin_Pwd',TRUE);

            $auth_data['Admin_Pwd'] = get_Encode_Pwd($auth_data['Admin_ID'],$auth_data['Admin_Pwd']);

            $result = $this->auth_m->login($auth_data);

            error_log(print_r($result,true));

            // 조회 결과가 TRUE 일때
            if($result)
            {
                // 활성화 계정인지 다시 조회
                $result = $this->auth_m->login($auth_data,"AND AdminActYN = 'Y'");
                if(!$result)
                {
                    ut_ProcError('비활성 계정입니다. 관리자에게 문의하세요.');
                    exit;
                }

                // 세션 데이터 생성
                $userdata = Array(
                    'AdminID'      => $result->AdminID,
                    'AdminName'    => $result->AdminName,
                    'AdminType'    => $result->AdminType,
                    'InstCd'       => $result->InstCd,
                    'DmCd'         => $result->DmCd,
                    'logged_in'    => TRUE,
                );

                $this->session->set_userdata($userdata);

                ut_procSuccess(Array('AdminType' => $result->AdminType));
            }
            else
            {
                ut_ProcError('아이디나 비밀번호를 확인해 주세요.');
            }
        }
        exit;
    }

    // 로그아웃
    function logout()
    {
        // 세션 삭제
        $this->session->sess_destroy();

        // 경고창 헬퍼 로드
        $this->load->helper(Array('alert'));
        alert('로그아웃 하였습니다','login'); // 메시지 띄운후 login 페이지 리다이렉트
        exit;
    }

    // 아이디,비번 찾기 뷰
    function find_idpwd()
    {
        $data['view_title'] = 'ID / 비밀번호 찾기';
        $data['csrf_token'] = $this->security->get_csrf_hash();

        $this->load->view('/kr/Public_Header_v.php',$data);

        $this->load->view('/kr/Find_ID_Pwd_v.php',$data);
    }

    // 영양사 ID 중복체크
    function nutri_id_check()
    {
        $params[0] = Array('Admin_ID','아이디','required|alpha_numeric|min_length[5]|max_length[10]');

        $form_result = form_validation_run($params);

        if(!$form_result)
        {
            ut_ProcError(validation_errors());
        }
        else
        {
            $Admin_ID = $this->input->post('Admin_ID',TRUE);

            $check_result = $this->auth_m->checkID(strtolower($Admin_ID));
            if($check_result)
            {
                ut_procSuccess();
            }
            else
            {
                ut_ProcError('이미 등록된 ID 입니다.');
            }
        }
        exit;
    }

    // ID 찾기
    function find_id()
    {
        $params[0] = Array('Admin_Email','이메일','required|valid_email');

        $form_result = form_validation_run($params);

        if(!$form_result)
        {
            ut_ProcError('조회된 ID 가 없습니다. ');
        }
        else
        {
            $Admin_Email = $this->input->post('Admin_Email',TRUE);

            $Admin_Email_enc = get_Encode_Email($Admin_Email);

            $check_result = $this->auth_m->findID($Admin_Email_enc);
            if(!empty($check_result))
            {
                for($i = 0 ; $i < count($check_result) ; $i++){
                    $subject = '[KiniCare] 키니케어 ID';
                    $message = "
                                    <HTML>
                                        <HEAD>
                                            <TITLE>공지</TITLE>
                                        </HEAD>
                                        <BODY>
                                            귀하의 ID 는 '".$check_result[$i]["Admin_ID"]."' 입니다"."
                                        </BODY>
                                    </HTML>
                                
                                ";
                    send_adminmail($subject,$message,$Admin_Email);
                }
                ut_procSuccess();
            }
            else
            {
                ut_ProcError('조회된 ID 가 없습니다. ');
            }
        }
        exit;
    }

    // 비밀번호 찾기
    function find_pwd()
    {
        // 파라미터 유효성 검증
        $params[0] = Array('Admin_ID','아이디','required|alpha_numeric|min_length[6]|max_length[10]');
        $params[1] = Array('Admin_Email','이메일','required|valid_email');

        $form_result = form_validation_run($params);

        if(!$form_result)
        {
            ut_ProcError(validation_errors());
        }
        else
        {
            $Admin_ID = $this->input->post('Admin_ID',TRUE);
            $Admin_Email = $this->input->post('Admin_Email',TRUE);

            $Admin_Email_enc = get_Encode_Email($Admin_Email);

            $check_result = $this->auth_m->find_pwd(strtolower($Admin_ID), $Admin_Email_enc);

            if(empty($check_result))
            {
                ut_ProcError('조회된 정보가 없습니다. ');
            }
            else
            {
                $randPwd = $check_result[0]["Admin_ID"].rand(1000,9999);

                $Admin_Pwd = get_Encode_Pwd($Admin_ID,$randPwd);

                $result = $this->auth_m->update_randPwd($Admin_ID,$Admin_Pwd);

                if($result !== TRUE)
                {
                    ut_ProcError($result);
                }
                else
                {
                    $subject = '[KiniCare] 임시 비밀번호 발급';
                    $message = "
                                    <HTML>
                                        <HEAD>
                                            <TITLE>공지</TITLE>
                                        </HEAD>
                                        <BODY>
                                            임시 비밀번호가 발급되었습니다.<br>
                                            임시 비밀번호 : " . $randPwd . "<br>
                                            로그인 이후 비밀번호 변경을 권장합니다.<br><br>
                                            이 메일은 발신전용이므로 회신되지 않습니다.
                                        </BODY>
                                    </HTML>
                                
                                ";
                    ut_procSuccess();
                    send_adminmail($subject,$message,$Admin_Email);
                }
            }
        }
        exit;
    }
}
