<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Office_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_offices() {
        $query = $this->db->get('z_office');
        return $query->result();
    }

    public function get_offices_array() {
        $query = $this->db->get('z_office');
        return $query->result_array();
    }


    public function get_office($id) {
        $query = $this->db->where('ID_Office', $id)->get('z_office');
        return $query->result();
    }

    public function insert_office($data) {
        return $this->db->insert('z_office', $data);
    }

    public function update_office($id, $data) {
        // Begin a transaction to ensure data consistency
        $this->db->trans_start();
    
        // Update the z_office table
        $this->db->where('ID_Office', $id);
        $this->db->update('z_office', $data);
    
        // Update the office column in the all_users table
        if (isset($data['Office_Name'])) { // Check if 'Office_Name' is being updated
            $this->db->where('office_id', $id); // Use the correct column name
            $this->db->update('all_users', ['office' => $data['Office_Name']]);
        }
    
        // Complete the transaction
        return $this->db->trans_complete();
    }

    public function delete_office($id) {
        $this->db->where('ID_Office', $id);
        return $this->db->delete('z_office');
    }

    public function get_offices_by_department($departmentName) {
        $this->db->where('Department_Category', $departmentName);
        $query = $this->db->get('z_office');  // Assuming your table is called z_offices
        return $query->result_array();  // Return the result as an array
    }
}
?>