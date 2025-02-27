<?php
class AuditCalendarLogs_Model extends CI_Model {

    public function get_logs() {
        $query = $this->db->get('y2_auditcalendarevents_logs');  // Fetch all logs from 'y2_auditcalendarevents_logs'
        return $query->result_array();  // Return the result as an array
    }

    public function get_log_details($ur_code) {
        $this->db->where('UR_Code', $ur_code);
        return $this->db->get('y2_auditcalendarevents_logs')->result_array();
    }

    public function get_new_log_details($ur_code) {
        $this->db->where('UR_Code', $ur_code);
        return $this->db->get('y2_auditcalendarevents_logs_new')->result_array();
    }
}
