<?php

class User_model extends CI_Model {

    public function get_users() {
        $query = $this->db->get('usersvideo');
        return $query->result();
    }

    public function user_login($username, $password) {
        $this->db->where(array(
            'username' => $username,
        ));
        $result = $this->db->get('users');
        $db_password = $result->row(2)->password;


        if (password_verify($password, $db_password)) {
            return $result->row(0)->id;
        } else {
            return false;
        }
    }

    public function register_user() {
        $options = ['cost' => 12];

        $encrypted_password = password_hash($this->input->post('password'), PASSWORD_BCRYPT, $options);
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $encrypted_password
        );
        $user_register = $this->db->insert('users', $data);

        return $user_register;
    }

    public function upload_video($userId) {
        $options = ['cost' => 12];


        $data = array(
            'video_name' => $this->input->post('video_name'),
            'video' => $this->input->post('video'),
            'usersid' => $userId,
        );
        $video_upload = $this->db->insert('usersvideo', $data);

        return $video_upload;

        }
        

}

