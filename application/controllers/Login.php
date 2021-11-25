<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $public_view_data['view_title'] = '키니신생아 | Log in';

        $main_view_data['csrf_token'] = $this->security->get_csrf_hash();

        $this->load->view('/kr/publicHeader_v',$public_view_data );
		$this->load->view('/kr/login_v', $main_view_data);
//        $this->load->view('/backup/login_v_backup', $main_view_data);
	}
}
