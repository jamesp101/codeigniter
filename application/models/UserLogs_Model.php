<?php
class UserLogs_Model extends CI_Model {

    public function get_logs() {
        $query = $this->db->get('y1_user_logs');
        return $query->result_array();  // Return the result as an array
    }
    public function get_log_by_code($UR_Code) {
        $query = $this->db->get_where('y1_user_logs', array('UR_Code' => $UR_Code));
        return $query->row_array();
    }
}
