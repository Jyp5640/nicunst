<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// 폼 검증
function form_validation_run($params, $data = Array(),$error_delimiters_start = '', $error_delimiters_end = '')
{

    $CI =& get_instance();
    $CI->load->library('form_validation');

    $CI->form_validation->reset_validation();

    // POST 이외의 다른 데이터를 검증할시
    if(!empty($data))
    {
        $CI->form_validation->set_data($data);
    }

    for($i = 0 ; $i < count($params) ; $i++)
    {
        // 0. 파라미터명 1. 라벨명 2. 규칙
        $CI->form_validation->set_rules($params[$i][0],$params[$i][1],$params[$i][2]);
    }

    $CI->form_validation->set_error_delimiters($error_delimiters_start, $error_delimiters_end);

    if($CI->form_validation->run() == TRUE)
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
}

