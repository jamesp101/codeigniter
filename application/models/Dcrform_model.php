<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dcrform_model extends CI_Model {

    public function get_departments() {
        return $this->db->get('z_department')->result();
    }

    public function get_offices($departmentName) {
        $this->db->where('Department_Name', $departmentName);
        return $this->db->get('z_office')->result();
    }

    public function insert_dcr_form($data) {
        $this->db->insert('qaiedirector_dcrform', $data);
    }

    public function update_dcr_form($randomUniqueCode, $data){
        $this->db->where('Random_Unique_Code', $randomUniqueCode);
        $this->db->update('qaiedirector_dcrform', $data);
    }

    public function insert_storage($data) {
        $this->db->insert('storage', $data);
    }

    public function insert_log($data) {
        $this->db->insert('y6_dcrforms_logs', $data);
    }

    public function get_dcr_data($random_unique_code) {
        $this->db->select('*');
        $this->db->from('qaiedirector_dcrform');
        $this->db->join('qaiedirector_dcrform_desc', '1=1', 'inner');
        $this->db->where('qaiedirector_dcrform.Random_Unique_Code', $random_unique_code);
        $query = $this->db->get();

        return $query->result_array(); // Fetch all results as an array
    }

    public function get_all_descriptions() {
        return $this->db->get('qaiedirector_dcrform_desc')->result_array();
    }
}
