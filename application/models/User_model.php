<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();


    }

    public function get_users() {
        $query = $this->db->get('all_users');
        // $query = $this->db->where('email_add', "qaiemgmtofficer@gmail.com")->get('all_users');
        return $query->result();
    }

    public function get_users_by_role($role) {
        $query = $this->db->where('type', $role)->get('all_users');
        // $query = $this->db->where('email_add', "qaiemgmtofficer@gmail.com")->get('all_users');
        return $query->result();
    }

    public function get_user($id) {
        $query = $this->db->where('user_id', $id)->get('all_users');
        return $query->row_array();
    }

    public function check_user_email($email_add) {
        $query = $this->db->where('email_add', $email_add)->get('all_users');
        return $query->result();
    }

    public function get_user_by_username($username) {
        $query = $this->db->where('username', $username)->get('all_users');
        return $query->row();
    }

    public function get_user_by_username_array($username) {
        $query = $this->db->where('username', $username)->get('all_users');
        return $query->row_array();
    }


    public function insert_user($data) {
        $this->db->insert('all_users', $data);
        return $this->db->insert_id();
    }

    public function update_user($id, $data) {
        $this->db->where('user_id', $id);
        return $this->db->update('all_users', $data);
    }



    public function delete_user($id) {
        $this->db->where('user_id', $id);
        return $this->db->delete('all_users');
    }

    // Get unverified user by vkey
    public function get_unverified_user($vkey) {
        $this->db->where('vkey', $vkey);
        $this->db->where('verification_status', 'UNVERIFIED');
        return $this->db->get('all_users')->row();
    }

    // Verify the user by updating their status
    public function verify_user($vkey) {
        $this->db->where('vkey', $vkey);
        return $this->db->update('all_users', ['verification_status' => 'VERIFIED']);
    }
}
?>