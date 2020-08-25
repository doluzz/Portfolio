<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// Chargement des CSS
		$this->data['css'] = $this->layout->add_css(array(
			'assets/plugins/bootstrap/css/bootstrap.min',
			'assets/plugins/elegant_font/css/style',
			'assets/css/styles',
            'assets/css/yoo'
		));
		// Chargement des JS
		$this->data['js'] = $this->layout->add_js(array(
			'assets/plugins/jquery-3.3.1.min',
			'assets/plugins/bootstrap/js/bootstrap.min',
            'assets/js/main'
		));

		// Chargement de la vue
		$this->data['subview'] = 'index';

		// Définition de la variable pour voir si l'utilisateur est connecté
		// $loggedInCheck = $this->checkIfLoggedIn();

		// die(var_dump($loggedInCheck));

		// Si l'utilisateur est connecté on affiche un header différent
		/* if ($loggedInCheck) {

		}*/

		$this->load->view('components_home/main', $this->data);

		//$this->data['test'] = 'une donnée';

		//$this->layout->view('index', $this->data);

		// die(var_dump($test));

		// $this->load->view('index');
	}
}
