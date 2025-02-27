<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auditor_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Function to fetch all auditors from the x_auditors table
    public function get_auditors() {
        $this->db->select('ID_Auditor, Name_Of_Auditor');
        $this->db->order_by('Name_Of_Auditor', 'ASC');
        $query = $this->db->get('x_auditors');
        return $query->result_array();
    }

    // Function to fetch a specific auditor by ID
    public function get_auditor_by_id($id) {
        $this->db->select('ID_Auditor, Name_Of_Auditor');
        $this->db->where('ID_Auditor', $id);
        $query = $this->db->get('x_auditors');
        return $query->row_array();
    }

    // Function to insert a new auditor into the x_auditors table
    public function insert_auditor($data) {
        $this->db->insert('x_auditors', $data);
        return $this->db->insert_id();
    }

    // Function to update an existing auditor's information
    public function update_auditor($id, $data) {
        $this->db->where('ID_Auditor', $id);
        return $this->db->update('x_auditors', $data);
    }

    // Function to delete an auditor from the x_auditors table
    public function delete_auditor($id) {
        $this->db->where('ID_Auditor', $id);
        return $this->db->delete('x_auditors');
    }
}
