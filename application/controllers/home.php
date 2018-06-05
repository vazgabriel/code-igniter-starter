<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Just show a simple home page
	 */
	public function index()
	{
		// Check if user is logged
		if ($this->session->userdata('logged')) {

			// Configure default main as home
			$data['main_view'] = 'home';

			// Load main and home component
			$this->load->view('layout/main', $data);
			
		} else {
			// Redirect to login
			redirect('login');
		}
	}
}
