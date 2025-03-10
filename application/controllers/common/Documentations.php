<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Documentations extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		// Load the database and any necessary models or helpers
		$this->load->database();
		$this->load->model('Documentation_model');
		$this->load->model('Folder_model');
		$this->load->helper('url');
		$this->load->helper('file');
		$this->load->helper('form');
		$this->load->library('session');

		$this->check_login();
	}

	public function index()
	{
		$session_role = $this->session->userdata('role');
		$session_office = $this->session->userdata('office');


		$result = $this->db
			->from('folders')
			->select('folders.*, GROUP_CONCAT(z_office.Office_Name) AS access_list')
			->join('folder_access', 'folders.id = folder_access.folder_id', 'left')
			->join('z_office', 'folder_access.ID_Office = z_office.ID_Office', 'left')
			->group_by('folders.id')
			->where('parent_id', NULL)
			->get()
			->result_array();



		$data['folders'] = array_map(function ($row) use ($session_office) {

			return [
				'id' => $row['id'],
				'name' => $row['name'],
				'created_at' => $row['created_at'],
				'access' => $row['access_list']
					? explode(',', $row['access_list'])
					: []

			];
		}, $result);

		$data['folders'] = array_filter(
			$data['folders'],
			function ($row) use ($session_office, $session_role) {
				$special_access = ['Document Controller', 'Director for QAIE', 'QAIE Managment'];

				$has_access = in_array($session_office, $row['access']);
				$has_special_access = in_array($session_role, $special_access);

				return $has_access || $has_special_access;
			}
		);



		$this->load->view('users/documentation_folders', $data);
	}

	public function create_folder()
	{
		$user_role = $this->session->userdata('role');
		if ($user_role === 'Document Controller') {
			$folder_name = $this->input->post('folder_name');
			$office_ids = $this->input->post('office_ids'); // An array of selected office IDs

			$data = [
				'name' => $folder_name,
				'created_at' => date('Y-m-d H:i:s')
			];
			$this->Folder_model->create_folder($data, $office_ids);
			$this->session->set_flashdata('success', `${folder_name} folder created successfully.`);
		} else {
			$this->session->set_flashdata('error', `Access denied.`);
		}
		redirect('documentations');
	}

	public function create_subfolder()
	{
		$user_role = $this->session->userdata('role');
		if ($user_role !== 'Document Controller') {

			$this->session->set_flashdata('error', `Access denied.`);
			return;
		}

		$folder_name = $this->input->post('subfolder_name');
		$parent_id = $this->input->post('folder_id'); // An array of selected office IDs

		$this->Folder_model->create_subfolder($folder_name, $parent_id);
		$this->session->set_flashdata('success', `${folder_name} folder created successfully.`);
		redirect('documentations/folder/' . $parent_id);
	}

	public function view_folder_files($folder_id)
	{

		$session_office = $this->session->userdata('office');

		$user_office = $this->db
			->from('z_office')
			->select('*')
			->where('Office_Name', $session_office)
			->get()
			->result_array()[0];

		$access = $this->db
			->from('folder_access')
			->select('*')
			->where('Id_Office', $user_office['ID_Office'])
			->where('folder_id', $folder_id)
			->get()
			->result_array();

		if (sizeof($access) <= 0) {
			redirect('/documentations?errors=accessdenied');
			return;
		}



		$files = $this->db->select('storage_documentations.*')
			->from('storage_documentations')
			->join('folder_access', 'folder_access.folder_id = storage_documentations.folder_id')
			->where('folder_access.folder_id', $folder_id)
			->group_by('storage_documentations.File_ID')
			->get()
			->result_array();

		$folders = $this->db->select('*')
			->from('folders')
			->where('parent_id', $folder_id)
			->get()
			->result_array();

		$current_folder = $this->db->select('*')
			->from('folders')
			->where('id', $folder_id)
			->get()
			->result_array()[0];





		$data["documentations"] = $files;
		$data['subfolders'] = $folders;
		$data["folder_id"] = $folder_id;
		$data['current_folder'] = $current_folder;

		$this->load->view('users/documentation_files', $data);
	}

	public function view_documentation($file_id)
	{
		// Check if file ID is provided
		if (isset($file_id)) {
			// Query to fetch the file details from the database
			$this->db->where('File_ID', $file_id);
			$query = $this->db->get('storage_documentations');

			if ($query->num_rows() > 0) {
				$file_data = $query->row();
				$file_name = $file_data->File_Name;
				$user_id = $file_data->User_ID;

				// Construct the correct file path
				$file_path = FCPATH . 'files_documentations/' . $user_id . '/' . $file_name;
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


	public function upload_documentation()
	{
		$folder_id = $this->input->post('folder_id');
		// Handle file upload and form data here
		$config['upload_path'] = './files_documentations/' . $this->session->userdata('user_id') . '/';
		$config['allowed_types'] = 'pdf|docx|txt';
		$config['max_size'] = 2000; // Set max file size (in KB)

		$this->load->library('upload', $config);
		if (!is_dir($config['upload_path'])) {
			mkdir($config['upload_path'], 0777, true);
		}

		if (!$this->upload->do_upload('file')) {
			$data['error'] = $this->upload->display_errors();
			$this->session->set_flashdata('error', $data['error']);
			redirect('documentations/folder/' . $folder_id);
		} else {
			$upload_data = $this->upload->data();
			$documentation_data = array(
				'File_Title' => $this->input->post('File_Title_Brkt'),
				'File_Type' => "application/pdf",
				'File_Name' => $upload_data['file_name'],
				'User_ID' => $this->session->userdata('user_id'),
				'Date_Uploaded' => date("Y-m-d H:i:s"),
				'folder_id' => $folder_id
			);

			$this->Documentation_model->insert_documentation($documentation_data);
			redirect('documentations/folder/' . $folder_id);
		}
	}

	public function delete_documentation($file_id)
	{
		try {
			$this->Documentation_model->delete_documentation($file_id);
			$this->session->set_flashdata('success', 'Documentation ' . $file_id . ' has been deleted.');
		} catch (\Throwable $th) {
			$this->session->set_flashdata('error', 'Error deleting ' . $file_id);
		}
		redirect('documentations');
	}

	public function update_access($folder_id)
	{
		// Load the model if using a model (optional)
		// $this->load->model('Folder_model');

		// Get the selected office IDs from the form
		$office_ids = $this->input->post('office_ids');

		// Start a transaction to ensure data consistency
		$this->db->trans_start();

		// 1. Delete existing access for this folder
		$this->db->where('folder_id', $folder_id);
		$this->db->delete('folder_access');

		// 2. Insert new access entries
		if (!empty($office_ids)) {
			$access_data = [];
			foreach ($office_ids as $office_id) {
				$access_data[] = [
					'folder_id' => $folder_id,
					'ID_Office' => $office_id
				];
			}
			// Batch insert new access records
			$this->db->insert_batch('folder_access', $access_data);
		}

		// Complete the transaction
		$this->db->trans_complete();

		// Check for successful transaction
		if ($this->db->trans_status() === FALSE) {
			// Rollback and display an error message
			$this->session->set_flashdata('error', 'Failed to update folder access.');
		} else {
			// Success message
			$this->session->set_flashdata('success', 'Folder access updated successfully.');
		}

		// Redirect back to the folder page or wherever appropriate
		redirect('documentations');  // Adjust the redirect path as needed
	}

	public function delete_folder($folder_id)
	{
		// Start a transaction to ensure data consistency
		$this->db->trans_start();

		// 1. Delete access records associated with the folder
		$this->db->where('folder_id', $folder_id);
		$this->db->delete('folder_access');

		// 2. Delete the folder from the folders table
		$this->db->where('id', $folder_id);
		$this->db->delete('folders');

		// Complete the transaction
		$this->db->trans_complete();

		// Check for successful transaction
		if ($this->db->trans_status() === FALSE) {
			// Rollback and display an error message
			$this->session->set_flashdata('error', 'Failed to delete folder.');
		} else {
			// Success message
			$this->session->set_flashdata('success', 'Folder deleted successfully.');
		}

		// Redirect back to the folder list page or wherever appropriate
		redirect('documentations');  // Adjust the redirect path as needed
	}
}
