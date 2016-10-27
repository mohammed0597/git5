<?php

class Show_model extends CI_Model {

    function show_video() {



        $query = $this->db->get('usersvideo');
        return $query->result_array();
    }

    function show_v_id($data) {
        $this->db->select('*');
        $this->db->from('usersvideo');
        $this->db->where('id', $data);
        $query = $this->db->get();
        $result = $query->result();
        return $result;

        $this->db->where('id', $id);
        $this->db->delete('usersvideo');
    }

    function show_v_id1($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('usersvideo', $data);
    }

    function show_v_id2($data) {
        $this->db->select('*');
        $this->db->from('usersvideo');
        $this->db->where('usersid', $data);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function show_v_id3($data) {
        $this->db->select('*');
        $this->db->from('usersvideocomment');
        $this->db->where('usersvideoid', $data);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function delete_video($id) {
        $this->db->where('id', $id);
        $this->db->delete('usersvideo');
    }

    public function comment_v($usersid) {
        $options = ['cost' => 12];
        $usersid = $this->session->userdata('usersid');
        $usersvideoid = $this->input->post('usersvideoid');



        $data = array(
            'comment' => $this->input->post('comment'),
            'usersvideoid' => $usersvideoid,
            'usersid' => $usersid
        );
        $comment_v = $this->db->insert('usersvideocomment', $data);

        return $comment_v;
    }

    function show_comment() {



        $query = $this->db->get('usersvideo');
        return $query->result_array();
    }

}

?>
