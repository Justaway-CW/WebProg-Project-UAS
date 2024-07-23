<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {
	public function __construct(){
		parent::__construct();
        $this->load->model('UserData');
        if($_SESSION['role'] != 'GUEST'){
            redirect(base_url());
        }

        $rules = array(
			array(
				'field' => 'date',
				'label' => 'Date',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Please fill this form!'
				)
			),
			array(
				'field' => 'sTime',
				'label' => 'Start Time',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Please fill this form!'
				)
			),
			array(
				'field' => 'eTime',
				'label' => 'End Time',
				'rules' => 'required',
				'errors' => array(
					'required' => 'Please fill this form!'
				)
            )
		);

        $this->form_validation->set_rules($rules);
    }

    public function showFacility(){
        $data['bootstrap'] = $this->load->view('include/bootstrap.php', NULL, TRUE);
        $data['footer'] = $this->load->view('include/footer.php', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);
		$data['data'] = $this->UserData->getFacility();
		$data['modal'] = $this->load->view('template/modalAdminAdd.php', NULL, TRUE);
		$this->load->view('pages/guest/facilityList.php', $data);
    }

    public function showRequest(){
        $data['bootstrap'] = $this->load->view('include/bootstrap.php', NULL, TRUE);
        $data['footer'] = $this->load->view('include/footer.php', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);
        $data['modal'] = $this->load->view('template/modalBook.php', NULL, TRUE);
		$data['dataR'] = $this->UserData->getspecificRequests($this->session->userdata('id'));
        $data['dataF'] = $this->UserData->getFacility();
		$this->load->view('pages/guest/requestList.php', $data);
    }

    public function showFacilityDetail($id){
        $data['bootstrap'] = $this->load->view('include/bootstrap.php', NULL, TRUE);
        $data['footer'] = $this->load->view('include/footer.php', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);
		$data['data'] = $this->UserData->getSpecificFacility($id);
		$this->load->view('pages/guest/facilityDetail.php', $data);
    }

    public function showBookFacility($id){
        if($id == 0){
            $data['id'] = 1;
        }
        else{
            $data['id'] = $id;
        }
        $data['bootstrap'] = $this->load->view('include/bootstrap.php', NULL, TRUE);
        $data['footer'] = $this->load->view('include/footer.php', NULL, TRUE);
		$data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);
		$data['data'] = $this->UserData->getFacility();
		$this->load->view('pages/guest/bookFacility.php', $data);
    }

    public function bookFacility(){
        $id = $this->input->post('id');
        $date = $this->input->post('date');
        $sTime = $this->input->post('sTime');
        $eTime = $this->input->post('eTime');

        $data = $this->UserData->getRequest();

        $fail = false;
        if(!$this->form_validation->run()){
            $values = array(
                'requesterID' => $this->session->userdata('id'),
                'facilityID' => $id,
                'date' => $date,
                'startTime' => $sTime,
                'endTime' => $eTime,
            );

            $_SESSION['invalidBook'] = 'Please fill out empty forms!';
            $data['id'] = $id;
            $data['values'] = $values;
            $data['bootstrap'] = $this->load->view('include/bootstrap.php', NULL, TRUE);
            $data['footer'] = $this->load->view('include/footer.php', NULL, TRUE);
            $data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);
            $data['data'] = $this->UserData->getFacility();
            $this->load->view('pages/guest/bookFacility.php', $data);
        }
        else{
            foreach($data as $list){
                if($id == $list['facilityID'] && $date == $list['date'] && !strcmp($list['status'], 'APPROVED')){
                    if($sTime < $eTime){
                        if($sTime < $list['startTime'] && $eTime <= $list['startTime']){
                            $fail = true;
                        }
                        else if($sTime >= $list['endTime'] && $eTime > $list['endTime']){
                            $fail = true;
                        }
                        else if($sTime <= $list['startTime'] && $eTime >= $list['endTime']){
                            $fail = false;
                        }
                        else if(($sTime >= $list['startTime'] && $sTime <= $list['endTime']) && ($eTime >= $list['startTime'] && $eTime <= $list['endTime'])){
                            $fail = false;
                        }
                        else if($sTime <= $list['startTime'] && ($eTime <= $list['endTime'] && $eTime >= $list['startTime'])){
                            $fail = false;
                        }
                        else if(($sTime <= $list['endTime'] && $sTime >= $list['startTime']) && $eTime >= $list['endTime']){
                            $fail = false;
                        }
                    }
                    else{
                        $fail = false;
                    }
                }
            }

            $values = array(
                'requesterID' => $this->session->userdata('id'),
                'facilityID' => $id,
                'date' => $date,
                'startTime' => $sTime,
                'endTime' => $eTime,
                'status' => 'WAITING'
            );

            if(!$fail){
                $_SESSION['invalidBook'] = 'Schedule taken, please select another time!';
                $data['id'] = $id;
                $data['values'] = $values;
                $data['bootstrap'] = $this->load->view('include/bootstrap.php', NULL, TRUE);
                $data['footer'] = $this->load->view('include/footer.php', NULL, TRUE);
                $data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);
                $data['schedule'] = $this->UserData->getFacilityRequests($id);

                $data['data'] = $this->UserData->getFacility();
                $this->load->view('pages/guest/bookFacility.php', $data);
            }else{
                $this->session->set_userdata('validBook', 'Schedule has been set, waiting for approval!');
                $this->UserData->insertRequest($values);
                $data['bootstrap'] = $this->load->view('include/bootstrap.php', NULL, TRUE);
                $data['footer'] = $this->load->view('include/footer.php', NULL, TRUE);
                $data['navbar'] = $this->load->view('template/navbar.php', NULL, TRUE);
                $data['modal'] = $this->load->view('template/modalBook.php', NULL, TRUE);
                $data['dataR'] = $this->UserData->getspecificRequests($this->session->userdata('id'));
                $data['dataF'] = $this->UserData->getFacility();
                $this->load->view('pages/guest/requestList.php', $data);
            }
        }
    }
}