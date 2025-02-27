<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Emanuals extends MY_Controller {

    public function __construct() {
        parent::__construct();
        // Load the database and any necessary models or helpers
        $this->load->database();
        $this->load->model('Emanual_model');
        $this->load->model('Folder_model');
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('form');
        $this->load->library('session');

        $this->check_login();
    }

    public function index() {
        $this->db->from('storage_emanuals');
        $data["emanuals"] = $this->db->get()->result_array();
        $data['emanual_types'] = $this->Emanual_model->get_emanual_types();
        $this->load->view('users/emanual_files', $data);
    }

    public function view_folder_files($folder_id) {
        $this->db->select('storage_emanuals.*');
        $this->db->from('storage_emanuals');
        $this->db->join('folder_access', 'folder_access.folder_id = storage_emanuals.folder_id');
        $this->db->where('folder_access.folder_id', $folder_id);
        $data["emanuals"] = $this->db->get()->result_array();
        $data['emanual_types'] = $this->Emanual_model->get_emanual_types();
        $data["folder_id"] = $folder_id;
        $this->load->view('users/emanual_files', $data);
    }

    public function view_manual($file_id) {
        // Check if file ID is provided
        if(isset($file_id)) {
            // Query to fetch the file details from the database
            $this->db->where('File_ID', $file_id);
            $query = $this->db->get('storage_emanuals');

            if ($query->num_rows() > 0) {
                $file_data = $query->row();
                $file_name = $file_data->File_Name;
                $user_id = $file_data->User_ID;

                // Construct the correct file path
                $file_path = FCPATH . 'files_emanuals/' . $user_id . '/' . $file_name;
                ob_start(); // Start output buffering
                // Check if the file exists
                if (file_exists($file_path)) {
                    header('Content-Type: application/pdf');
                    header('Content-Disposition: inline; filename="' . $file_name . '"');
                    header('Content-Transfer-Encoding: binary');
                    header('Accept-Ranges: bytes');

                    // Output the file
                    @readfile($file_path);
                    // readfile($file_path);
                } else {
                    log_message('error', 'File does not exist at path: ' . $file_path);
                    show_404();
                }
                ob_end_flush(); // End output buffering
            } else {
                // Handle the case where no file is found
                show_404();
            }
        } else {
            // Handle the case where no file ID is provided
            show_404();
        }
    }


    public function upload_emanual() {
        // Handle file upload and form data here
        $config['upload_path'] = './files_emanuals/'. $this->session->userdata('user_id') .'/';
        $config['allowed_types'] = 'pdf|docx|txt';
        $config['max_size'] = 2000; // Set max file size (in KB)

        $this->load->library('upload', $config);
        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, true);
        }

        if (!$this->upload->do_upload('file')) {
            $data['error'] = $this->upload->display_errors();
            $this->session->set_flashdata('error', $data['error']);
            redirect('emanuals/list');
        } else {
            $upload_data = $this->upload->data();
            $emanual_data = array(
                'File_Title' => $this->input->post('File_Title_Brkt'),
                'File_Type' => "application/pdf",
                'Emanual_Type' => $this->input->post('emanualtype'),
                'File_Name' => $upload_data['file_name'],
                'User_ID' => $this->session->userdata('user_id'),
                'Date_Uploaded'=> date("Y-m-d H:i:s")
            );

            $this->Emanual_model->insert_emanual($emanual_data);
            redirect('emanuals/list');
        }
    }

    public function delete_emanual($file_id) {
        try {
            $this->Emanual_model->delete_emanual($file_id);
            $this->session->set_flashdata('success','Emanual '.$file_id. ' has been deleted.');
        } catch (\Throwable $th) {
            $this->session->set_flashdata('error','Error deleting '.$file_id);
        }
        redirect('emanuals/list');
    }
}
