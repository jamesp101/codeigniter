<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verify extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model'); // Load the User model
    }

    // Accept the vkey as a parameter (slug) from the URL
    public function index($vkey = null) {
        // Check if the vkey is provided
        if ($vkey) {
            // Sanitize the vkey
            $vkey = $this->security->xss_clean($vkey);

            // Check if the vkey exists and is unverified
            $user = $this->User_model->get_unverified_user($vkey);

            if ($user) {
                // If the user is found, verify the user
                $verified = $this->User_model->verify_user($vkey);

                if ($verified) {
                    $this->session->set_flashdata('message', 'Your account is now verified. You may now login.');
                } else {
                    $this->session->set_flashdata('error', 'An error occurred during verification.');
                }
            } else {
                $this->session->set_flashdata('error', 'This account is invalid or already verified.');
            }

            // Redirect to home or login page
            redirect('welcome');
        } else {
            // Show an error if the vkey is missing
            show_error('Invalid request.');
        }
    }
}
