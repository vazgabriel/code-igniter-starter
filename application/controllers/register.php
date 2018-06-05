<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	/**
	 * Register user by form submit
	 */
	public function index()
	{
		// Check if user isn't logged
		if (!$this->session->userdata('logged')) {

			// Declare form validations
			$this->form_validation->
				set_rules('name', 'Name', 'trim|required|min_length[3]|max_length[255]');
			$this->form_validation->
				set_rules('email', 'Email', 'trim|required|valid_email|min_length[3]|max_length[255]');
			$this->form_validation->
				set_rules('password', 'Password', 'trim|required|min_length[3]');
			$this->form_validation->
				set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[3]|matches[password]');

			// Checking if form validation passed
			if ($this->form_validation->run() != FALSE) {

				// Getting variables
				$name = $_POST['name'];
				$email = $_POST['email'];
				$password = $_POST['password'];

				// Preparing array to insert
				$user = array(
					'name' => $name,
					'email' => $email,
					'password' => $password
				);

				// Insert user
				$response = $this->user_model->create_user($user);

				// Checking by response
				if ($response == true) {
					$this->session->set_flashdata(array(
						'message' => 'User registered succefully, now login'
					));

					// Send user to login
					redirect('login');
				}

				// If form isn't valid or inputed
			} else {

				// Show errors if exists
				$error['errors'] = validation_errors();
				$this->session->set_flashdata($error);

				// Configure default main as register
				$data['main_view'] = 'register';

				// Load main and register component
				$this->load->view('layout/main', $data);
			}

		} else {
			// Redirect home
			redirect('home');
		}
	}
}
