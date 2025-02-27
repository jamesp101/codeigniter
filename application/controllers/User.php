<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index() {
        $data['users'] = $this->User_model->get_users();
        $this->load->view('user_list', $data);
    }

    // public function add_user() {
    //     $data = array(
    //         'name' => $this->input->post('name'),
    //         'email' => $this->input->post('email')
    //     );
    //     $this->User_model->insert_user($data);
    //     redirect('user');
    // }

    // public function edit_user($id) {
    //     $data = array(
    //         'name' => $this->input->post('name'),
    //         'email' => $this->input->post('email')
    //     );
    //     $this->User_model->update_user($id, $data);
    //     redirect('user');
    // }

    // public function delete_user($id) {
    //     $this->User_model->delete_user($id);
    //     redirect('user');
    // }
}
?>