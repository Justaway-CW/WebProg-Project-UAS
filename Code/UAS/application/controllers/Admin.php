<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
        $this->load->model('UserData');
        if($_SESSION['role'] != 'ADMIN'){
            redirect(base_url());
        }
    }

    public function deleteUser($id){
        $this->UserData->deleteUser($id);
    }

    public function editUser(){
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $role = $this->input->post('role');
        $values = array(
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => $role
        );
        $this->UserData->editUserDB($values);
    }

    public function showEditUser($id){
        $data['bootstrap'] = $this->load->view('include/bootstrap.php', NULL, TRUE);
        $data['footer'] = $this->load->view('include/footer.php', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);
		$data['values'] = $this->UserData->getSpecificUser($id);
		$this->load->view('pages/admin/editUser.php', $data);
    }

    public function showUser(){
        $data['bootstrap'] = $this->load->view('include/bootstrap.php', NULL, TRUE);
        $data['footer'] = $this->load->view('include/footer.php', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);
		$data['data'] = $this->UserData->getUser();
		$data['modal'] = $this->load->view('template/modalAdminAdd.php', NULL, TRUE);
		$this->load->view('pages/admin/userList.php', $data);
    }

    // public function showFacility(){
    //     $data['bootstrap'] = $this->load->view('include/bootstrap.php', NULL, TRUE);
    //     $data['footer'] = $this->load->view('include/footer.php', NULL, TRUE);
	// 	$data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);
	// 	$data['data'] = $this->UserData->getFacility();
	// 	$data['modal'] = $this->load->view('template/modalAdminAdd.php', NULL, TRUE);
	// 	$this->load->view('pages/admin/facilityList.php', $data);
    // }

    public function showRequest(){
        $data['bootstrap'] = $this->load->view('include/bootstrap.php', NULL, TRUE);
        $data['footer'] = $this->load->view('include/footer.php', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);
		$data['data'] = $this->UserData->getJoinRequest();
		$this->load->view('pages/admin/requestList.php', $data);
    }

    // public function deleteFacility($id){
    //     $imageOld = $this->UserData->getSpecificFacility($id);
    //     unlink('assets/facility/'.$imageOld[0]['image']);
    //     $this->UserData->deleteFacility($id);
    // }

    // public function showEditFacility($id){
    //     $data['bootstrap'] = $this->load->view('include/bootstrap.php', NULL, TRUE);
    //     $data['footer'] = $this->load->view('include/footer.php', NULL, TRUE);
	// 	$data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);
	// 	$data['values'] = $this->UserData->getSpecificFacility($id);
	// 	$this->load->view('pages/admin/editFacility.php', $data);
    // }

    // public function editFacility(){
    //     $id = $this->input->post('id');
    //     $name = $this->input->post('name');
    //     $description = $this->input->post('description');
    //     $location = $this->input->post('location');
    //     $imageOld = $this->input->post('imageOld');
        
    //     $config['upload_path']          = 'assets/facility/';
    //     $config['allowed_types']        = 'jpeg|jpg|png|jfif';
    //     //$config['max_size']             = 2000;
    //     //$config['max_width']            = 1024;
    //     //$config['max_height']           = 768;

    //     $this->load->library('upload', $config);

    //     if($this->upload->do_upload('image')){
    //         $values = array(
    //             'id' => $id,
    //             'name' => $name,
    //             'description' => $description,
    //             'location' => $location,
    //             'image' => $this->upload->data('file_name')
    //         );
    //         unlink('assets/facility/'.$imageOld);
    //         $this->UserData->editFacilityDB($values);
    //     }
    //     else{
    //         if(!strcmp($this->upload->display_errors(), "<p>You did not select a file to upload.</p>")){
    //             $values = array(
    //                 'id' => $id,
    //                 'name' => $name,
    //                 'description' => $description,
    //                 'location' => $location,
    //                 'image' => $imageOld
    //             );
    //             $this->UserData->editFacilityDB($values);
    //         }
    //         else{
    //             $_SESSION['invalidEdit'] = $this->upload->display_errors();
    //             redirect(site_url("Admin/showEditFacility/".$id));
    //         }
    //     }
    // }

    public function deleteRequest($id){
        $this->UserData->deleteRequest($id);
    }
}