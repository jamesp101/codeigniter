<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Department_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_departments() {
        $query = $this->db->get('z_department');
        return $query->result();
    }
    public function get_departments_array() {
        $query = $this->db->get('z_department');
        return $query->result_array();
    }

    public function get_department($id) {
        $query = $this->db->where('ID_Department', $id)->get('z_department');
        return $query->result();
    }

    public function insert_department($data) {
        return $this->db->insert('z_department', $data);
    }

    public function update_department($id, $data) {
        $this->db->where('ID_Department', $id);
        return $this->db->update('z_department', $data);
    }

    public function delete_department($id) {
        $this->db->where('Id_Department', $id);
        return $this->db->delete('z_department');
    }
}
?>