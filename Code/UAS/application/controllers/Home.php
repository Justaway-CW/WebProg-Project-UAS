<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct(); 
		$this->load->model('UserData');

		$this->load->library('form_validation');
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
			),
			array(
				'field' => 'repassword',
				'label' => 'Retyped Password',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Please fill this form!'
				)
			)
		);

		$this->form_validation->set_rules($rules);
	}

	public function index(){
		$this->session->unset_userdata('invalidRegister');
		$this->session->unset_userdata('invalidLogin');
		$this->session->unset_userdata('invalidAdd');
		$this->session->unset_userdata('invalidEdit');
		$this->session->unset_userdata('invalidBook');
		$this->session->unset_userdata('validBook');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('id');
        $data['bootstrap'] = $this->load->view('include/bootstrap.php', NULL, TRUE);
		$data['footer'] = $this->load->view('include/footer.php', NULL, TRUE);
		$data['modal'] = $this->load->view('template/modal.php', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);
		$data['captcha'] = $this->load->view('include/recaptcha.php', NULL, TRUE);
		$this->load->view('pages/landing.php', $data);
	}

	public function logout(){
		$this->session->unset_userdata('invalidRegister');
		$this->session->unset_userdata('invalidLogin');
		$this->session->unset_userdata('invalidAdd');
		$this->session->unset_userdata('invalidEdit');
		$this->session->unset_userdata('invalidBook');
		$this->session->unset_userdata('validBook');
		$this->session->unset_userdata('role');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('id');
		redirect(base_url());
	}

	public function login(){
		$email = $this->input->post('emailL');
		$password = $this->input->post('passwordL');
		$captcha = $this->input->post('g-recaptcha-response');
		$str = "https://www.google.com/recaptcha/api/siteverify?secret=6LdHQ2cdAAAAANesUmfeMN6R-6xXktb4HyLfxGki" . "&response=" . $captcha;
		$response = file_get_contents($str);
		$response_arr = (array) json_decode($response);

		if($response_arr["success"]){
			$user = $this->UserData->loginUser($email);
			if(!$user == NULL){
				if(password_verify($password, $user[0]['password'])){
					$this->session->set_userdata('role', $user[0]['role']);
					$this->session->set_userdata('name', $user[0]['name']);
					$this->session->set_userdata('id', $user[0]['id']);
					if($user[0]['role'] == 'ADMIN'){
						$this->session->set_userdata('role', 'ADMIN');
						redirect(site_url('home/showAdminUsers'));
					}
					else if($user[0]['role'] == 'MANAGEMENT'){
						$this->session->set_userdata('role', 'MANAGEMENT');
						redirect(site_url('home/showManagementRequests'));
					}
					else{
						$this->session->set_userdata('role', 'GUEST');
						redirect(site_url('home/showGuestFacilities'));
					}
				}
				else{
					$_SESSION['invalidLogin'] = "Email or Password wrong, please try again!";
					$data['bootstrap'] = $this->load->view('include/bootstrap.php', NULL, TRUE);
					$data['footer'] = $this->load->view('include/footer.php', NULL, TRUE);
					$data['modal'] = $this->load->view('template/modal.php', NULL, TRUE);
					$data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);
					$data['captcha'] = $this->load->view('include/recaptcha.php', NULL, TRUE);
					$this->load->view('pages/landing.php', $data);
				}
			}
			else{
				$_SESSION['invalidLogin'] = "Email or Password wrong, please try again!";
				$data['bootstrap'] = $this->load->view('include/bootstrap.php', NULL, TRUE);
				$data['footer'] = $this->load->view('include/footer.php', NULL, TRUE);
				$data['modal'] = $this->load->view('template/modal.php', NULL, TRUE);
				$data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);
				$data['captcha'] = $this->load->view('include/recaptcha.php', NULL, TRUE);
				$this->load->view('pages/landing.php', $data);
			}
		}
		else{
			$_SESSION['invalidLogin'] = "Please check the google recaptcha box!";
			$data['bootstrap'] = $this->load->view('include/bootstrap.php', NULL, TRUE);
			$data['footer'] = $this->load->view('include/footer.php', NULL, TRUE);
			$data['modal'] = $this->load->view('template/modal.php', NULL, TRUE);
			$data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);
			$data['captcha'] = $this->load->view('include/recaptcha.php', NULL, TRUE);
			$this->load->view('pages/landing.php', $data);
		}
	}

	public function register(){
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$repassword = $this->input->post('repassword');
		$captcha = $this->input->post('g-recaptcha-response');
		$str = "https://www.google.com/recaptcha/api/siteverify?secret=6LdHQ2cdAAAAANesUmfeMN6R-6xXktb4HyLfxGki" . "&response=" . $captcha;
		$response = file_get_contents($str);
		$response_arr = (array) json_decode($response);

		if($response_arr["success"]){
			if($this->form_validation->run()){
				if($password == $repassword){
					$values = array(
						'name' => $name,
						'email' => $email,
						'password' => password_hash($password, PASSWORD_DEFAULT),
						'role' => 'GUEST'
					);
					$this->session->unset_userdata('invalidRegister');
					$this->UserData->registerUser($values);
				}
				else{
					$_SESSION['invalidRegister'] = "Password doesn't match, please try again!";
					$dataModal['values'] = array(
						'name' => $name,
						'email' => $email
					);
					$data['bootstrap'] = $this->load->view('include/bootstrap.php', NULL, TRUE);
					$data['footer'] = $this->load->view('include/footer.php', NULL, TRUE);
					$data['modal'] = $this->load->view('template/modal.php', $dataModal, TRUE);
					$data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);
					$data['captcha'] = $this->load->view('include/recaptcha.php', NULL, TRUE);
					$this->load->view('pages/landing.php', $data);
				}
			}
			else{
				$_SESSION['invalidRegister'] = 'Please fill out empty forms!';
				$dataModal['values'] = array(
					'name' => $name,
					'email' => $email
				);
				$data['bootstrap'] = $this->load->view('include/bootstrap.php', NULL, TRUE);
				$data['footer'] = $this->load->view('include/footer.php', NULL, TRUE);
				$data['modal'] = $this->load->view('template/modal.php', $dataModal, TRUE);
				$data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);
				$data['captcha'] = $this->load->view('include/recaptcha.php', NULL, TRUE);
				$this->load->view('pages/landing.php', $data);
			}
		}
		else{
			$_SESSION['invalidRegister'] = "Please check the google recaptcha box!";
			$dataModal['values'] = array(
				'name' => $name,
				'email' => $email
			);
			$data['bootstrap'] = $this->load->view('include/bootstrap.php', NULL, TRUE);
			$data['footer'] = $this->load->view('include/footer.php', NULL, TRUE);
			$data['modal'] = $this->load->view('template/modal.php', $dataModal, TRUE);
			$data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);
			$data['captcha'] = $this->load->view('include/recaptcha.php', NULL, TRUE);
			$this->load->view('pages/landing.php', $data);
		}
	}

	public function showAdminUsers(){
		if($_SESSION['role'] != 'ADMIN'){
            redirect(base_url());
        }
		else{
			$data['bootstrap'] = $this->load->view('include/bootstrap.php', NULL, TRUE);
			$data['footer'] = $this->load->view('include/footer.php', NULL, TRUE);
			$data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);
			$data['data'] = $this->UserData->getUser();
			$data['modal'] = $this->load->view('template/modalAdminAdd.php', NULL, TRUE);
			$this->load->view('pages/admin/userList.php', $data);
		}
	}

	public function showManagementRequests(){
		if($_SESSION['role'] != 'MANAGEMENT'){
            redirect(base_url());
        }
		else{
			$data['bootstrap'] = $this->load->view('include/bootstrap.php', NULL, TRUE);
			$data['footer'] = $this->load->view('include/footer.php', NULL, TRUE);
			$data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);
			$data['data'] = $this->UserData->getWaitingJoinRequest();
			//$data['modal'] = $this->load->view('template/modalAdminAdd.php', NULL, TRUE);
			$this->load->view('pages/management/requestList.php', $data);
		}
	}

	public function showGuestFacilities(){
		if($_SESSION['role'] != 'GUEST'){
            redirect(base_url());
        }
		else{
			$data['bootstrap'] = $this->load->view('include/bootstrap.php', NULL, TRUE);
			$data['footer'] = $this->load->view('include/footer.php', NULL, TRUE);
			$data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);
			$data['data'] = $this->UserData->getFacility();
			//$data['modal'] = $this->load->view('template/modalAdminAdd.php', NULL, TRUE);
			$this->load->view('pages/guest/facilityList.php', $data);
		}
	}

	public function invalid404(){
		redirect(base_url());
	}
}