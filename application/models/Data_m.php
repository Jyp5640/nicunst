<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_m extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('utinfra_db');
    }

    function select_patient_data_list()
    {
        $sql = "SELECT d.*, p.ptn_id, p.ptn_birthday, p.ptn_ga_week, p.ptn_ga_day, p.ptn_combine_days, p.ptn_regdate, p.ptn_latest_date 
                FROM PATIENT_DATA d INNER JOIN PATIENT p WHERE d.pdat_ptn_idx = p.ptn_idx";

        $query = $this->db->query($sql);
        // error_log($this->db->last_query());
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

    function select_data_byPatientId_list($ptn_idx)
    {
        $sql = "SELECT d.*, p.ptn_id, p.ptn_birthday, p.ptn_ga_week, p.ptn_ga_day, p.ptn_sex, p.ptn_combine_days, p.ptn_regdate 
                FROM PATIENT_DATA d INNER JOIN PATIENT p ON d.pdat_ptn_idx = p.ptn_idx
                WHERE d.pdat_ptn_idx = ?";

        $query = $this->db->query($sql,$ptn_idx);
        error_log($this->db->last_query());
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
}