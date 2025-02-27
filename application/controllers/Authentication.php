<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'security'));
        $this->load->library('form_validation');
        $this->load->model('User_model');
    }

	public function index()
	{
        $this->load->helper('url');
        $user_role = $this->session->userdata('role');

        // TODO: confirm what roles redirects to what pages
        if ($user_role === "Administrator" || $user_role === "Super Admin") {
            redirect('/admin', 'refresh');
        }
        if ($user_role === "Requester") {
            redirect('/home', 'refresh');
        }
		$this->load->view('login');
	}


    public function login_submit() {
        $this->load->helper('security');
        // Set form validation rules
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Form validation failed, reload the login view
            $this->session->set_flashdata('error', 'Invalid username or password');
            redirect('login');
        } else {
            // Form validation passed
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Get user from database
            $user = $this->User_model->get_user_by_username($username);

            if ($user && (do_hash($password, 'md5') === $user->password)) {
                // Password matches, set session data
                $this->session->set_userdata('username', $user->username);
                $this->session->set_userdata('user_id', $user->user_id);
                $this->session->set_userdata('role', $user->type);
                $this->session->set_userdata('office', $user->office);
                $this->session->set_userdata('avatar', $user->my_img);
                if ($user->type <> "Super Admin") {
                    redirect(''); // Redirect to a protected page
                } else {
                    redirect('admin'); // Redirect to a protected page
                }

            } else {
                // Invalid login, reload the login view with an error message
                $this->session->set_flashdata('error', 'Invalid username or password');
                redirect('login');
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');
        redirect('/login');
    }
}
