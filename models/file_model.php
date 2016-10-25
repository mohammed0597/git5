<?php

class File_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function insert_file($filename, $title) {
        $data = array(
            'product_pic' => $filename,
            'title' => $title
        );
        $this->db->insert('file', '$data');
        return $this->db->insert_id();
    }

}

?>
