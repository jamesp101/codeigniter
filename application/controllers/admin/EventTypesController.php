<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventTypesController extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('EventType_Model');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index() {
        $content_data['event_types'] = $this->EventType_Model->get_event_types();

        // Handle form submissions
        if ($this->input->post('yes_update_eventtype')) {
            $this->update_event_type();
        }
        if ($this->input->post('yes_delete_eventtype')) {
            $this->delete_event_type();
        }

        // Load view
        $data['content'] = $this->load->view('admin/event_types_view', $content_data, TRUE);
        // Load the view and pass the data
        $this->load->view('admin/template/page', $data);
    }

    public function update_event_type() {
        $id_event_type = $this->input->post('ID_Event_Type_Brkt');
        $color_of_event_type = $this->input->post('Color_of_Event_Type_Brkt');
        $name_of_event_type = $this->db->escape_str($this->input->post('Name_of_Event_Type_Brkt'));

        if ($this->EventType_Model->check_event_type_exists($name_of_event_type)) {
            echo "<script> alert('Event type already exists, please try again with a different event type name...');</script>";
            redirect('admin/events_type');
        } else {
            $this->EventType_Model->update_event_type($id_event_type, $color_of_event_type, $name_of_event_type);
            echo "<script> alert('The audit calendar event type has been successfully updated!');</script>";
            redirect('admin/events_type');
        }
    }

    public function delete_event_type() {
        $id_event_type = $this->input->post('ID_Event_Type_Brkt');
        $this->EventType_Model->delete_event_type($id_event_type);
        echo "<script> alert('The audit calendar event type has been successfully deleted!...');</script>";
        redirect('admin/events_type');
    }

    // Save new event type
    public function save_event_type() {
        $color_of_event_type = $this->input->post('Color_of_Event_Type_Brkt');
        $name_of_event_type = $this->db->escape_str($this->input->post('Name_of_Event_Type_Brkt'));

        // Check if event type already exists
        if ($this->EventType_Model->check_event_type_exists($name_of_event_type)) {
            echo "<script> alert('Event type already exists, please try again with a different event type name...');</script>";
        } else {
            // Insert the new event type
            $this->EventType_Model->insert_event_type($color_of_event_type, $name_of_event_type);
            echo "<script> alert('The audit calendar event type has been successfully added!');</script>";
        }

        // Redirect back to the event types page
        redirect('eventtypes');
    }
}
