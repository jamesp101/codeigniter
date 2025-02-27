<?php
class Documentation_model extends CI_Model {

    public function insert_documentation($data) {
        return $this->db->insert('storage_documentations', $data);
    }

    public function delete_documentation($file_id) {
        $this->db->where('File_ID', $file_id);
        $this->db->delete('storage_documentations');
    }
}
?>