<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends MY_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Department_model');
        $this->load->model('Office_model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->library('form_validation');
        $this->load->library('upload'); // Load upload library
        $this->load->library('session');

        // Load the custom email library
        $this->load->library('Email_library');
    }

    public function index($role)
    {
        $this->check_role(['Super Admin', 'Administrator']);
        $content_data['users'] = $this->User_model->get_users_by_role(urldecode($role));
        $content_data['departments'] = $this->Department_model->get_departments_array();
        $content_data['offices'] = $this->Office_model->get_offices_array();
        $content_data['role'] = urldecode($role);
        // Load a view and pass the data
        // $this->load->view('admin/users', $data);

        // Load view
        $data['content'] = $this->load->view('admin/users', $content_data, TRUE);
        // Load the view and pass the data
        $this->load->view('admin/template/page', $data);
    }

    public function view($id)
    {
        $this->check_role(['Super Admin', 'Administrator']);
        $data['user'] = $this->User_model->get_user($id);

        if ($data['user']) {
            // Load a view and pass the data
            $this->load->view('users/view', $data);
        } else {
            show_404();
        }
    }

    public function create()
    {
        $this->check_role(['Super Admin', 'Administrator']);
        // If the form is submitted
        if ($this->input->post()) {
            // Set validation rules
            $this->form_validation->set_rules(
                'firstname', // Field name
                'First Name', // Label
                'required|regex_match[/^[a-zA-Z ]{2,50}$/]', // Validation rules
                array(
                    'required' => 'The %s field is required.', // Custom error message for 'required'
                    'regex_match' => 'The %s field must contain only alphabetic characters and spaces, and be 2-50 characters long.' // Custom error for regex
                )
            );
            $this->form_validation->set_rules(
                'lastname',
                'Last Name',
                'required|regex_match[/^[a-zA-Z ]{2,50}$/]', // Validation rules
                array(
                    'required' => 'The %s field is required.', // Custom error message for 'required'
                    'regex_match' => 'The %s field must contain only alphabetic characters and spaces, and be 2-50 characters long.' // Custom error for regex
                )
            );
            $this->form_validation->set_rules(
                'username',
                'Username',
                'required|regex_match[/^(?=.*[a-zA-Z])[a-zA-Z0-9.]{6,30}$/]', // Validation rules
                array(
                    'required' => 'The %s field is required.',
                    'regex_match' => 'The %s must be 6 to 30 characters long, contain at least one letter, and may only include letters, numbers, and periods.' // Custom error for regex
                )
            );
            $this->form_validation->set_rules('department', 'Department', 'required');
            $this->form_validation->set_rules('office', 'Office', 'required');
            $this->form_validation->set_rules('type', 'Type', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required');
            $this->form_validation->set_rules('email_address', 'Email', 'required|valid_email');

            if ($this->form_validation->run() === FALSE) {
                // Validation failed, reload form with errors
                // redirect('admin/user');
                $response = array(
                    'status' => 'error',
                    'errors' => validation_errors() // Get all validation errors
                );
                echo json_encode($response);
                //
            } else {
                // Validation succeeded, insert the data
                $office_input = $this->input->post('office');

                // Split the office input value into ID and Name using the delimiter (|)
                list($office_id, $office_name) = explode('|', $office_input);

                // Prepare the data for insertion
                $data = array(
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'username' => $this->input->post('username'),
                    'department' => $this->input->post('department'),
                    'office' => $office_name,  // Store the office name
                    'office_id' => $office_id, // Store the office ID
                    'type' => $this->input->post('type'),
                    'e_manual_viewing' => $this->input->post('e_manual_viewing'),
                    'password' => do_hash($this->input->post('password'), 'md5'),
                    'email_add' => $this->input->post('email_address'),
                    'verification_status' => 'UNVERIFIED'
                );
                echo json_encode($data);
                $user_id = $this->User_model->insert_user($data);

                if ($this->email_library->send_verification_email($this->input->post('email_address'), $user_id)) {
                    $response = array(
                        'status' => 'success',
                        'message' => 'User created successfully, and verification email sent!' // Get all validation errors
                    );
                    // $this->session->set_flashdata('success', $response['message']);
                } else {
                    $response = array(
                        'status' => 'error',
                        'errors' => 'There was an error creating the user.' // Get all validation errors
                    );
                }
                echo json_encode($response);
            }
        } else {
            // Show the form
            redirect('admin/user');
        }
    }

    public function update($id)
    {
        $this->check_role(['Super Admin', 'Administrator']);
        $data['user'] = $this->User_model->get_user($id);

        if ($this->input->post()) {
            // Set validation rules if needed
            $this->form_validation->set_rules('firstname', 'First Name', 'required');
            $this->form_validation->set_rules('lastname', 'Last Name', 'required');
            $this->form_validation->set_rules('email_add', 'Email', 'required|valid_email');

            if ($this->form_validation->run() === FALSE) {
                // Validation failed, reload form with errors
                $this->load->view('users/update', $data);
            } else {
                // Validation passed, update the data
                $update_data = array(
                    'firstname' => $this->input->post('firstname'),
                    'lastname' => $this->input->post('lastname'),
                    'email_add' => $this->input->post('email_add'),
                );

                if ($this->input->post('password')) {
                    $update_data['password'] = do_hash($this->input->post('password'), 'md5');
                }

                $this->User_model->update_user($id, $update_data);
                redirect('admin/users');
            }
        } else {
            // Load the form with existing data
            redirect('users/update', $data);
        }
    }

    public function delete($id)
    {
        $this->check_role(['Super Admin', 'Administrator']);
        $this->User_model->delete_user($id);
        $this->session->set_flashdata('success', `User $id deleted successfully!`);
        if (isset($_SERVER['HTTP_REFERER'])) {
            // Redirect to the previous page
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            // Fallback: Redirect to a default page if no referrer is available
            header("Location: /default-page.php");
            exit;
        }
    }
    public function profile($user_id = null)
    {
        $this->check_login();
        // Check if user_id is provided
        if (empty($user_id)) {
            // Fetch current user data from session
            $user_id = $this->session->userdata('user_id');
        }
        $user = $this->User_model->get_user($user_id);

        $data['content'] = $this->load->view('users/profile', ['user' => $user], TRUE);
        // Load the view and pass user data
        if (in_array($this->session->userdata('role'), ['Administrator', 'Super Admin'])) {
            $this->load->view('admin/template/page', $data);
        } else {
            $this->load->view('common/template/page', $data);
        }
    }




    // firstname
    public function update_first_name($id)
    {
        // Check if form is submitted
        if (!empty($this->input->post('first_name'))) {
            $this->form_validation->set_rules(
                'first_name', // Field name
                'First Name', // Label
                'required|regex_match[/^[a-zA-Z ]{2,50}$/]', // Validation rules
                array(
                    'required' => 'The %s field is required.', // Custom error message for 'required'
                    'regex_match' => 'The %s field must contain only alphabetic characters and spaces, and be 2-50 characters long.' // Custom error for regex
                )
            );
            // $data['user'] = $this->User_model->get_user($id);
            if ($this->form_validation->run() === FALSE) {
                $response = array(
                    'status' => 'error',
                    'message' => validation_errors() // Get all validation errors
                );
            } else {
                // Validation passed, update the data
                $update_data = array(
                    'firstname' => $this->input->post('first_name', TRUE),
                );
                $this->User_model->update_user($id, $update_data);

                $response = array(
                    'status' => 'success',
                    'message' => 'User created successfully, and verification email sent!' // Get all validation errors
                );
            }
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
        }
    }

    // lastname
    public function update_last_name($id)
    {
        // Check if form is submitted
        if (!empty($this->input->post('last_name'))) {
            $this->form_validation->set_rules(
                'last_name', // Field name
                'Last Name', // Label
                'required|regex_match[/^[a-zA-Z ]{2,50}$/]', // Validation rules
                array(
                    'required' => 'The %s field is required.', // Custom error message for 'required'
                    'regex_match' => 'The %s field must contain only alphabetic characters and spaces, and be 2-50 characters long.' // Custom error for regex
                )
            );
            // $data['user'] = $this->User_model->get_user($id);
            if ($this->form_validation->run() === FALSE) {
                $response = array(
                    'status' => 'error',
                    'message' => validation_errors() // Get all validation errors
                );
            } else {
                // Validation passed, update the data
                $update_data = array(
                    'lastname' => $this->input->post('last_name', TRUE),
                );
                $this->User_model->update_user($id, $update_data);

                $response = array(
                    'status' => 'success',
                    'message' => 'User created successfully, and verification email sent!' // Get all validation errors
                );
            }
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
        }
    }


    // username
    public function update_username($id)
    {
        // Check if form is submitted
        if (!empty($this->input->post('username'))) {
            $this->form_validation->set_rules(
                'username',
                'Username',
                'required|regex_match[/^(?=.*[a-zA-Z])[a-zA-Z0-9.]{6,30}$/]', // Validation rules
                array(
                    'required' => 'The %s field is required.',
                    'regex_match' => 'The %s must be 6 to 30 characters long, contain at least one letter, and may only include letters, numbers, and periods.' // Custom error for regex
                )
            );
            // $data['user'] = $this->User_model->get_user($id);
            if ($this->form_validation->run() === FALSE) {
                $response = array(
                    'status' => 'error',
                    'message' => validation_errors() // Get all validation errors
                );
            } else {
                // Validation passed, update the data
                $update_data = array(
                    'username' => $this->input->post('username', TRUE),
                );
                $this->User_model->update_user($id, $update_data);

                $response = array(
                    'status' => 'success',
                    'message' => 'Username updated successfully!' // Get all validation errors
                );
            }
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
        }
    }

    // password
    public function update_password($id)
    {
        // Check if form is submitted
        if (!empty($this->input->post('password'))) {
            $this->form_validation->set_rules(
                'password', // Field name
                'Password', // Label
                'required|regex_match[/^[a-zA-Z ]{2,50}$/]', // Validation rules
                array(
                    'required' => 'The %s field is required.', // Custom error message for 'required'
                    'regex_match' => 'The %s field must contain only alphabetic characters and spaces, and be 2-50 characters long.' // Custom error for regex
                )
            );
            // $data['user'] = $this->User_model->get_user($id);
            if ($this->form_validation->run() === FALSE) {
                $response = array(
                    'status' => 'error',
                    'message' => validation_errors() // Get all validation errors
                );
            } else {
                // Validation passed, update the data
                $update_data = array(
                    'password' => do_hash($this->input->post('password', TRUE), 'md5'),
                );
                $this->User_model->update_user($id, $update_data);

                $response = array(
                    'status' => 'success',
                    'message' => 'Password updated successfully!' // Get all validation errors
                );
            }
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
        }
    }

    // email
    public function update_email($id)
    {
        // Check if form is submitted
        if (!empty($this->input->post('email'))) {
            $this->form_validation->set_rules(
                'email', // Field name
                'Email', // Label
                'required', //|regex_match[/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/]', // Validation rules
                array(
                    'required' => 'The %s field is required.', // Custom error message for 'required'
                    'regex_match' => 'The %s field must be valid.' // Custom error for regex
                )
            );
            // $data['user'] = $this->User_model->get_user($id);
            if ($this->form_validation->run() === FALSE) {
                $response = array(
                    'status' => 'error',
                    'message' => validation_errors() // Get all validation errors
                );
            } else {
                // Validation passed, update the data
                $update_data = array(
                    'email_add' => $this->input->post('email'),
                    'verification_status' => 'UNVERIFIED'
                );
                $this->User_model->update_user($id, $update_data);


                if ($this->email_library->send_verification_email($this->input->post('email'), $id)) {
                    $response = array(
                        'status' => 'success',
                        'message' => 'User email updated successfully, and verification email sent!' // Get all validation errors
                    );
                } else {
                    $response = array(
                        'status' => 'error',
                        'errors' => 'There was an error updating the user email.' // Get all validation errors
                    );
                }
            }
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($response));
        }
    }


    public function update_profile_picture()
    {
        $user_id = $this->input->post('user_id');

        // Set upload configuration
        $config['upload_path'] = './profile_settings/profile_image/' . $user_id; // Set upload path
        $config['allowed_types'] = 'bmp|jpeg|jpg|png'; // Allowed file types
        $config['max_size'] = 500; // Max size in KB
        $config['file_name'] = md5(rand()); // Rename file

        // Create user directory if it doesn't exist
        if (!file_exists($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, true);
        }

        $this->upload->initialize($config);
        $previous_page = $this->input->server('HTTP_REFERER');
        if ($this->upload->do_upload('Profile_Picture_Brkt')) {
            // Upload successful, get file data
            $upload_data = $this->upload->data();
            $imagerename = $upload_data['file_name'];

            $update_data = array(
                'my_img' => $imagerename
            );
            $this->User_model->update_user($user_id, $update_data);

            // Success message and redirect
            $this->session->set_flashdata('message', 'Your profile picture has been successfully updated!');
            redirect($previous_page); // Adjust the redirect URL as necessary
        } else {
            // Upload failed, show error
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect($previous_page); // Adjust the redirect URL as necessary
        }
    }

    public function update_esignature()
    {
        $user_id = $this->input->post('user_id');

        // Set upload configuration
        $config['upload_path'] = './profile_settings/e_signature'; // Set upload path
        $config['allowed_types'] = 'bmp|jpeg|jpg|png'; // Allowed file types
        $config['max_size'] = 5000; // Max size in KB
        $config['file_name'] = md5(rand()); // Rename file

        // Create user directory if it doesn't exist
        if (!file_exists($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, true);
        }

        $this->upload->initialize($config);
        $previous_page = $this->input->server('HTTP_REFERER');
        if ($this->upload->do_upload('E_Signature_Brkt')) {
            // Upload successful, get file data
            $upload_data = $this->upload->data();
            $imagerename = $upload_data['file_name'];

            $update_data = array(
                'e_signature' => $imagerename
            );
            $this->User_model->update_user($user_id, $update_data);

            // Success message and redirect
            $this->session->set_flashdata('message', 'Your E-Signature been successfully updated!');
            redirect($previous_page); // Adjust the redirect URL as necessary
        } else {
            // Upload failed, show error
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect($previous_page); // Adjust the redirect URL as necessary
        }
    }
}
