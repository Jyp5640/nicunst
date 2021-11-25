<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * 공개키(모바일용) 선언 환자가입시에만 사용
 *
 * @return bool|string
 */
function getpublicKey(){

    $UT_PUBLICKEY = date("Y-m-d",time())."kinicareKINICARE!@#$%^&*()";
    return substr(hash("sha256",$UT_PUBLICKEY),0,32);
}

function getpublicKey2(){

	$UT_PUBLICKEY = date("Y-m-d",time())."KINIMALLkinimall!@#$%^&*()";
	return substr(hash("sha256",$UT_PUBLICKEY),0,32);
}

/**
 * 키니몰 가입시 쓰는 키
 *
 * @return bool|string
 */
function getKiniMallKey(){

	$KINIMALLKEY = date("Y-m-d",time())."KINIMALLkinimall!@#$%^&*()";
	return substr(hash("sha256",$KINIMALLKEY),0,32);
}

/**
 * 테이블별 암호화 키
 *
 * @param $DBname : 테이블명
 * @param string $Cust_Idx : 고객인덱스
 * @return bool|string
 */
function getDBKey($DBname, $Cust_Idx = '')
{
    try{
        $DBname = strtoupper($DBname);

        if('ACCOUNT' == $DBname && !empty($Cust_Idx))
        {
            $DBKey = substr(hash("sha256",$Cust_Idx.')(*&^A%C$C#o@u!n~t키니KINICAREaccount') , 0, 32);
        }
        else if('EMAIL' == $DBname && empty($Cust_Idx))
        {
            $DBKey = substr(hash("sha256",'Email=)(*&^%$#@!~키니케어KINICAREkinicare') , 0, 32);
        }
        else if('PHONE' == $DBname && empty($Cust_Idx))
        {
            $DBKey = substr(hash("sha256",'Phone=)(*&^%$#@!~키니케어KINICAREkinicare') , 0, 32);
        }
        else if('CUSTOMER' == $DBname && !empty($Cust_Idx))
        {
            $DBKey = substr(hash("sha256",$Cust_Idx.')(*&^%$#@!~키니케어KINICAREcustomer') , 0, 32);
        }
        else if('PATIENT' == $DBname && !empty($Cust_Idx))
        {
            $DBKey = substr(hash("sha256",$Cust_Idx.')(*&^%$#@!~키니케어KINICAREpatient') , 0, 32);
        }
        else if('PERSON' == $DBname && !empty($Cust_Idx))
        {
            $DBKey = substr(hash("sha256",$Cust_Idx.')(*&^%$#@!~키니케어KINICAREperson') , 0, 32);
        }
        else if('KG_HISTORY' == $DBname && !empty($Cust_Idx))
        {
            $DBKey = substr(hash("sha256",$Cust_Idx.')(*&^%$#@!~키니케어KINICAREkg_history') , 0, 32);
        }
        else if('PROG_HISTORY' == $DBname && !empty($Cust_Idx))
        {
            $DBKey = substr(hash("sha256",$Cust_Idx.')(*&^%$#@!~키니케어KINICAREprog_history') , 0, 32);
        }
        else if('PROC_HISTORY' == $DBname && !empty($Cust_Idx))
        {
            $DBKey = substr(hash("sha256",$Cust_Idx.')(*&^%$#@!~키니케어KINICAREproc_history') , 0, 32);
        }
        else if('SCHEDULE' == $DBname && empty($Cust_Idx))
        {
            $DBKey = substr(hash("sha256",')(*&^%$#@!~키니케어KINICAREschedule') , 0, 32); // 스케쥴은 테이블별 암호화
        }
        else if('REPORT' == $DBname && empty($Cust_Idx))
        {
            $DBKey = substr(hash("sha256",')(*&^%$#@!~키니케어KINICAREreport') , 0, 32); // 리포트는 테이블별 암호화
        }
        else if('DIARY' == $DBname && empty($Cust_Idx))
        {
            $DBKey = substr(hash("sha256",')(*&^%$#@!~키니케어KINICAREdiary') , 0, 32);// 다이어리는 테이블별 암호화
        }
        else if('CUSTDEVICE' == $DBname && empty($Cust_Idx))
        {
            $DBKey = substr(hash("sha256",')(*&^%$#@!~키니케어KINICAREcustdevice') , 0, 32);// 디바이스는 테이블별 암호화
        }
		else if('NQA' == $DBname && empty($Cust_Idx))
		{
			$DBKey = substr(hash("sha256",')(*&^%$#@!~키니케어KINICARENQA') , 0, 32);
		}
        else
        {
            throw new Exception($DBname.' Key error');
        }
        return $DBKey;
    }
    catch(Exception $e)
    {
        log_message('error', 'getDBKey('.$DBname.') 에러발생',TRUE);
        error_log(print_r($e,true));
        return false;
    }
}

function makeSessionKey($Cust_Idx)
{
    return substr(hash("sha256",date("Y-m-d h:m:s",time()).substr(microtime(FALSE),2,3).$Cust_Idx),0,32);
}
