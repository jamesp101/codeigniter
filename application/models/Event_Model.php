<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_Model extends CI_Model {

    public function __construct() {
        $this->load->database(); // Load the database
    }

    // Method to fetch events
    public function get_events() {
        $query = $this->db->select('id, title, start, end, color')
                          ->from('events')
                          ->get();
        return $query->result_array(); // Return the events as an array
    }

    // Method to fetch event types for the dropdown
    public function get_event_types() {
        $query = $this->db->order_by('Name_of_Event_Type', 'ASC')
                          ->get('event_types');
        return $query->result_array(); // Return the event types
    }

    // Method to insert event data
    public function add_event($data) {
        return $this->db->insert('events', $data); // Insert data into the 'events' table
    }

    public function delete_event($id) {
        return $this->db->delete('events', array('id' => $id));
    }

    // Function to update event
    public function update_event($id, $title, $color) {
        $data = array(
            'title' => $title,
            'color' => $color
        );
        $this->db->where('id', $id);
        return $this->db->update('events', $data);
    }
}
