<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 암호화 함수
 *
 * @param string $plain_text : 암호화 할 텍스트
 * @param string $key : 암호화 키
 * @return string|void : 암호화된 값
 * @throws Exception
 */
function AES_Encode($plain_text, $key)
{
//	$result = base64_encode(openssl_encrypt($plain_text, "aes-256-cbc", $key, true, str_repeat(chr(0), 16)));
    $result = base64_encode(openssl_encrypt($plain_text, "aes-256-cbc", $key, true, "abcH8BgTi!kEmnop"));
    if($result == FALSE)
    {
        throw new Exception('암호화에 실패했습니다');
        return;
    }
    else
    {
        return $result;
    }
}

/**
 * 복호화 함수
 *
 * @param string $base64_text : 복호화 할 텍스트
 * @param string $key : 암호화 키
 * @return string|void : 복호화된 값
 * @throws Exception
 */
function AES_Decode($base64_text, $key)
{
//	$result = openssl_decrypt(base64_decode($base64_text), "aes-256-cbc", $key, true, str_repeat(chr(0), 16));
    $result = openssl_decrypt(base64_decode($base64_text), "aes-256-cbc", $key, true, "abcH8BgTi!kEmnop");

    // 복호화 결과가 0, 공백인 경우에도 false 로 판단하므로 == => === 로 변경.
    if($result === FALSE)
    {
        throw new Exception('복호화에 실패했습니다');
    }
    else
    {
        return $result;
    }
}

/**
 * 해시 및 DB키로 암호화한 비밀번호 값 얻기
 *
 * @param string $Cust_Idx : 고객인덱스
 * @param string $CustPwd : 암호화 및 해시 전 비밀번호 원래 값
 * @return string 해시 및 암호화 된 비밀번호 값
 * @throws
 */
function get_Encode_Pwd($Cust_Idx,$CustPwd)
{
    try
    {
        $DBKey = getDBKey('Customer',$Cust_Idx);
        $result = AES_Encode((hash("sha256",$CustPwd)),$DBKey);

        return $result;
    }
    catch(Exception $e)
    {
        error_log(print_r($e,true));
        return FALSE;
    }
}

/**
/* DB키로 암호화한 고객정보
 *
 * @param string $Cust_Idx : 고객인덱스
 * @param string $reqInfo : 요청 정보
 * @return string 암호화 된 결과 값
 * @throws
 */
function get_Encode_CustInfo($Cust_Idx,$reqInfo)
{
    try
    {
        $DBKey = getDBKey('Customer',$Cust_Idx);
        $result = AES_Encode($reqInfo,$DBKey);

        return $result;
    }
    catch(Exception $e)
    {
        error_log(print_r($e,true));
        return FALSE;
    }
}

/**
 * Customer 테이블 정보 복호화
 *
 * @param string $Cust_Idx : 고객인덱스
 * @param string $reqInfo : 복호화 할 값
 * @return string|void : 복호화 된 값
 * @throws
 */
function get_Decode_CustInfo($Cust_Idx,$reqInfo)
{
    try
    {
        $DBKey = getDBKey('Customer',$Cust_Idx);
        $result = AES_Decode($reqInfo,$DBKey);

        return $result;
    }
    catch(Exception $e)
    {
    	throw new Exception($e);
        //error_log(print_r($e,true));
        //return FALSE;
    }
}

/**
 * 암호화된 전화번호 값 얻기
 *
 * @param string $phone : 암호화 할 전화번호
 * @return  string 암호화된 전화번호 값
 * @throws
 */
function get_Encode_Phone($phone)
{
    try
    {
        $UT_CustPhoneKEY = getDBKey('phone');
        $result = AES_Encode($phone, $UT_CustPhoneKEY);

        return $result;
    }
    catch(Exception $e)
    {
        error_log(print_r($e,true));
        return FALSE;
    }
}

/**
 * 복호화된 전화번호 값 얻기
 *
 * @param string $phone : 복호화 할 전화번호
 * @return string 복호화된 전화번호 값
 * @throws
 */
function get_Decode_Phone($phone)
{
    try
    {
        $UT_CustPhoneKEY = getDBKey('phone');
        $result = AES_Decode($phone, $UT_CustPhoneKEY);

        return $result;
    }
    catch(Exception $e)
    {
        error_log(print_r($e,true));
        return FALSE;
    }
}

/**
 * 암호화된 이메일 값 얻기
 *
 * @param string $CustEmail : 암호화 할 이메일
 * @return  string 암호화된 이메일 값
 * @throws
 */
function get_Encode_Email($CustEmail)
{
    try
    {
        $UT_EmailKEY= getDBKey('Email');
        $result = AES_Encode($CustEmail,$UT_EmailKEY);

        return $result;
    }
    catch(Exception $e)
    {
        error_log(print_r($e,true));
        return FALSE;
    }
}

/**
 * 복호화된 이메일 값 얻기
 *
 * @param string $CustEmail : 복호화 할 이메일
 * @return string 복호화된 이메일 값
 * @throws
 */
function get_Decode_Email($CustEmail)
{
    try
    {
        $UT_EmailKEY= getDBKey('Email');
        $result = AES_Decode($CustEmail,$UT_EmailKEY);

        return $result;
    }
    catch(Exception $e)
    {
        error_log(print_r($e,true));
        return FALSE;
    }
}

/**
 * 복호화된 NQA CustIdx 얻기
 *
 * @param string $nqaCustIdx : 암호화 된 CustIdx
 * @return string 복호화 된 CustIdx
 * @throws
 */
function get_Decode_nqaCustIdx($nqaCustIdx)
{
	try
	{
		$UT_NqaKEY = getDBKey('NQA');
		$result = AES_Decode($nqaCustIdx, $UT_NqaKEY);

		return $result;
	}
	catch(Exception $e)
	{
		error_log(print_r($e,true));
		return FALSE;
	}
}

/**
 * 각 테이블별 암호화된 아이디 값 얻기
 *
 * @param string $TableName : 테이블명
 * @param string $Cust_Idx : 고객인덱스
 * @param int $type : 1 태이블별 암호화 테이블 / 2 아이디별 암호화 테이블
 * @return 암호화된 아이디
 * @throws
 */
function get_Encode_CustIdx($TableName,$Cust_Idx,$type = 1)
{
    try
    {
        if($type == 1)
        {
            $DBKey = getDBKey($TableName);
        }
        else
        {
            $DBKey = getDBKey($TableName,$Cust_Idx);
        }

        $result = AES_Encode($Cust_Idx,$DBKey);

        return $result;
    }
    catch(Exception $e)
    {
        error_log(print_r($e,true));
        return FALSE;
    }
}



/**
 * 파라미터 데이터 암호화(공용키)
 *
 * @param $ParamData : 암호화할 데이터
 * @return string|void : 암호화된 데이터
 * @throws Exception
 */
function encode_kinimall_ParamData($ParamData)
{
	$kinimallkey = getKiniMallKey();
	$result = AES_Encode($ParamData, $kinimallkey);

	return $result;
}

/**
 * 암호화된 파라미터 데이터 복호화(공용키)
 *
 * @param $ParamData : 암호화된 데이터
 * @return string|void : 복호화된 데이터
 * @throws Exception
 */
function decode_kinimall_ParamData($ParamData)
{
	$kinimallkey = getKiniMallKey();
	$result_temp = AES_Decode($ParamData,$kinimallkey);
	$result = json_decode($result_temp,true);

	return $result;
}

/**
 * 파라미터 데이터 암호화(공용키)
 *
 * @param $ParamData : 암호화할 데이터
 * @return string|void : 암호화된 데이터
 * @throws Exception
 */
function encode_public_ParamData($ParamData)
{
    $publicKey = getpublicKey();
    $result = AES_Encode($ParamData, $publicKey);

    return $result;
}

/**
 * 암호화된 파라미터 데이터 복호화(공용키)
 *
 * @param $ParamData : 암호화된 데이터
 * @return string|void : 복호화된 데이터
 * @throws Exception
 */
function decode_public_ParamData($ParamData)
{
    $publicKey = getpublicKey();
    $result_temp = AES_Decode($ParamData,$publicKey);
    $result = json_decode($result_temp,true);

    return $result;
}

function decode_public_ParamData2($ParamData)
{
	$publicKey = getpublicKey2();
	$result_temp = AES_Decode($ParamData,$publicKey);
	$result = json_decode($result_temp,true);

	return $result;
}

/**
 * 모바일에 보낼 데이터 형식 맞추기
 *
 * @param $senddata : 보낼 데이터
 * @param $key : 암호화 키
 * @return array
 * @throws Exception
 */
function set_sendData($senddata,$key)
{
    $result = Array();
    $send_data = Array("jsonValue" => $senddata);
    $send_data = json_encode($send_data);

    $send_data = AES_Encode($send_data,$key);

    $result[0] = Array("ParamData" => $send_data);

    return $result;
}
