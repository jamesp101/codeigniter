<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeNeaController extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(['url', 'form', 'html']);
        $this->load->library(['form_validation', 'upload']);
        
    }

    // List all NEA records
    public function index() {
        $data['neas'] = $this->db->get('home_nea_datatable')->result_array();
        $this->load->view('users/nea_list', $data);
    }

    // Create a new NEA record
    public function create() {
        $this->form_validation->set_rules('Category', 'Category', 'required');
        $this->form_validation->set_rules('NEA_Title', 'NEA Title', 'required');
        $this->form_validation->set_rules('NEA_Description', 'NEA Description', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('users/nea_list');
        } else {
            $config['upload_path'] = './nea_files/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048;
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('NEA_Image')) {
                $data['error'] = $this->upload->display_errors();
                // $this->load->view('users/nea_list', $data);
                echo $this->upload->display_errors();
                redirect('/news_and_events');
            } else {
                $upload_data = $this->upload->data();
                $data = [
                    'NEA_Image' => $upload_data['file_name'],
                    'Category' => $this->input->post('Category'),
                    'NEA_Title' => $this->input->post('NEA_Title'),
                    'NEA_Description' => $this->input->post('NEA_Description'),
                    'Date_Uploaded' => date('Y-m-d H:i:s'),
                    'date_uploaded_nea' => date('Y-m-d H:i:s')
                ];
                $this->db->insert('home_nea_datatable', $data);
                redirect('/news_and_events');
            }
        }
    }

    // Edit an existing NEA record
    public function edit($id) {
        $data['nea'] = $this->db->get_where('home_nea_datatable', ['ID_NEA' => $id])->row_array();

        if (!$data['nea']) {
            show_404();
        }

        $this->form_validation->set_rules('Category', 'Category', 'required');
        $this->form_validation->set_rules('NEA_Title', 'NEA Title', 'required');
        $this->form_validation->set_rules('NEA_Description', 'NEA Description', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('nea_edit', $data);
        } else {
            $config['upload_path'] = './uploads/nea_images/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048;
            $this->upload->initialize($config);

            $update_data = [
                'Category' => $this->input->post('Category'),
                'NEA_Title' => $this->input->post('NEA_Title'),
                'NEA_Description' => $this->input->post('NEA_Description'),
            ];

            if ($this->upload->do_upload('NEA_Image')) {
                $upload_data = $this->upload->data();
                $update_data['NEA_Image'] = $upload_data['file_name'];
            }

            $this->db->update('home_nea_datatable', $update_data, ['ID_NEA' => $id]);
            redirect('news_and_events');
        }
    }

    // Delete an NEA record
    public function delete($id) {
        $this->db->delete('home_nea_datatable', ['ID_NEA' => $id]);
        redirect('news_and_events');
    }
}
