<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('layout');
	}

	public function checkIfLoggedIn() {
		if (isset($this->active_user)) {
			die(var_dump($this->active_user));
		}
	}


}

class MY_Back extends CI_Controller {
	protected $data;

	public function __construct()
	{
		parent::__construct();
		$this->load->library('layout');

		$this->data['css'] = $this->layout->add_css(array(
			'assets/plugins/bootstrap/css/bootstrap.min',
			'assets/plugins/elegant_font/css/style',
			'assets/css/styles',
		));
		$this->data['js'] = $this->layout->add_js(array(
			'assets/plugins/jquery-3.3.1.min',
			'assets/plugins/bootstrap/js/bootstrap.min',
			'assets/plugins/stickyfill/dist/stickyfill.min',
			'assets/js/main',
		));

		$this->session->userdata('active_user') == null ? redirect('') : 'dashboard';

		if ($this->session->userdata('active_user') != null) {

			$this->data['active_user'] = $this->session->userdata('active_user');
		}

	}
}
