<?php

use Soap\Sdl;

defined('BASEPATH') or exit('No direct script access allowed');


/**
 * @property CI_Session $session
 * @property CI_DB $db
 * @property CI_Input $input
 * @property Folder_model $Folder_model
 * @property CI_Upload $upload
 * @property CI_Output $output
 * @property Documentation_model $Documentation_model
 */
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
		$session_office_id = $this->session->userdata('office_id');
		$session_user_id = $this->session->userdata('user_id');



		$result = $this->db->select('folders.*, 
    GROUP_CONCAT(DISTINCT z_office.Office_Name) AS access_list, 
    GROUP_CONCAT(DISTINCT user_folder_access.user_id) AS user_ids', false)
			->from('folders')
			->join('folder_access', 'folders.id = folder_access.folder_id', 'left')
			->join('z_office', 'folder_access.ID_Office = z_office.ID_Office', 'left')
			->join('user_folder_access', 'user_folder_access.folder_id = folders.id', 'left')
			->group_by('folders.id', NULL)
			->get()
			->result_array();


		$data['folders'] = array_map(function ($row) {

			return [
				'id' => $row['id'],
				'name' => $row['name'],
				'created_at' => $row['created_at'],
				'access' => $row['access_list'] !== NULL
					? explode(',', $row['access_list'])
					: [],
				'user_ids' => $row['user_ids'] !== NULL
					? explode(',', $row['user_ids'])
					: [],
			];
		}, $result);

		$data['folders'] = array_filter(
			$data['folders'],
			function ($row) use ($session_office, $session_role, $session_user_id) {
				$special_access = ['Document Controller', 'Director for QAIE', 'QAIE Managment'];

				$has_access = in_array($session_office, $row['access']);
				$has_special_access = in_array($session_role, $special_access);
				$has_user_access = in_array($session_user_id, $row['user_ids']);

				return $has_access || $has_special_access || $has_user_access;
			}
		);

		$data['offices'] = $this
			->db
			->select('ID_Office, Office_Name')
			->get('z_office')
			->result();


		$this->load->view('users/documentation_folders', $data);
	}

	public function create_folder()
	{
		$user_role = $this->session->userdata('role');

		if ($user_role !== 'Document Controller') {
			redirect('/documentations?errors=accessdenied');
			return;
		}


		$folder_name = $this->input->post('folder_name');
		$office_ids = $this->input->post('office_ids'); // An array of selected office IDs

		$data = [
			'name' => $folder_name,
			'created_at' => date('Y-m-d H:i:s')
		];

		$this->Folder_model->create_folder($data, $office_ids);

		redirect('documentations');
	}

	public function create_subfolder()
	{
		$user_role = $this->session->userdata('role');
		if ($user_role !== 'Document Controller') {

			redirect('/documentations?errors=accessdenied');
			return;
		}

		$folder_name = $this->input->post('subfolder_name');
		$parent_id = $this->input->post('folder_id'); // An array of selected office IDs

		$this->Folder_model->create_subfolder($folder_name, $parent_id);
		$this->session->set_flashdata('success', $folder_name . ' folder created successfully.');
		redirect('documentations/folder/' . $parent_id);
	}

	public function view_folder_files($folder_id)
	{

		$session_office = $this->session->userdata('office');
		$special_access = ['Document Controller', 'Director for QAIE', 'QAIE Managment'];

		$folder = $this->db->from('folders')
			->select('*')
			->get()
			->result_array()[0];


		$base_folder_id = $folder['base_folder_id'];

		$folder_access = $this->db->from('folder_access')
			->select('*')
			->where('folder_id', $base_folder_id)
			->get()
			->result_array();

		$user_folder_access = $this->db->from('user_folder_access')
			->select('*')
			->where('user_id', $this->session->userdata('user_id'))
			->get()
			->result_array();

		$has_special_access = in_array($session_office, $special_access);
		$has_folder_access = sizeof($folder_access) <= 0;
		$has_user_access = sizeof($user_folder_access) <= 0;


		// Redirect if the user has no access
		if (!($has_special_access || $has_folder_access || $has_user_access)) {
			return redirect('/documentations?=errorsaccesdenied');
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

		if (!isset($file_id)) {
			show_404();
			return;
		}


		$this->db->where('File_ID', $file_id);
		$query = $this->db->get('storage_documentations');


		if (!($query->num_rows() > 0)) {

			show_404();
			return;
		}


		$file_data = $query->row();
		$file_name = $file_data->File_Name;
		$user_id = $file_data->User_ID;

		$file_path = FCPATH . 'files_documentations/' . $user_id . '/' . $file_name;
		ob_start();
		if (!file_exists($file_path)) {

			log_message('error', 'File does not exist at path: ' . $file_path);
			show_404();
			return;
		}


		header('Content-Type: application/pdf');
		header('Content-Disposition: inline; filename="' . $file_name . '"');
		header('Content-Transfer-Encoding: binary');
		header('Accept-Ranges: bytes');

		// Output the file
		@readfile($file_path);
		// readfile($file_path);

	}


	public function upload_documentation()
	{
		$folder_id = $this->input->post('folder_id');
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
			return;
		}
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

	public function delete_documentation($file_id)
	{
		try {
			$this->Documentation_model->delete_documentation($file_id);
			$this->session->set_flashdata('success', 'Documentation ' . $file_id . ' has been deleted.');
		} catch (Throwable $e) {
			$this->session->set_flashdata('error', 'Error deleting ' . $file_id);
		}
		redirect('documentations');
	}

	public function update_access($folder_id)
	{
		$office_ids = $this->input->post('office_ids');

		$this->db->trans_start();

		$this->db->where('folder_id', $folder_id);
		$this->db->delete('folder_access');

		if (!empty($office_ids)) {
			$access_data = [];
			foreach ($office_ids as $office_id) {
				$access_data[] = [
					'folder_id' => $folder_id,
					'ID_Office' => $office_id
				];
			}
			$this->db->insert_batch('folder_access', $access_data);
		}

		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			$this->session->set_flashdata('error', 'Failed to update folder access.');
		} else {
			$this->session->set_flashdata('success', 'Folder access updated successfully.');
		}

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


	public function get_users_access($folder_id)
	{

		$data['access'] = $this->db
			->from('folder_access')
			->select('z_office.Office_Name')
			->where('folder_id', $folder_id)
			->join('z_office', 'folder_access.ID_Office = z_office.Id_Office')
			->get()
			->result_array();

		$data['users'] = $this->db->get('all_users')->result_array();

		$data['access'] = array_map(function ($e) {
			return $e['Office_Name'];
		}, $data['access']);

		$data['folder_id'] = $folder_id;

		$user_access = $this->db
			->from('user_folder_access')
			->select('*')
			->where('folder_id', $folder_id)
			->get()
			->result_array();


		$data['users'] = array_map(function ($e) use ($user_access) {
			$d = $e;


			$has_access = array_filter($user_access, function ($e) use ($d) {
				return $d['user_id'] === $e['user_id'];
			});
			$has_access = count($has_access) > 0;

			$d['has_access'] = $has_access;

			return $d;
		}, $data['users']);



		$this->load->view('users/dialogs/user_document_list', $data);
	}

	public function add_user_access($folder_id, $user_id)
	{
		$this->db
			->insert('user_folder_access', [
				'folder_id' => $folder_id,
				'user_id' => $user_id
			]);

		$this->output->set_content_type(200)->set_output(json_encode(['success' => true]));
	}
	public function remove_user_access($folder_id, $user_id)
	{
		$this->db
			->delete('user_folder_access', [
				'folder_id' => $folder_id,
				'user_id' => $user_id,
			]);
	}
}
