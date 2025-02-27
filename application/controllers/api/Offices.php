<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offices extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Office_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->library('form_validation');
    }

    public function index() {
        $offices = $this->Office_model->get_offices();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($offices));
    }

    public function view($id) {
        $office = $this->Office_model->get_office($id);
        if ($office) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($office));
        } else {
            show_404();
        }
    }

    public function create() {
        $data = json_decode($this->input->raw_input_stream, true);
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules('Office_Name', 'Office Name', 'required');
        $this->form_validation->set_rules('Department_Category', 'Department Category', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('error' => validation_errors())));
        } else {
            $this->Office_model->insert_office($data);
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('status' => 'success')));
        }
    }

    public function update($id) {
        $data = json_decode($this->input->raw_input_stream, true);
        $this->load->helper('security');

        // TODO: confirm if any validation needed and what kind
        // $this->form_validation->set_rules('Office_Name', 'Office Name', 'required');
        if (array_key_exists('password', $data)) {
            $data['password'] = do_hash($data['password'], 'md5');
        }

        // TODO: confirm if any validation needed
        // if ($this->form_validation->run() === FALSE) {
        //     $this->output
        //         ->set_content_type('application/json')
        //         ->set_output(json_encode(array('error' => validation_errors())));
        // } else
        {
            $this->Office_model->update_office($id, $data);
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('status' => 'success')));
        }
    }

    public function delete($id) {
        $this->Office_model->delete_office($id);
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('status' => 'success')));
    }
}
