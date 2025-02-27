<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Event_Model'); // Load your event model
        $this->load->library('form_validation');
        $this->load->helper('url'); // Load URL helper for base_url
        $this->load->library('session');
    }

    public function add_event() {
        // Validate form input
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('color', 'Event Type', 'required');
        $this->form_validation->set_rules('start', 'Start Date', 'required');
        $this->form_validation->set_rules('end', 'End Date', 'required');

        if ($this->form_validation->run() === TRUE) {
            // Prepare data for insertion
            $data = array(
                'title' => $this->input->post('title'),
                'color' => $this->input->post('color'),
                'start' => $this->input->post('start'),
                'end'   => $this->input->post('end')
            );

            // Insert event data via the model
            $this->Event_Model->add_event($data);

            // Redirect after successful submission
            redirect('/');
        } else {
            // Load event types and show the form again in case of validation failure
            $data['event_types'] = $this->Event_Model->get_event_types();
            // $this->load->view('events_view', $data);
            redirect('/');
        }
    }


    public function update_event() {
        // Load necessary helpers, libraries, and models
        $this->load->helper('url');
        $this->load->model('Event_Model');  // Assuming you have an Event model
        $username_LOG = $this->session->userdata('username');

        if($this->input->post('delete') && $this->input->post('id')) {
            // Handle event deletion
            $id = $this->input->post('id');

            $title_I = $this->db->escape_str($this->input->post('title'));
            $color_I = $this->input->post('color');
            $start_I = $this->input->post('Start_Brkt_I');
            $end_I = $this->input->post('End_Brkt_I');
            $ur_code = md5(uniqid(rand(), true));

            // Delete event
            if ($this->Event_Model->delete_event($id)) {
                $this->_log_event('Deleted Audit Calendar Event', $username_LOG, $title_I, $color_I, $start_I, $end_I, $ur_code);
            }

        } else if ($this->input->post('titleEdit') && $this->input->post('color') && $this->input->post('id')) {
            // Handle event update
            $id = $this->input->post('id');
            $title = $this->db->escape_str($this->input->post('titleEdit'));
            $color_H = $this->input->post('color');
            $color = $this->input->post('color');
            $start_IAII = $this->input->post('Start_Brkt_I');
            $end_IAII = $this->input->post('End_Brkt_I');
            $ur_code = md5(uniqid(rand(), true));

            // Update event in the database
            if ($this->Event_Model->update_event($id, $title, $color)) {
                // Log event update
                $this->_log_event('Updated Audit Calendar Event', $username_LOG, $title, $color_H, $start_IAII, $end_IAII, $ur_code);
                $this->_log_event_new('Updated Audit Calendar Event', $username_LOG, $title, $color, $start_IAII, $end_IAII, $ur_code);
            }
        }

        // Redirect after the operation
        redirect('/');  // Redirect to your controller or appropriate page
    }

    // Private function to log events
    private function _log_event($action, $username, $title, $color, $start, $end, $ur_code) {
        // Log into audit logs
        date_default_timezone_set("Asia/Manila");
        $date_and_time_of_action = date("Y-m-d, H:i:s");

        $log_data = array(
            'Date_and_Time_of_Action' => $date_and_time_of_action,
            'Action_Made' => $action,
            'Username' => $username,
            'User_Type' => $this->session->userdata('role'),
            'title_I' => $title,
            'color_I' => $color,
            'start_I' => $start,
            'end_I' => $end,
            'UR_Code' => $ur_code
        );

        $this->db->insert('y2_auditcalendarevents_logs', $log_data);
    }

    // Private function to log events to another table
    private function _log_event_new($action, $username, $title, $color, $start, $end, $ur_code) {
        // Log into another audit logs table
        date_default_timezone_set("Asia/Manila");
        $date_and_time_of_action = date("Y-m-d, H:i:s");

        $log_data_new = array(
            'Date_and_Time_of_Action' => $date_and_time_of_action,
            'Action_Made' => $action,
            'Username' => $username,
            'User_Type' => $this->session->userdata('role'),
            'title_II' => $title,
            'color_II' => $color,
            'start_II' => $start,
            'end_II' => $end,
            'UR_Code' => $ur_code
        );

        $this->db->insert('y2_auditcalendarevents_logs_new', $log_data_new);
    }
}
