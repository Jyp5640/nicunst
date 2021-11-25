<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function check_Session_level($session_userdata, $level = 0)
{
    $check_session  = isset($session_userdata['logged_in'])?$session_userdata['logged_in'] : FALSE ;

    if(!$check_session) return FALSE;

    // 최상위 관리자
    if($session_userdata["Admin_Type"] == 'T')
    {
        $type = 4;
    }// 기관 관리자
    else if($session_userdata["Admin_Type"] == 'A')
    {
        $type = 3;
    }// 영양사
    else if($session_userdata["Admin_Type"] == 'N')
    {
        $type = 2;
    }// 일반
    else if($session_userdata["Admin_Type"] == 'C')
    {
        $type = 1;
    }

    if($level <= $type)
    {
        $check = TRUE;
    }
    else
    {
        $check = FALSE;
    }

    return $check;
}

//function shop_check_Session_level($session_userdata, $level = 0)
//{
//    $check_session  = isset($session_userdata['logged_in'])?$session_userdata['logged_in'] : FALSE ;
//
//    if(!$check_session) return FALSE;
//
//    // 최상위 관리자
//    if($session_userdata["AdminType"] == 'T')
//    {
//        $type = 4;
//    }// 기관 관리자
//    else if($session_userdata["AdminType"] == 'A')
//    {
//        $type = 3;
//    }
//    else
//    {
//        $type = 0;
//    }
//
//    if($level <= $type)
//    {
//        $check = TRUE;
//    }
//    else
//    {
//        $check = FALSE;
//    }
//
//    return $check;
//}