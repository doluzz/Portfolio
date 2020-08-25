<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model', 'userManager');
	}

	public function login_attempt() {

		$rules = array(
			array(
				'field' => 'login-pseudo',
				'label' => 'Pseudo',
				'rules' => 'required'
			),
			array(
				'field' => 'login-password',
				'label' => 'Mot de Passe',
				'rules' => 'required'
			)
		);

		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run()) {
			//die(var_dump($this->input->post()));
			$attempt = $this->userManager->attempt($this->input->post());

			if ($attempt === null) {
				header("Content-type:application/json");
				echo json_encode(array('error' => 'Pseudo ou Mot de Passe incorrect !'));
			} else {
				$this->session->set_userdata('active_user', $attempt);
				// die(var_dump($attempt));
				header("Content-type:application/json");
				echo json_encode(array('success' => 'Connexion en cours...'));
			}
		}

	}

	public function register() {
		//die(var_dump($this->input->post()));

		$field_array = array(
			array(
				'field' => 'register_name',
				'label' => 'Nom de Famille',
				'rules' => 'trim|required|min_length[4]|max_length[16]'
			),
			array(
				'field' => 'register_first_name',
				'label' => 'Prénom',
				'rules' => 'trim|required|min_length[4]|max_length[16]'
			),
			array(
				'field' => 'register_pseudo',
				'label' => 'Pseudo',
				'rules' => 'trim|required|min_length[4]|max_length[16]|callback_pseudo_check'
			),
			array(
				'field' => 'register_email',
				'label' => 'Adresse Mail',
				'rules' => 'trim|required|min_length[4]|max_length[50]|valid_email|callback_email_check'
			),
			array(
				'field' => 'register_password',
				'label' => 'Mot de Passe',
				'rules' => 'trim|required|min_length[6]|max_length[16]|matches[register_password_confirmation]'
			),
			array(
				'field' => 'register_password_confirmation',
				'label' => 'Confirmation',
				'rules' => 'trim|required|min_length[6]|max_length[16]'
			),
		);

		$this->form_validation->set_rules($field_array);

		if ($this->form_validation->run() == FALSE) {
			header("Content-type:application/json");
			echo json_encode($this->form_validation->get_all_errors());
		} else {

			$encryptedPassword = $this->userManager->hash_generate($this->input->post('register_password'));
			// die(var_dump($encryptedPassword));

			$data['register_name'] = $this->input->post('register_name');
			$data['register_first_name'] = $this->input->post('register_first_name');
			$data['register_pseudo'] = $this->input->post('register_pseudo');
			$data['register_email'] = $this->input->post('register_email');
			$data['register_password'] = $encryptedPassword;
			$data['created_at'] = date('Y-m-d H:i:s');
			$data['updated_at'] = date('Y-m-d H:i:s');

			$this->userManager->createUser($data);

			if ($this->db->affected_rows() > 0) {
				header("Content-type:application/json");
				echo json_encode(array('success' => 'Inscription complétéé avec succès !'));
			}


		}
	}

	public function logout() {
		$this->session->unset_userdata('active_user');
		redirect();
	}

	public function pseudo_check($data) {

		$pseudoChecker = $this->userManager->checkExistUser('register_pseudo', $data);

		// die(var_dump($pseudoChecker));

		if ($pseudoChecker === true) {
			$this->form_validation->set_message('pseudo_check', 'Ce pseudo est déjà utilisé');
			return false;
		} else {
			return true;
		}

	}
	public function email_check($data) {

		$emailChecker = $this->userManager->checkExistUser('register_email', $data);

		// die(var_dump($pseudoChecker));

		if ($emailChecker === true) {
			$this->form_validation->set_message('email_check', 'Cet email est déjà utilisé');
			return false;
		} else {
			return true;
		}

	}
}
