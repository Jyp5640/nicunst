<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 데이터베이스 에러 객체를 확인하여,
 * 에러가 존재하면 예외를 발생시킵니다.
 * 기존 모델 함수 내에서 예외를 발생시키고 있으면 사용하지 않아도 됩니다.
 * (예: 당연히 삭제되어야 하는데, $this->db->affected_rows() > 0  이 false인 경우)
 *
 * @throws Exception
 */
function check_db_error() {

    $error = get_instance()->db->error();

    if ($error['code'])
        throw new Exception($error['message'], $error['code']);

}
