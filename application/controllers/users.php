<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *	User controller reference
 */
class Users extends CI_Controller {

	/**
	 * Get a list of users
	 */
	public function index()
	{
		// Check if user is logged
		if ($this->session->userdata()) {
			// Get a list of users
			$data['users'] = $this->user_model->get_users();

			// Configure default main as users
			$data['main_view'] = 'pages/users';

			// Load main and users component
			$this->load->view('layout/main', $data);
			
		} else {
			// Redirect to login
			redirect('login');
		}
	}

	/**
	 *	User view detailed page
	 *	
	 *	@param int $id (If ID not passed, redirect to users index)
	 *	
	 */
	public function view($id = null) {
		if (!$id) {
			// If not id, redirect to users
			redirect('users');
		} else {
			// Get a list of user
			$data['user'] = $this->user_model->get_users($id);

			// Checking user existence
			if (!$data['user'] || empty($data['user'])) {
				// If user not exists
				redirect('users');
				return;
			}

			// Configure default main as user
			$data['main_view'] = 'pages/user';

			// Load main and user component
			$this->load->view('layout/main', $data);
		}
	}

  /**
	 *	User edit page
	 *	
	 *	@param int $id (If ID not passed, redirect to users index)
	 *	
	 *	Obs: If user submit a form, try to update user on Model
	 */
	public function edit($id = null) {
		if (!$id) {
			// If not id, redirect to users
			redirect('users');
		} else {
			// Declare form validations
			$this->form_validation->
				set_rules('name', 'Name', 'trim|required|min_length[3]|max_length[255]');
			$this->form_validation->
				set_rules('email', 'Email', 'trim|required|valid_email|min_length[3]|max_length[255]');

			// Checking if form validation passed
			if ($this->form_validation->run() != FALSE) {

				// Getting user params
				$name = $_POST['name'];
				$email = $_POST['email'];

				// Create new user array
				$user = array(
					"name" => $name,
					"email" => $email
				);

				// Update user on database
				$response = $this->user_model->update_user($id, $user);

				// Checking by response
				if ($response != false) {
					$this->session->set_flashdata(array(
						'success' => 'Usuário atualizado com sucesso!'
					));

					// Send user to list users
					redirect('users');
				} else {
					$this->session->set_flashdata(array(
						'error' => 'Ocorreu um erro ao atualizar o Usuário!'
					));

					// Send user to list users
					redirect('users');
				}

			} else {

				// Show errors if exists
				$error['errors'] = validation_errors();
				$this->session->set_flashdata($error);

				// Get a list of user
				$data['user'] = $this->user_model->get_users($id);

				// Checking user existence
				if (!$data['user'] || empty($data['user'])) {
					// If user not exists
					redirect('users');
					return;
				}

				// Configure default main as user
				$data['main_view'] = 'pages/edit_user';

				// Load main and user component
				$this->load->view('layout/main', $data);

			}
		}
	}

  /**
	 *	User Delete page
	 *	
	 *	@param int $id (If ID not passed, redirect to users index)
	 *	
	 *	Obs: If has a valid user, delete him from database
	 */
	public function delete($id = null) {
		if (!$id) {
			// If not id, redirect to users
			redirect('users');
		} else {
			// Get a list of user
			$deleted = $this->user_model->delete_user($id);

			// Cecking if deleted
			if ($deleted) {
				// Show success
				$this->session->set_flashdata(array(
					'success' => 'O Usuário foi apagado com sucesso!'
				));
			} else {
				// Show error
				$this->session->set_flashdata(array(
					'error' => 'Ocorreu um erro ao apagar o Usuário!'
				));
			}

			// After function, redirect to users
			redirect('users');
		}
	} 
}
