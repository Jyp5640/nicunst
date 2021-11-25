<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function check_instAuthCd($instAuthCd) :array
    {
        $sql = "SELECT * FROM INSTITUTE WHERE InstAuthCd = ?";
        $query = $this->db->query($sql, $instAuthCd);
        $result = $query->result_array();
        if ($query->num_rows() > 0)
        {
            return $result;
        }
        else {
            return array();
        }
    }
    function check_department($instCd, $departName) :array
    {
        $sql = "SELECT D.*,(SELECT AdminName FROM ADMIN A WHERE D.AdminID = A.AdminID) AdminName
       FROM DEPARTMENT D WHERE D.InstCd = ? AND D.DmName = ?";
        $query = $this->db->query($sql, array($instCd, $departName));
        $result = $query->result_array();
        if ($query->num_rows() > 0)
        {
            return $result;
        }
        else {
            return array();
        }
    }

    function getInstDepartInfo() : array
    {
        $sql = "SELECT (SELECT AdminName FROM ADMIN A WHERE D.AdminID = A.AdminID) AdminName,
                D.*, I.InstCd,I.InstName,I.InstAddr,I.InstPhone FROM DEPARTMENT D LEFT OUTER JOIN INSTITUTE I ON D.InstCd = I.InstCd";
        $query = $this->db->query($sql);
        $result = $query->result_array();
        if ($query->num_rows() > 0)
        {
            return $result;
        }
        else {
            return Array();
        }
    }
//    function search_institute($searchDmDane) :array
//    {
//        $sql = "SELECT FROM DEPARTMENT WHERE DmName = $searchDmDane";
//        $query = $this->db->query($sql, $instAuthCd);
//        $result = $query->result->array();
//        if ($query->sum_rows() > 0)
//        {
//            return $result;
//        }
//        else {
//            return Array();
//        }
//    }
    function checkID($id) : array
    {
        $sql = "SELECT AdminID FROM ADMIN WHERE AdminID = ?";
        $query = $this->db->query($sql,$id);
        $result = $query->result_array();
        if ($query->num_rows() > 0)
        {
            return $result;
        }
        else {
            return Array();
        }
    }

    // 소속 등록
    function departmentResgister($DmName,$DmCmt,$Admin_ID,$InstCd)
    {
        try
        {
            $this->db->trans_begin();

            $sql = "INSERT INTO DEPARTMENT(DmName,DmCmt,AdminID,InstCd)
                      VALUES(?,?,?,?)";

            $params = Array($DmName,$DmCmt,$Admin_ID,$InstCd);
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
        catch(Exception $e)
        {
            $this->db->trans_rollback();
            error_log(print_r($e,true));
            return "[Server Error]서버에 문제가 있습니다.";
        }
    }

    function check_dmCd($Admin_ID)
    {
        $sql = "SELECT DmCd FROM DEPARTMENT WHERE AdminID = ?";
        $query = $this->db->query($sql,$Admin_ID);

        $result = $query->result_array();
        if ($query->num_rows() > 0)
        {
            return $result;
        }
        else {
            return Array();
        }

    }

    // 관리자 등록
    function adminResgister($Admin_ID,$Admin_Pwd,$Admin_Name,$AdminType,$Admin_Email,$Admin_Phone,$InstCd,$AdminActYN,$dmCd)
    {
        try
        {
            $this->db->trans_begin();

            $sql = "INSERT INTO ADMIN(AdminID,AdminPwd,AdminName,AdminType,AdminEmail,AdminPhone,InstCd,AdminActYN,DmCd) 
                      VALUES(?,?,?,?,?,?,?,?,?)";

            $params = Array($Admin_ID,$Admin_Pwd,$Admin_Name,$AdminType,$Admin_Email,$Admin_Phone,$InstCd,$AdminActYN,$dmCd);
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
        catch(Exception $e)
        {
            $this->db->trans_rollback();
            error_log(print_r($e,true));
            return "[Server Error]서버에 문제가 있습니다.";
        }
    }

    // ID찾기
    function findId($AdminEmail)
    {
        $sql = "SELECT AdminID FROM ADMIN WHERE AdminEmail = ?";

        $query = $this->db->query($sql,$AdminEmail);

        $result = $query->result_array();
        if ($query->num_rows() > 0)
        {
            return $result;
        }
        else {
            return Array();
        }
    }

    // 비밀번호 찾기
    function findPwd($AdminID, $AdminEmail)
    {
        $sql = "SELECT AdminPwd FROM ADMIN WHERE AdminID = ? AND AdminEmail = ?";

        $params = array($AdminID, $AdminEmail);
        $query = $this->db->query($sql,$params);

        $result = $query->result_array();
        if ($query->num_rows() > 0)
        {
            return $result;
        }
        else {
            return Array();
        }
    }

    function selectAdminList($InstCd, $DmCd)
    {
        $sql = "SELECT A.*, I.InstName, D.DmName, D.DmCmt 
                FROM ADMIN A
                INNER JOIN INSTITUTE I ON A.InstCd = I.InstCd
                INNER JOIN DEPARTMENT D ON A.DmCd = D.DmCd
                WHERE A.AdminType = 'S' AND A.InstCd = ? AND A.DmCd = ?";

        $params = array($InstCd, $DmCd);
        $query = $this->db->query($sql,$params);

        $result = $query->result_array();
        if ($query->num_rows() > 0)
        {
            return $result;
        }
        else {
            return Array();
        }
    }

    function selectAdminActYN($AdminID)
    {
        $sql = "SELECT AdminActYN FROM ADMIN WHERE AdminID = ?";

        $query = $this->db->query($sql,$AdminID);

        $result = $query->result_array();
        if ($query->num_rows() > 0)
        {
            return $result;
        }
        else {
            return Array();
        }
    }

    function updateAdminActYN($AdminID, $AdminActYN)
    {
        try
        {
            $this->db->trans_begin();

            if ($AdminActYN == 'N') {
                $AdminActYN = 'Y';
            } else {
                $AdminActYN = 'N';
            }

            $sql = "UPDATE ADMIN SET AdminActYN = '$AdminActYN' WHERE AdminID = ?";
            $this->db->query($sql,$AdminID);

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