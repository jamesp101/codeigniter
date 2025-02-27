<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventType_Model extends CI_Model {

    public function get_event_types() {
        $query = $this->db->get('event_types');
        return $query->result_array();
    }

    // Check if event type already exists
    public function check_event_type_exists($name_of_event_type) {
        $this->db->where('Name_of_Event_Type', $name_of_event_type);
        $query = $this->db->get('event_types');
        return $query->num_rows() > 0;
    }

    // Update event type
    public function update_event_type($id_event_type, $color_of_event_type, $name_of_event_type) {
        $data = array(
            'Color_of_Event_Type' => $color_of_event_type,
            'Name_of_Event_Type' => $name_of_event_type
        );
        $this->db->where('ID_Event_Type', $id_event_type);
        $this->db->update('event_types', $data);
    }

    // Delete event type
    public function delete_event_type($id_event_type) {
        $this->db->where('ID_Event_Type', $id_event_type);
        $this->db->delete('event_types');
    }

    // Insert new event type
    public function insert_event_type($color_of_event_type, $name_of_event_type) {
        $data = array(
            'Color_of_Event_Type' => $color_of_event_type,
            'Name_of_Event_Type'  => $name_of_event_type
        );
        $this->db->insert('event_types', $data);
    }


}
