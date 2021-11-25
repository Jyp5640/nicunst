<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// 버전 비교
/**
 * @param $version		모바일 헤더에서 넘어온 버전
 * @param string $os	모바일 OS
 * @return bool			true 일 경우 이전 버전임.
 */
function compare_version($version, $os = 'Android')
{
	$version_array = explode('.',$version);

	// 안드로이드 일 경우
	if($os == 'Android')
	{
		$server_version = APP_UPDATE_NEEDFUL_VERSION;
	}
	// IOS 일경우
	else
	{
		$server_version = APP_UPDATE_NEEDFUL_VERSION_IOS;
	}

	$server_version_array = explode('.',$server_version);

	for($i = 0 ; $i < count($version_array) ; $i++)
	{
		if($version_array[$i] > $server_version_array[$i])
		{
			return false;
		}

		if($version_array[$i] < $server_version_array[$i])
		{
			return true;
		}
	}

	return false;

}

// 앱 버전 체크
function check_app_version($Error_Code = 'ERROR_NEEDED_UPDATE')
{
    $header_info_array = explode('-', $_SERVER['HTTP_USER_AGENT']);
    $version = end($header_info_array);

    if(preg_match('/(iPhone)/',$_SERVER['HTTP_USER_AGENT']))
    {
        $os = 'iPhone';
    }
    // 안드로이드
    else
    {
		$os = 'Android';
    }

	if(compare_version($version,$os))
	{
		ut_ProcError("새로운 업데이트 버젼이 있습니다.\n업데이트를 하지 않으시면 서비스이용이 불가능 합니다.",$Error_Code);
		exit;
	}
}

/**
 * 모바일 세션 체크
 *
 * @param $req_SessionKey :사용자 세션키
 * @param $Cust_Idx : 고객인덱스
 * @param $m_Auth_m : M_Auth 모델객체
 * @return bool
 * @throws Exception
 */
function m_check_session($req_SessionKey,$Cust_Idx,$m_Auth_m)
{
	$passip_list = explode(',',PASSIP_FOR_TEST);
	$pass = FALSE;

	for($i = 0 ; $i < count($passip_list) ; $i++)
	{
		if(preg_match('/'.$passip_list[$i].'/',$_SERVER['REMOTE_ADDR']))
		{
			$pass = TRUE;
			continue;
		}
	}

	if(!$pass && SERVICE_UPDATE_STATUS)
	{
		//	 배포 버튼 클릭 후, 실제 배포 되는 사이 사용.
		$server_update_msg			= Array();
		$server_update_msg['time']	= SERVER_UPDATE_TIME_MSG;
		$server_update_msg['reason']= SERVER_UPDATE_REASON_MSG;
		$server_update_msg			= json_encode($server_update_msg,JSON_UNESCAPED_UNICODE);
		ut_ProcError($server_update_msg,'UPDATE_SERVER');
		exit;
	}

    try
    {
        $CustDBKey = getDBKey('Customer',$Cust_Idx);
        $SessionKey = AES_Encode($req_SessionKey,$CustDBKey);

        $result = $m_Auth_m->select_sessionkey($Cust_Idx);

//        error_log(print_r($SessionKey,true));

        if($result[0]['SessionKey'] != $SessionKey)
        {
            ut_ProcError('세션이 만료되었습니다.','ERROR_SESSION_KEY');
            exit;
        }
        else
        {
            return;
        }
    }
    catch(Exception $e)
    {
        ut_ProcError('[Server Error] 서버에 문제가 있습니다.');
		err_log($e);
        exit;
    }
}

/**
 * 모바일 세션 체크 (키니몰)
 *
 * @param $req_SessionKey :사용자 세션키
 * @param $Cust_Idx : 고객인덱스
 * @param $m_Auth_m : M_Auth 모델객체
 * @return bool
 * @throws Exception
 */
function m_check_session_kinimall($req_SessionKey,$Cust_Idx,$m_Auth_m)
{

	try
	{
		$CustDBKey = getDBKey('Customer',$Cust_Idx);
		$SessionKey = AES_Encode($req_SessionKey,$CustDBKey);

		$result = $m_Auth_m->select_sessionkey_kinimall($Cust_Idx);

		if ($result[0]['SessionKey'] != $SessionKey)
		{
			return false;
		}
		else
		{
			return $result;
		}
	}
	catch(Exception $e)
	{
		error_log(print_r($e,true));
		ut_ProcError('[Server Error] 서버에 문제가 있습니다.');
		exit;
	}
}
