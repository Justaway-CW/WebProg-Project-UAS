<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminAddUser extends CI_Controller {
	public function __construct(){
		parent::__construct();
        $this->load->model('UserData');
        if($_SESSION['role'] != 'ADMIN'){
            redirect(base_url());
        }

        $rules = array(
			array(
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Please fill this form!'
				)
			),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required|is_unique[account.email]',
				'errors' => array(
					'required' => 'Please fill this form!',
					'is_unique' => 'Email taken!'
				)
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Please fill this form!'
				)
            )
		);

        $this->form_validation->set_rules($rules);
    }

    public function addUser(){
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $role = $this->input->post('role');

        $values = array(
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => $role
        );

        if($this->form_validation->run()){
            $this->UserData->addUserDB($values);
        }
        else{
            $_SESSION['invalidAdd'] = "Input Invalid!";
            $data['bootstrap'] = $this->load->view('include/bootstrap.php', NULL, TRUE);
            $data['footer'] = $this->load->view('include/footer.php', NULL, TRUE);
            $data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);
            $data['data'] = $this->UserData->getUser();
            $data['modal'] = $this->load->view('template/modalAdminAdd.php', NULL, TRUE);
            $this->load->view('pages/admin/userList.php', $data);
        }
    }
}