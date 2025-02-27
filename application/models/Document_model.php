<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Document_Model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function update_description($id, $data) {
        $this->db->where('ID', $id);
        return $this->db->update('qaiedirector_dcrform_desc', $data);
    }
}
