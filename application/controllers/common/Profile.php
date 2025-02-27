<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {
    public function __construct() {
        parent::__construct();
        // Load the database and any necessary models or helpers
        $this->load->database();
        $this->load->model('User_model');
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('form');
        $this->load->library('session');

        $this->check_login();
    }

    public function index() {
        $user_id = $this->session->userdata('user_id');
        $query = $this->db->where('user_id', $user_id)->get('all_users');
        $data['user_details'] = $query->row_array();
        $this->load->view('users/profile',$data);
    }
}

