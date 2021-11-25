<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UTinfra_Form_validation extends CI_Form_validation {
	/*
     * 한글,영문,숫자,데쉬,언더바만 가능하게 한다. utf-8 기준.
     */
	public function korean_alpha_dash($str)
	{
		return ( preg_match('/[^\x{1100}-\x{11FF}\x{3130}-\x{318F}\x{AC00}-\x{D7AF}0-9a-zA-Z_-]/u',$str)) ? FALSE : TRUE;
	}

	// 날짜 형식 체크
    public function valid_date($date)
    {
        $d = DateTime::createFromFormat('Y-m-d', $date);
        return $d && $d->format('Y-m-d') === $date;
    }

    /**
     * 암호화를 위한 필수값 유무 체크
     *
     * @param	string
     * @return	bool
     */
    public function utinfra_enc_req_required($str)
    {
        return is_array($str)
            ? (empty($str) === FALSE)
            : (trim($str) !== '');
    }
}
?>
