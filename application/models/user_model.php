<?php 

/**
 *	User Model Reference
 */
class User_model extends CI_Model{

	/**
	 *	Create a new user on Database
	 *	
	 *	@param User $user
	 *	
	 *	@return bool
	 */
	public function create_user($user) {
		return $this->db->insert('users', $user);
	}

	/**
	 *	Get a user or a list of users
	 *	
	 *	@param int $id?
	 *	
	 *	@return User | User[]
	 */
	public function get_users($id = null) {

		if ($id) {
			$this->db->where(['id' => $id]);
			return $this->db->get('users')->result()[0];
		} else {
			return $this->db->get('users')->result();
		}

	}

	/**
	 *	Update a user on Database
	 *	
	 *	@param int $id
	 *	@param User $user
	 *	
	 *	@return bool
	 */
	public function update_user($id = null, $newUser = null) {

		// Checking by id
		if ($id && $newUser) {
			// Delete user if exists
			$this->db->where(['id' => $id]);
			return $this->db->update('users', $newUser);
		} else {
			return false;
		}

	}

	/**
	 *	Delete a user on Database
	 *	
	 *	@param int $id
	 *	
	 *	@return bool
	 */
	public function delete_user($id = null) {

		// Checking by id
		if ($id) {
			// Checking if exists user
			$this->db->where(['id' => $id]);
			$user = $this->db->get('users')->result()[0];

			if ($user) {
				// Delete user if exists
				$this->db->where(['id' => $id]);
				return $this->db->delete('users');
			} else {
				return false;
			}
		} else {
			return false;
		}

	}

	/**
	 *	Login a User
	 *	
	 *	@param string $email
	 *	@param string $password
	 *	
	 *	@return bool | User
	 */
	public function login_user($email, $password) {
		// Configure where clause
		$this->db->where(array(
			'email' => $email,
			'password' => $password
		));

		// Checking by response
		$response = $this->db->get('users');

		if ($response->num_rows() == 1) {
			return $response->row(0);
		} else {
			return false;
		}
	}

}

?>