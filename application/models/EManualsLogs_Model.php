<?php
class EManualsLogs_Model extends CI_Model {

    public function get_logs() {
        $query = $this->db->get('y8_emanuals_logs');
        return $query->result_array();  // Return the result as an array
    }

    public function get_log_details($UR_Code) {
        // Fetch details from 'y8_emanuals_logs' based on UR_Code
        $this->db->where('UR_Code', $UR_Code);
        $query = $this->db->get('y8_emanuals_logs');
        return $query->row_array();  // Return a single result as an array
    }
}
