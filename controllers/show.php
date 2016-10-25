<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Show extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');        /*         * LOADING HELPER TO AVOID PHP ERROR *** */
        $this->load->model('show_model'); /* Welcome_model as welcome */
    }

    public function contents() {

        $this->data['show_video'] = $this->welcome->show_video();
        $this->load->view('video_view', $this->data, FALSE);
    }

    function show_v_id() {
        $id = $this->uri->segment(3);
        $data['usersvideo'] = $this->show_model->show_video();
        $data['single_video'] = $this->show_model->show_v_id($id);
        $this->load->view('video_view', $data);


        $this->db->query('update usersvideo set views=views+1 where id="' . $id . '"');


        $this->db->select('views');
        $this->db->from('usersvideo');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->result();
    }

    function show_v_id1() {
        $id = $this->input->post('did');
        $data = array(
            'video' => $this->input->post('video'),
            'video_name' => $this->input->post('video_name'),
            'id' => $this->input->post('id'),
        );

        $this->show_model->show_v_id1($id, $data);
        $this->show_v_id();
    }

    function show_v_id2() {
        $usersid = $this->uri->segment(3);
        $data['usersvideo'] = $this->show_model->show_video();
        $data['single_video'] = $this->show_model->show_v_id($usersid);
        $this->load->view('users1_view', $data);
    }

    function delete_video($id) {

        $this->show_model->delete_video($id);
        echo'you have delete your video .<br><a href= http://[::1]/ci4/index.php/home>go back</a>';
    }

    public function savelikes() {

        if ($this->session->userdata('usersid')) {
            $usersid = $this->session->userdata('usersid');
            $usersvideoid = $this->input->post('usersvideoid');


            $fetchlikes = $this->db->query('select likes from usersvideo where id="' . $usersvideoid . '"');
            $result = $fetchlikes->result();

            $checklikes = $this->db->query('select * from usersvideolikes 
                                    where usersvideoid="' . $usersvideoid . '" 
                                    and usersid = "' . $usersid . '"');
            $resultchecklikes = $checklikes->num_rows();

            if ($resultchecklikes == '0') {
                if ($result[0]->likes == "" || $result[0]->likes == "NULL") {
                    $this->db->query('update usersvideo set likes=1 where id="' . $usersvideoid . '"');
                } else {
                    $this->db->query('update usersvideo set likes=likes+1 where id="' . $usersvideoid . '"');
                }

                $data = array('usersvideoid' => $usersvideoid, 'usersid' => $usersid);
                $this->db->insert('usersvideolikes', $data);
            } else {
                $this->db->delete('usersvideolikes', array('usersvideoid' => $usersvideoid,
                    'usersid' => $usersid));
                $this->db->query('update usersvideo set likes=likes-1 where id="' . $usersvideoid . '"');
            }


            $this->db->select('likes');
            $this->db->from('usersvideo');
            $this->db->where('id', $usersvideoid);
            $query = $this->db->get();
            $result = $query->result();

            echo $result[0]->likes;
        } else {
            $resultchecklikes = $checklikes->num_rows();
        }
    }

    public function saveunlikes() {
        if ($this->session->userdata('usersid')) {
            $usersid = $this->session->userdata('usersid');
            $usersvideoid = $this->input->post('usersvideoid');


            $fetchunlikes = $this->db->query('select unlikes from usersvideo where id="' . $usersvideoid . '"');
            $result = $fetchunlikes->result();

            $checkunlikes = $this->db->query('select * from usersvideounlikes 
                                    where usersvideoid="' . $usersvideoid . '" 
                                    and usersid = "' . $usersid . '"');
            $resultcheckunlikes = $checkunlikes->num_rows();

            if ($resultcheckunlikes == '0') {
                if ($result[0]->unlikes == "" || $result[0]->unlikes == "NULL") {
                    $this->db->query('update usersvideo set unlikes=1 where id="' . $usersvideoid . '"');
                } else {
                    $this->db->query('update usersvideo set unlikes=unlikes+1 where id="' . $usersvideoid . '"');
                }

                $data = array('usersvideoid' => $usersvideoid, 'usersid' => $usersid);
                $this->db->insert('usersvideounlikes', $data);
            } else {
                $this->db->delete('usersvideounlikes', array('usersvideoid' => $usersvideoid,
                    'usersid' => $usersid));
                $this->db->query('update usersvideo set unlikes=unlikes-1 where id="' . $usersvideoid . '"');
            }

            $this->db->select('unlikes');
            $this->db->from('usersvideo');
            $this->db->where('id', $usersvideoid);
            $query = $this->db->get();
            $result = $query->result();

            echo $result[0]->unlikes;
        } else {
            $resultchecklikes = $checklikes->num_rows();
        }
    }

    public function savecomment() {
        $usersid = $this->session->userdata('usersid');
        $usersvideoid = $this->input->post('usersvideoid');
        $name = $this->input->post('name');
        $comment = $this->input->post('comment');

        $fetchcomment = $this->db->query('insert comment into usersvideo where id="' . $usersvideoid . '"');
        $result = $fetchcomment->result();

        $checkunlikes = $this->db->query('select * from usersvideocomment
                                    where usersvideoid="' . $usersvideoid . '" 
                                    and usersid = "' . $usersid . '"');
        $resultcheckcomment = $checkcomment->num_rows();

        if ($resultcheckcomment == '0') {
            if ($result[0]->unlikes == "" || $result[0]->unlikes == "NULL") {
                $this->db->query('update usersvideo set comment=1 where id="' . $usersvideoid . '"');
            } else {
                $this->db->query('update usersvideo set comment=comment+1 where id="' . $usersvideoid . '"');
            }

            $data = array('usersvideoid' => $usersvideoid, 'usersid' => $usersid, 'name' => $name, 'comment' => $comment);
            $this->db->insert('usersvideocomment', $data);
        } else {
            
        }

        $this->db->select('comments');
        $this->db->from('usersvideo');
        $this->db->where('id', $usersvideoid);
        $query = $this->db->get();
        $result = $query->result();

        echo $result[0]->comment;
    }

}

?>