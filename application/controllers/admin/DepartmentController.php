<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DepartmentController extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Department_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->check_role(['Super Admin', 'Administrator']); // Only allow access to admins, still to be added
    }

    public function index() {
        // Load the admin dashboard view, still to be added
        $content_data['departments'] = $this->Department_model->get_departments();
        
        $data['content'] = $this->load->view('admin/department_offices/departments',  $content_data, TRUE);
        $this->load->view('admin/template/page', $data);
    }

    public function create() {
        $this->form_validation->set_rules('Department_Name', 'Department Name', 'required');

        $department_name = $this->input->post('Department_Name');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/department');
        } else {
            $data = array(
                'Department_Name' => $this->input->post('Department_Name')
            );
            $this->Department_model->insert_department($data);
            redirect('admin/department');
        }
    }

    public function edit($id) {
        $data['department'] = $this->Department_model->get_department($id);

        if (empty($data['department'])) {
            show_404();
        }

        $this->form_validation->set_rules('Department_Name', 'Department Name', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('department/edit', $data);
        } else {
            $data = array(
                'Department_Name' => $this->input->post('Department_Name'),
            );
            $this->Department_model->update_department($id, $data);
            redirect('admin/department');
        }
    }

    // Delete a department
    public function delete($id) {
        $this->Department_model->delete_department($id);
        redirect('admin/department');
    }
}
?>