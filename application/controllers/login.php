<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Login user by form submit
	 */
	public function index()
	{
		// Check if user isn't logged
		if (!$this->session->userdata('logged')) {

			// Declare form validations
			$this->form_validation->
				set_rules('email', 'Email', 'trim|required|valid_email|min_length[3]|max_length[255]');
			$this->form_validation->
				set_rules('password', 'Password', 'trim|required|min_length[3]');

			// Checking if form validation passed
			if ($this->form_validation->run() != FALSE) {

				// Getting variables
				$email = $_POST['email'];
				$password = $_POST['password'];

				// Login user
				$response = $this->user_model->login_user($email, $password);

				// Checking by response
				if ($response != false) {
					$this->session->set_flashdata(array(
						'message' => 'Bem-vindo ' . $response->name
					));

					// Save userData in session
					$this->session->set_userdata(array(
						'logged' => true,
						'id' => $response->id,
						'name' => $response->name,
						'email' => $response->email
					));

					// Send user to home
					redirect('home');
				} else {
					$this->session->set_flashdata(array(
						'login_error' => 'Invalid email or password!'
					));					

					// Configure default main as login
					$data['main_view'] = 'login';

					// Load main and login component
					$this->load->view('layout/main', $data);
				}

				// If form isn't valid or inputed
			} else {

				// Show errors if exists
				$error['errors'] = validation_errors();
				$this->session->set_flashdata($error);

				// Configure default main as login
				$data['main_view'] = 'login';

				// Load main and login component
				$this->load->view('layout/main', $data);
			}

		} else {
			// Redirect home
			redirect('home');
		}
	}
}
