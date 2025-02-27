<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	public function __construct() {
        parent::__construct();
        // Load the database and any necessary models or helpers
        $this->load->database();
        $this->load->model('Event_Model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');

        $this->check_login();
    }

	public function index()
	{
        if (!in_array($this->session->userdata('role'), ["Super Admin", 'Administrator'])) {
            $data['events'] = $this->Event_Model->get_events();
            $data['event_types'] = $this->Event_Model->get_event_types();
            $data['neas'] = $this->db->get('home_nea_datatable')->result_array();
            $this->load->view('calendar', $data);
        } else {
            redirect('/admin');
        }
	}
}
