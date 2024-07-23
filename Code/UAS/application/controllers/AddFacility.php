<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddFacility extends CI_Controller {
	public function __construct(){
		parent::__construct();
        $this->load->model('UserData');
        if($_SESSION['role'] == 'GUEST' || !isset($_SESSION['role'])){
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
				'field' => 'description',
				'label' => 'Description',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Please fill this form!'
				)
			),
			array(
				'field' => 'location',
				'label' => 'Location',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Please fill this form!'
				)
            )
		);

        $this->form_validation->set_rules($rules);
    }

    public function addFacility(){
        $config['upload_path']          = 'assets/facility/';
        $config['allowed_types']        = 'jpeg|jpg|png|jfif';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;

        $this->load->library('upload', $config);

        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $location = $this->input->post('location');

        if($this->upload->do_upload('image')){
            $values = array(
                'name' => $name,
                'description' => $description,
                'location' => $location,
                'image' => $this->upload->data('file_name')
            );
    
            if($this->form_validation->run()){
                $this->UserData->addFacilityDB($values);
            }
            else{
                $_SESSION['invalidAdd'] = "Input Invalid!";
                $data['bootstrap'] = $this->load->view('include/bootstrap.php', NULL, TRUE);
                $data['footer'] = $this->load->view('include/footer.php', NULL, TRUE);
                $data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);
                $data['data'] = $this->UserData->getFacility();
                $data['modal'] = $this->load->view('template/modalAdminAdd.php', NULL, TRUE);
                $this->load->view('pages/admin/facilityList.php', $data);
            }
        }
        else{
            $_SESSION['invalidAdd'] = $this->upload->display_errors();;
            $data['bootstrap'] = $this->load->view('include/bootstrap.php', NULL, TRUE);
            $data['footer'] = $this->load->view('include/footer.php', NULL, TRUE);
            $data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);
            $data['data'] = $this->UserData->getFacility();
            $data['modal'] = $this->load->view('template/modalAdminAdd.php', NULL, TRUE);
            $this->load->view('pages/admin/facilityList.php', $data);
        }
    }
}