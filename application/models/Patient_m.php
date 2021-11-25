<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('utinfra_db');
    }

    function insertPatientInfo($AdminID,$patientID,$termType,$patientBirth,$week,$day,$gender,$combineDays)
    {
        try
        {
            $this->db->trans_begin();

            $sql = "INSERT INTO PATIENT 
                (ptn_admin_id, ptn_id, ptn_termtype, ptn_birthday, ptn_ga_week, ptn_ga_day, ptn_sex, ptn_regdate, ptn_combine_days)
                VALUES (?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP, ?)";

            $params = array($AdminID,$patientID,$termType,$patientBirth,$week,$day,$gender,$combineDays);
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

//        check_db_error();
    }

    function select_patient_list($AdminID,$patientID)
    {
        $sql = "SELECT * FROM PATIENT WHERE ptn_admin_id = ?";

        if (!empty($patientID)) {
            $sql .= " AND ptn_id = '$patientID'";
        }

        $query = $this->db->query($sql,$AdminID);
//        error_log($this->db->last_query());
        check_db_error();

        $result = $query->result_array();

        if($query->num_rows() > 0)
        {
            return $result;
        }
        else
        {
            return array();
        }
    }

    function deletePatient($AdminID, $patientID)
    {
        $sql = "DELETE FROM PATIENT WHERE ptn_admin_id = ? AND ptn_id = ?";

        $params = array($AdminID, $patientID);
        $this->db->query($sql,$params);

        check_db_error();

        if ($this->db->affected_rows() > 0) {
            return TRUE;
        } else {
            throw new Exception("환자삭제에 실패하였습니다.");
        }
    }

    function checkID($id) : array
    {
        $sql = "SELECT ptn_id FROM PATIENT WHERE ptn_id = ?";

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

    function insertPatientData($arrayToString)
    {
        $sql = "INSERT INTO PATIENT_DATA
                (pdat_ptn_idx, pdat_csvdate, pdat_weight, pdat_height, pdat_hc, pdat_en1, pdat_en1_cc, pdat_en1_feedings,
                pdat_en2, pdat_en2_cc, pdat_en2_feedings, pdat_en3, pdat_en3_cc, pdat_en3_feedings, pdat_en4, pdat_en4_cc, 
                pdat_en4_feedings, pdat_en5, pdat_en5_cc, pdat_en5_feedings, pdat_g, pdat_a, pdat_l, pdat_cc, pdat_kcal)
                VALUES ".$arrayToString;

        $this->db->query($sql);
        check_db_error();

        error_log($this->db->last_query());

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return "[Server Error]서버에 문제가 있습니다.";
        }
    }

    function updateCsvDate($result)
    {
        $sql = "UPDATE PATIENT SET ptn_latest_date = CURDATE() WHERE ptn_idx IN (?";

        if (count($result) > 1) {
            for ($j = 1; $j < count($result); $j++) {
                error_log(print_r($result[$j]['ptn_idx'],true));
                $sql .= ",".$result[$j]['ptn_idx'];
            }
        }

        $sql .= ')';

        $this->db->query($sql,$result[0]['ptn_idx']);
        check_db_error();
        error_log($this->db->last_query());

        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return "[Server Error]서버에 문제가 있습니다.";
        }
    }

    function selectPtn_idx($ptnIdArr)
    {
        $sql = "SELECT ptn_idx FROM PATIENT WHERE ptn_id IN (?";

        if (count($ptnIdArr) > 1) {
            for ($i = 1; $i < count($ptnIdArr); $i++) {
                $sql .= ",'$ptnIdArr[$i]'";
            }
        }

        $sql .= ") ORDER BY FIELD (ptn_id";

        if (count($ptnIdArr) > 1) {
            for ($i = 1; $i < count($ptnIdArr); $i++) {
                $sql .= ",'$ptnIdArr[$i]'";
            }
        }

        $sql .= ")";

        $query = $this->db->query($sql,$ptnIdArr[0]);
        check_db_error();
        error_log($this->db->last_query());

        $result = $query->result_array();

        if ($query->num_rows() > 0)
        {
            return $result;
        }
        else {
            return Array();
        }
    }

}