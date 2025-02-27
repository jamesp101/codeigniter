<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LogsController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load the models
        $this->load->model('UserLogs_Model');
        $this->load->model('User_model');
        $this->load->model('EManualsLogs_Model');
        $this->load->model('NeaLogs_Model');
        $this->load->model('AuditCalendarLogs_Model');
        $this->load->model('AuditCalendarEventTypesLogs_Model');
    }
    public function index() {
        // Fetch user logs data from the model
        $content_data['user_logs'] = $this->UserLogs_Model->get_logs();

        // Load the view and pass the data
        $data['content'] = $this->load->view('admin/log_list/user_logs_view',  $content_data, TRUE);
        $this->load->view('admin/template/page', $data);
    }

    public function emanual_logs() {
        // Fetch the logs data from the model
        $content_data['emanual_logs'] = $this->EManualsLogs_Model->get_logs();

        // Load the view and pass the data
        $data['content'] = $this->load->view('admin/log_list/emanual_logs_view',  $content_data, TRUE);
        $this->load->view('admin/template/page', $data);
    }

    public function nea_logs() {
        // Fetch the logs data from the model
        $content_data['nea_logs'] = $this->NeaLogs_Model->get_logs();

        // Load the view and pass the data
        $data['content'] = $this->load->view('admin/log_list/nea_logs_view',  $content_data, TRUE);
        $this->load->view('admin/template/page', $data);
    }

    public function audit_calendar_logs() {
        // Fetch the logs data from the model
        $content_data['audit_calendar_logs'] = $this->AuditCalendarLogs_Model->get_logs();

        // Load the view and pass the data
        $data['content'] = $this->load->view('admin/log_list/audit_calendar_logs_view',  $content_data, TRUE);
        $this->load->view('admin/template/page', $data);
    }

    public function audit_calendar_event_type_logs() {
        // Fetch logs data from the model
        $content_data['event_types_logs'] = $this->AuditCalendarEventTypesLogs_Model->get_logs();

        // Load the view and pass the data
        $data['content'] = $this->load->view('admin/log_list/audit_calendar_event_types_logs_view',  $content_data, TRUE);
        $this->load->view('admin/template/page', $data);
    }

    public function user_logs_view_details ($UR_Code, $Username) {
        // Get user log and user details
        $content_data['user_log'] = $this->UserLogs_Model->get_log_by_code($UR_Code);
        $content_data['user_details'] = $this->User_model->get_user_by_username_array($Username);
        // echo $content_data['user_details'];
        // Load the view and pass the data

        // Load the view and pass the data
        $data['content'] = $this->load->view('admin/log_list/user_logs_details_view',  $content_data, TRUE);
        $this->load->view('admin/template/page', $data);
    }

    public function emanual_logs_view_details($UR_Code) {
        // Get the log details based on the UR_Code
        $content_data['log_details'] = $this->EManualsLogs_Model->get_log_details($UR_Code);

        // Load the view and pass the data
        $data['content'] = $this->load->view('admin/log_list/emanuals_logs_view_details',  $content_data, TRUE);
        $this->load->view('admin/template/page', $data);
    }

    public function nea_logs_view_details($UR_Code) {
        // Get the log details based on the UR_Code
        $content_data['log_details'] = $this->NeaLogs_Model->get_log_details($UR_Code);
        $data['content'] = $this->load->view('admin/log_list/nea_logs_view_details', $content_data, TRUE);
        // Load the view and pass the data
        $this->load->view('admin/template/page', $data);
    }


    public function audit_calendar_logs_view_details($ur_code) {
        // Get log details
        $log_details = $this->AuditCalendarLogs_Model->get_log_details($ur_code);
        $log_new_details = $this->AuditCalendarLogs_Model->get_new_log_details($ur_code);

        // Pass data to the view
        $content_data['log_details'] = $log_details;
        $content_data['log_new_details'] = $log_new_details;
        // $this->load->view('audit_calendar_logs_view_details', $data);

        $data['content'] = $this->load->view('admin/log_list/audit_calendar_logs_view_details', $content_data, TRUE);
        // Load the view and pass the data
        $this->load->view('admin/template/page', $data);
    }

    public function audit_calendar_event_logs_view_details($ur_code) {
        // Get log details
        $log_details = $this->AuditCalendarEventTypesLogs_Model->get_log_details($ur_code);
        $log_new_details = $this->AuditCalendarEventTypesLogs_Model->get_new_log_details($ur_code);

        // Pass data to the view
        $content_data['log_details'] = $log_details;
        $content_data['log_new_details'] = $log_new_details;

        // Load the view and pass the data
        // $this->load->view('audit_calendar_view', $content_data);
        $data['content'] = $this->load->view('admin/log_list/audit_calendar_event_types_logs_view_details', $content_data, TRUE);
        // Load the view and pass the data
        $this->load->view('admin/template/page', $data);

    }

}
