<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function hospital_info($InstCd = null)
    {
        $sql = "SELECT InstCd, InstName, InstAddr FROM INSTITUTE WHERE InstActYN = 'Y'";

        if (!empty($InstCd)) {
            $sql .= "AND InstCd = '$InstCd'";
        }

        $query = $this->db->query($sql);

        check_db_error();

        return $query->result_array();
    }

    function department_info($InstCd, $DmCd)
    {
        $sql = "SELECT D.* , A.AdminName
                FROM DEPARTMENT D 
                INNER JOIN ADMIN A ON D.AdminID = A.AdminID
                WHERE D.InstCd = ?";

        if (!empty($DmCd)) {
            $sql .= "AND D.DmCd = '$DmCd'";
        }

        $query = $this->db->query($sql,$InstCd);
        error_log($this->db->last_query());
        check_db_error();

        $result = $query->result_array();

        if ($query->num_rows() > 0)
        {
            return $result;
        }
        else {
            return array();
        }
    }
}