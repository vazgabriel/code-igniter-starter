<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	/**
	 * Logout user from session
	 */
	public function index()
	{
		// Destroy session and redirect to login
		$this->session->sess_destroy();
		redirect('login');
	}
}
