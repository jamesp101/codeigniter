<?php
class Emanual_model extends CI_Model {

    public function get_emanual_types() {
        $this->db->order_by('Name_of_Emanual_Type', 'ASC');
        $query = $this->db->get('emanual_types');
        return $query->result_array();
    }

    public function insert_emanual($data) {
        return $this->db->insert('storage_emanuals', $data);
    }

    public function delete_emanual($file_id) {
        $this->db->where('File_ID', $file_id);
        $this->db->delete('storage_emanuals');
    }
}
?>