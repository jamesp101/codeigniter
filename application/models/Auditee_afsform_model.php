<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auditee_afsform_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Create
    public function insert_auditee_afsform($data) {
        return $this->db->insert('auditee_afsform', $data);
    }

    // Read (Get all records)
    public function get_all_auditee_afsform() {
        $query = $this->db->get('auditee_afsform');
        return $query->result();
    }

    // Read (Get a specific record by ID)
    public function get_auditee_afsform_by_id($id) {
        $query = $this->db->get_where('auditee_afsform', array('AFSForm_ID' => $id));
        return $query->row();
    }

    // Update
    public function update_auditee_afsform($id, $data) {
        $this->db->where('AFSForm_ID', $id);
        return $this->db->update('auditee_afsform', $data);
    }

    // Delete
    public function delete_auditee_afsform($id) {
        $this->db->where('AFSForm_ID', $id);
        return $this->db->delete('auditee_afsform');
    }
}
