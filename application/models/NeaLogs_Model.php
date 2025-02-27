<?php
class NeaLogs_Model extends CI_Model {

    public function get_logs() {
        $query = $this->db->get('y4_nea_logs');  // Fetch all logs from 'y4_nea_logs' table
        return $query->result_array();  // Return the result as an array
    }

    public function get_log_details($UR_Code) {
        // Fetch details from 'y4_nea_logs' based on UR_Code
        $this->db->where('UR_Code', $UR_Code);
        $query = $this->db->get('y4_nea_logs');
        return $query->row_array();  // Return a single result as an array
    }
    public function delete_nea($id) {
        return $this->db->where('ID_NEA', $id)->delete('news_and_events');
    }
}
