<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('encryption');
		$this->encryption->initialize(
			array(
				'cipher' => 'aes-256',
				'mode' => 'ctr',
				'key' => 'P@raC0urses2020'
			)
		);
	}

	public function attempt($input){

		$pseudo = $input['login-pseudo'];
		$password = $input['login-password'];



		if ($this->verify_pass($pseudo, $password) == true){


			return $this->getUserByField('*', 'register_pseudo', $pseudo);
		}
	}


	public function hash_generate($p_input){

		$password = $this->encryption->encrypt($p_input);

		return $password;

	}

	public function checkExistUser($field, $data) {

		// die(var_dump($field));

		$query = $this->db->select('*')
			->from('users')
			->where($field, $data)
			->get();

		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}

	}

	public function createUser($data) {
		$this->db->insert('users', $data);
	}

	public function verify_pass($pseudo, $password){

		$userInfos = $this->getUserByField('register_password' , 'register_pseudo', $pseudo);
		//die(var_dump($user));
		if ( $userInfos != null){
			$hash = $userInfos->register_password;
			//die(var_dump($hash));
			if ($this->hash_verify($hash, $password)){
				return true;
			}
		} else {
			return false;
		}
	}

	protected function getUserByField($select, $where, $value){

		//die(var_dump($this->db));

		$getData = $this->db->select($select)
			->from('users')
			->where($where, $value)
			->get();

		if ($getData->num_rows() > 0) {
			return $getData->row();
		} else {
			return false;
		}
	}

	public function hash_verify($p_bdd, $p_input){
		//die(var_dump($p_bdd . ' ' . $p_input));
		//die(var_dump($this->encryption->decrypt($p_bdd)));
		//die(var_dump($this->encryption->encrypt('Fd3223b7f')));
		$password_input = $this->encryption->encrypt($p_input);
		$password_output = $this->encryption->decrypt($password_input);
		//var_dump($password_input);
		$bdd_output = $this->encryption->decrypt($p_bdd);

		//die(var_dump($password_output . ' ' . $bdd_output));

		if ($p_input == $bdd_output){
			return true;
		}else{
			return false;
		}

	}

}
