<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 로직 성공시 결과값 전송 함수
 *
 * @param null $resultValue
 */
function ut_procSuccess($resultValue = null)
{
//    header('Content-Type: application/json');

    if ($resultValue == null && !is_array($resultValue))
    {
        $successValue = array("statusCode" => "statOK" ,"statusValue" => "ok");

        echo json_encode($successValue);
    }
    else
    {
        $successValue = array("statusCode" => "dataOK" ,"jsonValue" => $resultValue);
//        error_log(json_encode($successValue));
        echo json_encode($successValue);
    }
}

/**
 * 로직 실패시 결과값 전송 함수
 *
 * @param $errorMsg : 실패 메시지
 * @param string $errCode : 실패 코드
 */
function ut_ProcError($errorMsg, $errCode = "ERROR")
{
    $errorValue = array("statusCode" => $errCode, "statusValue" => $errorMsg);
    echo json_encode($errorValue);
}
