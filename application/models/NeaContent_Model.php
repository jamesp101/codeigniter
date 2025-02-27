<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nea_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Fetch data based on the ID
    public function get_data_by_id($id) {
        $this->db->where('ID_NEA', $id);
        $query = $this->db->get('home_nea_datatable');
        return $query->row(); // Return a single row as an object
    }
}
