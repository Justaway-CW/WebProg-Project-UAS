<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserData extends CI_Model {
	public function loginUser($email){
                $query = $this->db->query('SELECT * FROM account WHERE email = "' . $email . '"');
                return $query->result_array();
	}

        public function registerUser($values){
                $this->db->insert('account', $values);
                redirect(base_url());
        }
        
        public function getUser(){
                $query = $this->db->query('SELECT * FROM account');
                return $query->result_array();
        }

        public function getFacility(){
                $query = $this->db->query('SELECT * FROM facility');
                return $query->result_array();
        }

        public function getSpecificFacility($id){
                $query = $this->db->query('SELECT * FROM facility WHERE id = "' . $id . '"');
                return $query->result_array();
        }

        public function getRequest(){
                $query = $this->db->query('SELECT * FROM request');
                return $query->result_array();
        }

        public function getJoinRequest(){
                $query = $this->db->query("SELECT r.id, a.name 'requesterName', f.name 'facilityName', r.date, r.startTime, r.endTime 
                FROM request as r
                JOIN account as a ON (r.requesterID = a.id)
                JOIN facility as f ON (r.facilityID = f.id)");
                return $query->result_array();
        }

        public function getWaitingJoinRequest(){
                $query = $this->db->query("SELECT r.id, a.name 'requesterName', f.name 'facilityName', r.date, r.startTime, r.endTime 
                FROM request as r
                JOIN account as a ON (r.requesterID = a.id)
                JOIN facility as f ON (r.facilityID = f.id)
                WHERE r.status = 'WAITING'");
                return $query->result_array();
        }

        public function getspecificRequests($id){
                $query = $this->db->query('SELECT * FROM request WHERE requesterID = "' . $id . '"');
                return $query->result_array();
        }

        public function getfacilityRequests($id){
                $query = $this->db->query('SELECT * FROM request WHERE status = "APPROVED" AND facilityID = "' . $id . '"');
                return $query->result_array();
        }

        public function getSpecificUser($id){
                $query = $this->db->query('SELECT * FROM account WHERE id = "' . $id . '"');
                return $query->result_array();
        }

        public function getSomeRequest(){
                $query = $this->db->query('SELECT * FROM request WHERE status = "WAITING"');
                return $query->result_array();
        }

        public function deleteUser($id){
                $this->db->where('id', $id);
                $this->db->delete('account');
                redirect(site_url('admin/showUser'));
        }

        public function editUserDB($values){
                $this->db->where('id', $values['id']);
                $this->db->update('account', $values);
                redirect(site_url('admin/showUser'));
        }

        public function addUserDB($values){
                $this->db->insert('account', $values);
                redirect(site_url('admin/showUser'));
        }

        public function deleteFacility($id){
                $this->db->where('id', $id);
                $this->db->delete('facility');
                redirect(site_url('facility/showFacility'));
        }

        public function addFacilityDB($values){
                $this->db->insert('facility', $values);
                redirect(site_url('facility/showFacility'));
        }

        public function editFacilityDB($values){
                $this->db->where('id', $values['id']);
                $this->db->update('facility', $values);
                redirect(site_url('facility/showFacility'));
        }

        public function deleteRequest($id){
                $this->db->where('id', $id);
                $this->db->delete('request');
                redirect(site_url('admin/showRequest'));
        }

        public function approveRequest($id){
                $data = array(
                        'status' => 'APPROVED',
                );
                $this->db->where('id', $id);
                $this->db->update('request', $data);
                redirect(site_url('management/showRequest'));
        }

        public function rejectRequest($id){
                $data = array(
                        'status' => 'REJECTED',
                );
                $this->db->where('id', $id);
                $this->db->update('request', $data);
                redirect(site_url('management/showRequest'));
        }

        public function insertRequest($values){
                $this->db->insert('request', $values);
                redirect(site_url('guest/showRequest'));
        }
}