<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @property CI_Input $input 
 **/
class DocumentController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Document_Model');
		$this->load->helper('url'); // Load URL helper for redirection
	}

	public function update()
	{
		// Retrieve the ID and data from POST
		$id = $this->input->post('ID_Brkt');

		// Define an array for the fields to be updated
		$fields_to_update = [
			'School_DESC' => $this->input->post('School_DESC_Brkt'),
			'DCR_DESC' => $this->input->post('DCR_DESC_Brkt'),
			'Date_Of_Request_DESC' => $this->input->post('Date_Of_Request_DESC_Brkt'),
			'DCR_No_DESC' => $this->input->post('DCR_No_DESC_Brkt'),
			'To_Who_DESC' => $this->input->post('To_Who_DESC_Brkt'),
			'From_Office_DESC' => $this->input->post('From_Office_DESC_Brkt'),
			'Amend_Document_DESC' => $this->input->post('Amend_Document_DESC_Brkt'),
			'New_Document_DESC' => $this->input->post('New_Document_DESC_Brkt'),
			'Delete_Document_DESC' => $this->input->post('Delete_Document_DESC_Brkt'),
			'#_Details_Of_Document_DESC' => $this->input->post('#_Details_Of_Document_DESC_Brkt'),
			'Details_Of_Document_DESC' => $this->input->post('Details_Of_Document_DESC_Brkt'),
			'Document_Number_DESC' => $this->input->post('Document_Number_DESC_Brkt'),
			'COLON_Document_Number_DESC' => $this->input->post('COLON_Document_Number_DESC_Brkt'),
			'Document_Title_DESC' => $this->input->post('Document_Title_DESC_Brkt'),
			'COLON_Document_Title_DESC' => $this->input->post('COLON_Document_Title_DESC_Brkt'),
			'Revision_Status_DESC' => $this->input->post('Revision_Status_DESC_Brkt'),
			'COLON_Revision_Status_DESC' => $this->input->post('COLON_Revision_Status_DESC_Brkt'),
			'Note_Attach_DraftCopy_DESC' => $this->input->post('Note_Attach_DraftCopy_DESC_Brkt'),
			'#_Changes_Requested_DESC' => $this->input->post('#_Changes_Requested_DESC_Brkt'),
			'Changes_Requested_DESC' => $this->input->post('Changes_Requested_DESC_Brkt'),
			'Reason_For_The_Change_DESC' => $this->input->post('Reason_For_The_Change_DESC_Brkt'),
			'Requested_By_DESC' => $this->input->post('Requested_By_DESC_Brkt'),
			'#_QAIE_Director_Comments_DESC' => $this->input->post('#_QAIE_Director_Comments_DESC_Brkt'),
			'QAIE_Director_Comments_DESC' => $this->input->post('QAIE_Director_Comments_DESC_Brkt'),
			'Request_Denied_DESC' => $this->input->post('Request_Denied_DESC_Brkt'),
			'Request_Accepted_DESC' => $this->input->post('Request_Accepted_DESC_Brkt'),
			'Signature/Date_DESC' => $this->input->post('Signature/Date_DESC_Brkt'),
			'#_Approving_Authority_DESC' => $this->input->post('#_Approving_Authority_DESC_Brkt'),
			'Approving_Authority_DESC' => $this->input->post('Approving_Authority_DESC_Brkt'),
			'Signature_Over_Printed_Name_DESC' => $this->input->post('Signature_Over_Printed_Name_DESC_Brkt'),
			'Date_Of_Approval_DESC' => $this->input->post('Date_Of_Approval_DESC_Brkt'),
			'#_Document_Status_DESC' => $this->input->post('#_Document_Status_DESC_Brkt'),
			'Document_Status_DESC' => $this->input->post('Document_Status_DESC_Brkt'),
			'New_Document_Status_DESC' => $this->input->post('New_Document_Status_DESC_Brkt'),
			'New_Document_No_DESC' => $this->input->post('New_Document_No_DESC_Brkt'),
			'New_Document_Version_DESC' => $this->input->post('New_Document_Version_DESC_Brkt'),
			'New_Document_Revision_DESC' => $this->input->post('New_Document_Revision_DESC_Brkt'),
			'Revision_Date_Version_DESC' => $this->input->post('Revision_Date_Version_DESC_Brkt')
		];


		// Filter out empty values
		$data = array_filter($fields_to_update);

		// Attempt to update the database
		if ($this->Document_Model->update_description($id, $data)) {
			$this->session->set_flashdata('success', 'Successfully updated!');
		} else {
			$this->session->set_flashdata('error', 'Update failed.');
		}

		// Redirect back to the edit page
		redirect('dcrform/edit_view_form');
	}
}
