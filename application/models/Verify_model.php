<?php
class User_model extends CI_Model {

    // Fetch the unverified user by vkey
    public function get_unverified_user($vkey) {
        $this->db->where('vkey', $vkey);
        $this->db->where('verification_status', 'UNVERIFIED');
        return $this->db->get('all_users')->row();
    }

    // Update user verification status
    public function verify_user($vkey) {
        $this->db->where('vkey', $vkey);
        $this->db->update('all_users', array('verification_status' => 'VERIFIED'));
        return $this->db->affected_rows();
    }
}
