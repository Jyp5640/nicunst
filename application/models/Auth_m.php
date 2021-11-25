<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_m extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		# form 헬퍼를 로드한다
	}

    // 로그인 조회
	function login($auth,$where = '')
	{
		$sql = "SELECT AdminID,AdminName,AdminType,InstCd,DmCd FROM ADMIN WHERE AdminID = ? AND AdminPwd = ? AND (AdminType IN ('A','S','T')) ".$where;
		$query = $this->db->query($sql,$auth);

		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return FALSE;
		}
	}

	// ID 중복체크
	function checkID($Admin_ID)
    {
        $sql = "SELECT Admin_ID FROM ADMIN WHERE Admin_ID = ?";
        $query = $this->db->query($sql,$Admin_ID);

        if($query->num_rows() > 0)
        {
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    // 기관관리자 등록
    function insertInstAdmin($params)
    {
        // 중복체크
        if($this->checkID($params['Admin_ID']))
        {
            $this->db->trans_begin();

            $sql = "INSERT INTO ADMIN(Admin_ID, Admin_Pwd, Admin_Name, Admin_Type, Admin_Email, Admin_Phone, Admin_ActYN, InstCd,
                        Admin_AuthDate, JoinDate, ResignDate) 
						VALUES (?,?,?,'A',?,?,'Y',?,NULL,NOW(),NULL)";
            $this->db->query($sql,$params);

            if($this->db->affected_rows() > 0)
            {
                $this->db->trans_commit();
                return TRUE;
            }
            else
            {
                $this->db->trans_rollback();
                return "[Server Error]서버에 문제가 있습니다.";
            }
        }
        else
        {
            return "이미 등록된 아이디입니다.";
        }
    }

    // ID 찾기
    function findID($Admin_Email_enc)
    {
        $sql = "SELECT Admin_ID,Admin_Email FROM ADMIN WHERE Admin_Email = ? AND Admin_ActYN = 'Y'";
        $query = $this->db->query($sql,$Admin_Email_enc);

        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return Array();
        }
    }

    // 비밀번호 찾기
    function find_pwd($Admin_ID, $Admin_Email_enc)
    {
        $sql = "SELECT Admin_ID,Admin_Email FROM ADMIN WHERE Admin_Email = ? AND Admin_ID = ? AND Admin_ActYN = 'Y'";
        $query = $this->db->query($sql,Array($Admin_Email_enc,$Admin_ID));

        if($query->num_rows() > 0)
        {
            return $query->result_array();
        }
        else
        {
            return Array();
        }
    }
    
    // 임시비밀번호 업데이트
    function update_randPwd($Admin_ID,$Admin_Pwd)
    {
        try
        {
            $this->db->trans_begin();

            $sql = "UPDATE ADMIN SET Admin_Pwd = ? WHERE Admin_ID = ?";
            $this->db->query($sql,Array($Admin_Pwd,$Admin_ID));

            if($this->db->affected_rows() > 0)
            {
                $this->db->trans_commit();
                return TRUE;
            }
            else
            {
                $this->db->trans_rollback();
                return "[Server Error]서버에 문제가 있습니다.";
            }
        }
        catch(Exception $e)
        {
            $this->db->trans_rollback();
            error_log(print_r($e,true));
            return "[Server Error]서버에 문제가 있습니다.";
        }
    }
}
