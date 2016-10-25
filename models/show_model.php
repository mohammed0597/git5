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

    function delete_video($id) {
        $this->db->where('id', $id);
        $this->db->delete('usersvideo');
    }

}

?>
