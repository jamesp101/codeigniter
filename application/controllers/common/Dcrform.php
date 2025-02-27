<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DcrForm extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dcrform_model');
        $this->load->model('User_model');
        $this->load->model('Department_model');
        $this->load->model('Office_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->check_role(['Requester', 'Department Head', 'Super Admin', 'Document Controller', 'Director for QAIE']);
    }

    public function index() {
        $data['departments'] = $this->Department_model->get_departments();
        $data['offices'] = $this->Office_model->get_offices();
        $this->load->view('users/dcrform_view', $data);
    }


    public function list() {
        // Load necessary libraries and helpers
        $this->load->database();
        // $this->load->library('session');
        $this->load->helper('url');

        // Get the session data
        $officeSession = $this->session->userdata('office');

        // Query the database
        $this->db->where('From_Office', $officeSession);
        $query = $this->db->get('qaiedirector_dcrform');
        $data['office'] = $officeSession;
        $data['dcr_list'] = $query->result_array();

        // Load the view and pass the data
        $this->load->view('users/dcrform_list', $data);
    }

    public function submit() {
            $year_generated = date("Y");
            $status_requester = "Already Sent to Department Head";
            $date_of_request = date("m/d/Y");
            $to_who = "Document Controller";
            $from_office = $this->input->post('From_Office_Brkt');
            $type_of_request = $this->input->post('Type_Of_Request_Brkt');
            $document_no = $this->input->post('Document_No_Brkt');
            $document_title = $this->input->post('Document_Title_Brkt');
            $revision_status = $this->input->post('Revision_Status_Brkt');
            $changes_requested = $this->input->post('Changes_Requested_Brkt');
            $reason_for_the_change = $this->input->post('Reason_For_The_Change_Brkt');
            $new_document_no = $this->input->post('New_Document_No_Brkt');
            $new_document_version = $this->input->post('New_Document_Version_Brkt');
            $new_document_revision = $this->input->post('New_Document_Revision_Brkt');
            $random_unique_code = md5(uniqid(rand(), true));
            $user_id = $this->session->userdata('user_id');
            $username_LOG = $this->session->userdata('username');
            $date = date("Y-m-d H:i:s");

            // TODO: fix storing of user id and session and use of it
            // Handle File Upload
            $config['upload_path'] = './files/' . $this->session->userdata('user_id');
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = 300000;
            $this->load->helper('string');
            // TODO: fix random file name generation
            $config['file_name'] = random_string('alnum', 15) .'.pdf';

            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, true);
            }

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {
                $fileData = $this->upload->data();
                $file_name = $fileData['file_name'];
                $file_type = $fileData['file_type'];

                // TODO: fix Requested_By is required
                // Insert into qaiedirector_dcrform
                $this->Dcrform_model->insert_dcr_form(array(
                    'Year_Generated' => $year_generated,
                    'Status_Requester' => $status_requester,
                    'Date_Of_Request' => $date_of_request,
                    'To_Who' => $to_who,
                    'From_Office' => $from_office,
                    'Type_Of_Request' => $type_of_request,
                    'Document_No' => $document_no,
                    'Document_Title' => $document_title,
                    'Revision_Status' => $revision_status,
                    'Changes_Requested' => $changes_requested,
                    'Reason_For_The_Change' => $reason_for_the_change,
                    'Requested_By' => $this->session->userdata('username'),
                    'New_Document_No' => $new_document_no,
                    'New_Document_Version' => $new_document_version,
                    'New_Document_Revision' => $new_document_revision,
                    'date_uploaded_dttbl' => $date,
                    'Random_Unique_Code' => $random_unique_code,
                    'User_ID' => $user_id
                ));

                // Insert into storage
                $this->Dcrform_model->insert_storage(array(
                    'random_unique_code' => $random_unique_code,
                    'file_name' => $file_name,
                    'file_type' => $file_type,
                    'date_uploaded' => $date,
                    'user_id' => $user_id
                ));

                // Insert into logs
                $this->Dcrform_model->insert_log(array(
                    'Action_Made' => 'Submitted Document Change Request Form',
                    'Username' => $username_LOG,
                    'User_Type' => 'Requester'
                ));

                $this->session->set_flashdata('success', 'The document change request form has been successfully submitted to the department head.');
            }
             else {
                $this->session->set_flashdata('error', 'Error submitting information. Please upload a PDF File only for draft copy, or contact dev for more info.');
            }

            redirect('dcrform');
    }

    public function update_dcr_form() {
        try {
            $user = $this->User_model->get_user( $this->session->userdata('user_id'));
            $data = array(
                'Status_DeptHead' => 'Already Sent to Document Controller',
                'ESignature_DeptHead' => $user['e_signature'],
                'Name_Of_Approving_Authority' => $this->input->post('Name_Of_Approving_Authority_Brkt'),
                'Date_Of_Approval' => date('m/d/Y'), // Sets the current date
                'User_ID' => $this->session->userdata('user_id'),
            );

            $this->Dcrform_model->update_dcr_form($this->input->post('Random_Unique_Code_Brkt'), $data);
            $this->session->set_flashdata('success', 'The document change request form has been successfully updated.');
            redirect('dcrform/list');
        }
        catch (Exception $e) {
            $this->session->set_flashdata('error', $e);
        }
    }

    public function view_pdf($random_unique_code = null) {
        if ($random_unique_code) {
            // Fetch the record from the storage table
            $query = $this->db->get_where('storage', array('random_unique_code' => $random_unique_code));
            $fetch_storage = $query->row_array();

            if ($fetch_storage) {
                $file_name = $fetch_storage['file_name'];
                $user_id = $fetch_storage['user_id'];
                $file_path = FCPATH . "files/{$user_id}/{$file_name}";

                if (file_exists($file_path)) {
                    header('Content-type: application/pdf');
                    header('Content-Disposition: inline; filename="' . $file_name . '"');
                    header('Content-Transfer-Encoding: binary');
                    header('Accept-Ranges: bytes');
                    readfile($file_path);
                } else {
                    show_error('The requested file does not exist.', 404, 'File Not Found');
                }
            } else {
                show_error('Invalid request. The specified file could not be found.', 404, 'File Not Found');
            }
        } else {
            show_error('No file specified.', 400, 'Bad Request');
        }
    }

    public function getOffices() {
        $departmentName = $this->input->post('departmentName');
        $offices = $this->Dcrform_model->get_offices($departmentName);
        // echo json_encode($offices);
        echo $offices->result_array();
    }

    public function generate_pdf($random_unique_code) {
        // Load required libraries, helpers, and models
        $this->load->helper('dompdf_helper'); // Assume you have created this helper for Dompdf
        $this->load->model('Dcrform_model');
        $this->load->helper('url');

        // Fetch data from the model
        $data['dcr_data'] = $this->Dcrform_model->get_dcr_data($random_unique_code);

        // Generate the PDF
        $html = $this->load->view('common/pdf_template', $data, true); // Load the view file
        pdf_create($html, 'DCR_' . $random_unique_code,false); // pdf_create() is from your dompdf_helper
    }


    public function update_dcrform_docucontroller($random_unique_code) {
        $data = array(
            'Status_DocuController' => $this->input->post('Status_DocuController'),
            'DocuController_Comments' => $this->input->post('DocuController_Comments'),
        );
        if ($this->input->post('Status_DocuController') === 'Revision needed, returned to Requester') {
            $data['Status_Requester'] = 'Revisions Requested';
        }
        $this->db->where('Random_Unique_Code', $random_unique_code);
        $this->db->update('qaiedirector_dcrform', $data);
        redirect('dcrform/list');
    }

    public function update_dcrform_qaie_director($random_unique_code) {
        $user = $this->User_model->get_user( $this->session->userdata('user_id'));
        $data = array(
            'Request_Status' => $this->input->post('Request_Status_Brkt'),
            'QAIE_Directors_Comments' => $this->input->post('QAIE_Directors_Comments_Brkt'),
            'Name_Of_QAIE_Director' => $this->input->post('Name_Of_QAIE_Director_Brkt'),
            'Date_Of_QAIE_Director_Action'=> $this->input->post('Date_Of_QAIE_Director_Action_Brkt'),
            'User_ID' => $this->session->userdata('user_id'),
            'ESignature_DoQ' => $user['e_signature'],
        );

        $this->db->where('Random_Unique_Code', $random_unique_code);
        $this->db->update('qaiedirector_dcrform', $data);
        redirect('dcrform/list');
    }

    public function insert_log() {
        $log_data = array(
            'Action_Made' => 'Submitted Document Change Request Form',
            'Username' => $this->session->userdata('username'),
            'User_Type' => 'Document Controller'
        );
        return $this->db->insert('y6_dcrforms_logs', $log_data);
    }

    public function edit_view_form() {
        $this->load->model('Dcrform_model');
        $content_data['records'] = $this->Dcrform_model->get_all_descriptions();
        $data['content'] = $this->load->view('common/pdf_new_template', $content_data, TRUE);
        $this->load->view('common/template/page', $data);
    }

}