<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Management extends CI_Controller {
	public function __construct(){
		parent::__construct();
        $this->load->model('UserData');
        if($_SESSION['role'] != 'MANAGEMENT'){
            redirect(base_url());
        }
    }

    public function showFacility(){
        $data['bootstrap'] = $this->load->view('include/bootstrap.php', NULL, TRUE);
        $data['footer'] = $this->load->view('include/footer.php', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);
		$data['data'] = $this->UserData->getFacility();
		$data['modal'] = $this->load->view('template/modalAdminAdd.php', NULL, TRUE);
		$this->load->view('pages/facility/facilityList.php', $data);
    }

    public function showRequest(){
        $data['bootstrap'] = $this->load->view('include/bootstrap.php', NULL, TRUE);
        $data['footer'] = $this->load->view('include/footer.php', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);
		$data['data'] = $this->UserData->getWaitingJoinRequest();
		$this->load->view('pages/management/requestList.php', $data);
    }

    public function approveRequest($id){
        $this->UserData->approveRequest($id);
    }

    public function rejectRequest($id){
        $this->UserData->rejectRequest($id);
    }
}