<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auditee_afsform extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Auditee_afsform_model');
        $this->load->model('Auditor_model');
        $this->load->model('Department_model');
        $this->load->model('Office_model');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    // Display all records
    public function index() {
        $data['auditors'] = $this->Auditor_model->get_auditors();
        $data['departments'] = $this->Department_model->get_departments_array();
        $data['offices'] = $this->Office_model->get_offices_array();
        // $this->load->view('auditee_afsform/index', $data);

        $this->load->view('users/audit_feedback_survey', $data);
    }

    // Create new record
    public function create() {
        $this->form_validation->set_rules('Name_Of_Auditor', 'Name Of Auditor', 'required');
        $this->form_validation->set_rules('Name_Of_Auditee', 'Name Of Auditee', 'required');
        // Add more validation rules as needed

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('users/audit_feedback_survey');
        } else {
            $data = array(
                'AFSForm_ID' => $this->input->post('AFSForm_ID'),
                'Name_Of_Auditor' => $this->input->post('Name_Of_Auditor'),
                'Name_Of_Auditee' => $this->input->post('Name_Of_Auditee'),
                'Date_Accomplished' => $this->input->post('Date_Accomplished'),
                'Department' => $this->input->post('Department'),
                'Office' => $this->input->post('Office'),
                'Question_1A' => $this->input->post('Question_1A'),
                'Remarks_1A' => $this->input->post('Remarks_1A'),
                'Question_2A' => $this->input->post('Question_2A'),
                'Remarks_2A' => $this->input->post('Remarks_2A'),
                'Question_3A' => $this->input->post('Question_3A'),
                'Remarks_3A' => $this->input->post('Remarks_3A'),
                'Question_4A' => $this->input->post('Question_4A'),
                'Remarks_4A' => $this->input->post('Remarks_4A'),
                'Question_5A' => $this->input->post('Question_5A'),
                'Remarks_5A' => $this->input->post('Remarks_5A'),
                'Question_1B' => $this->input->post('Question_1B'),
                'Remarks_1B' => $this->input->post('Remarks_1B'),
                'Question_2B' => $this->input->post('Question_2B'),
                'Remarks_2B' => $this->input->post('Remarks_2B'),
                'Question_3B' => $this->input->post('Question_3B'),
                'Remarks_3B' => $this->input->post('Remarks_3B'),
                'Question_4B' => $this->input->post('Question_4B'),
                'Remarks_4B' => $this->input->post('Remarks_4B'),
                'Question_5B' => $this->input->post('Question_5B'),
                'Remarks_5B' => $this->input->post('Remarks_5B'),
                'Question_1C' => $this->input->post('Question_1C'),
                'Remarks_1C' => $this->input->post('Remarks_1C'),
                'Question_2C' => $this->input->post('Question_2C'),
                'Remarks_2C' => $this->input->post('Remarks_2C'),
                'Question_3C' => $this->input->post('Question_3C'),
                'Remarks_3C' => $this->input->post('Remarks_3C'),
                'Question_4C' => $this->input->post('Question_4C'),
                'Remarks_4C' => $this->input->post('Remarks_4C'),
                'Question_5C' => $this->input->post('Question_5C'),
                'Remarks_5C' => $this->input->post('Remarks_5C'),
                'Question_1D' => $this->input->post('Question_1D'),
                'Remarks_1D' => $this->input->post('Remarks_1D'),
                'Question_2D' => $this->input->post('Question_2D'),
                'Remarks_2D' => $this->input->post('Remarks_2D'),
                'Question_3D' => $this->input->post('Question_3D'),
                'Remarks_3D' => $this->input->post('Remarks_3D'),
                'Question_4D' => $this->input->post('Question_4D'),
                'Remarks_4D' => $this->input->post('Remarks_4D'),
                'Question_5D' => $this->input->post('Question_5D'),
                'Remarks_5D' => $this->input->post('Remarks_5D'),
                'Comments_Suggestions' => $this->input->post('Comments_Suggestions'),
                // 'date_uploaded_dttbl' => $this->input->post('date_uploaded_dttbl'),
                // 'User_ID' => $this->input->post('User_ID')
            );

            $this->Auditee_afsform_model->insert_auditee_afsform($data);
            redirect('requester/auditee_afsform');
        }
    }

    // Edit a record
    public function edit($id) {
        $data['auditee_afsform'] = $this->Auditee_afsform_model->get_auditee_afsform_by_id($id);

        $this->form_validation->set_rules('Name_Of_Auditor', 'Name Of Auditor', 'required');
        $this->form_validation->set_rules('Name_Of_Auditee', 'Name Of Auditee', 'required');
        // Add more validation rules as needed

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('auditee_afsform/edit', $data);
        } else {
            $update_data = array(
                'Name_Of_Auditor' => $this->input->post('Name_Of_Auditor'),
                'Name_Of_Auditee' => $this->input->post('Name_Of_Auditee'),
                'Date_Accomplished' => $this->input->post('Date_Accomplished'),
                'Department' => $this->input->post('Department'),
                'Office' => $this->input->post('Office'),
                // Add more fields here
            );

            $this->Auditee_afsform_model->update_auditee_afsform($id, $update_data);
            redirect('auditee_afsform');
        }
    }

    // Delete a record
    public function delete($id) {
        $this->Auditee_afsform_model->delete_auditee_afsform($id);
        redirect('auditee_afsform');
    }
}
