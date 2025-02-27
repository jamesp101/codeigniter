<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Department_model');
        // $this->check_role('Super Admin'); // Only allow access to admins, still to be added
    }

    public function index() {
        // $this->load->view('admin/admin-index');
        $data['content'] = $this->load->view('admin/admin-index', NULL, TRUE);
        // Load the view and pass the data
        $this->load->view('admin/template/page', $data);
    }
}
?>