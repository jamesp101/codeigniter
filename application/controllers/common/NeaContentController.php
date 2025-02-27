<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NeaContentController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load the model for interacting with the database
        // $this->load->model('Nea_model');
    }

    public function index($id = NULL) {



        // Check if an ID is provided
        if ($id === NULL) {
            show_404(); // Show 404 page if no ID is provided
        }

        // Get the data for the given ID
        // $data['nea_data'] = $this->Nea_model->get_data_by_id($id);
        $data['nea_data'] = $this->db->get_where('home_nea_datatable', ['ID_NEA' => $id])->row_array();

        if (empty($data['nea_data'])) {
            show_404(); // Show 404 if no data is found for the ID
        }

        // Load the view and pass the data to it
        $this->load->view('users/nea_page', $data);
    }

}
