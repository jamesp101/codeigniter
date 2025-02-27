<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->library('form_validation');
    }

    public function index() {
        $users = $this->User_model->get_users();
        // $this->output
        //     ->set_content_type('application/json')
        //     ->set_output(json_encode($users));
    }

    public function view($id) {
        $user = $this->User_model->get_user($id);
        if ($user) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($user));
        } else {
            show_404();
        }
    }

    public function create() {
        $data = json_decode($this->input->raw_input_stream, true);
        $this->form_validation->set_data($data);
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('department', 'Department', 'required');
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('email_add', 'Email', 'required|valid_email');

        if ($this->form_validation->run() === FALSE) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('error' => validation_errors())));
        } else {
            $this->User_model->insert_user($data);
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('status' => 'success')));
        }
    }

    public function update($id) {
        $data = json_decode($this->input->raw_input_stream, true);
        $this->load->helper('security');

        // TODO: confirm if any validation needed and what kind
        // this->form_validation->set_rules('firstname', 'First Name', 'required');
        // $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        // $this->form_validation->set_rules('email_add', 'Email', 'required|valid_email');

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
            $this->User_model->update_user($id, $data);
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(array('status' => 'success')));
        }
    }

    public function delete($id) {
        $this->User_model->delete_user($id);
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(array('status' => 'success')));
    }
}
