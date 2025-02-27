<?php
class Folder_model extends CI_Model {
    public function create_folder($data, $office_ids) {
        // Save folder data
        $this->db->insert('folders', $data);
        $folder_id = $this->db->insert_id();

        // Assign folder to multiple offices
        foreach ($office_ids as $office_id) {
            $this->db->insert('folder_access', [
                'folder_id' => $folder_id,
                'ID_Office' => $office_id
            ]);
        }

        return $folder_id;
    }

    public function get_folders_for_office($office_id) {
        $this->db->select('folders.*');
        $this->db->from('folders');
        $this->db->join('folder_offices', 'folder_offices.folder_id = folders.id');
        $this->db->where('folder_offices.office_id', $office_id);
        return $this->db->get()->result();
    }
    public function get_folders() {
        return $this->db->get('folders')->result();
    }
}
?>