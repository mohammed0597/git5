<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Show extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');        /*         * LOADING HELPER TO AVOID PHP ERROR *** */
        $this->load->model('show_model'); 
    }

// show video by id 

    function show_v_id() {
        $id = $this->uri->segment(3);
        $data['usersvideo'] = $this->show_model->show_video();
        $data['single_video'] = $this->show_model->show_v_id($id);
       
//count views by update views=views+1 

        $this->db->query('update usersvideo set views=views+1 where id="' . $id . '"');


        $this->db->select('views');
        $this->db->from('usersvideo');
        $this->db->where('id', $id);
        $query = $this->db->get();
        $result = $query->result();
        
      
         $usersid = $this->uri->segment(3);
        $data['usersvideocomment'] = $this->show_model->show_comment();
        $data['s_video'] = $this->show_model->show_v_id3($usersid);
        $this->load->view('video_view', $data);
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
//function show video in users page by usersid  
    function show_v_id2() {
        $usersid = $this->uri->segment(3);
        $data['usersvideo'] = $this->show_model->show_video();
        $data['single_video'] = $this->show_model->show_v_id($usersid);
      
        
        
    }
    
    //delete video from database by user
    function delete_video($id) {

        $this->show_model->delete_video($id);
        // after delete video open new page with message 'you have delete your video' and can go back to home page 
        echo'you have delete your video .<br><a href= http://[::1]/ci4/index.php/home>go back</a>';
    }
    
  // function for save likes 
    public function savelikes() {

        if ($this->session->userdata('usersid')) {
            $usersid = $this->session->userdata('usersid');
            $usersvideoid = $this->input->post('usersvideoid');

//select likes from database by usersvideoid
            $fetchlikes = $this->db->query('select likes from usersvideo where id="' . $usersvideoid . '"');
            $result = $fetchlikes->result();
//select where usersvideoid and usersid
            $checklikes = $this->db->query('select * from usersvideolikes 
                                    where usersvideoid="' . $usersvideoid . '" 
                                    and usersid = "' . $usersid . '"');
            $resultchecklikes = $checklikes->num_rows();
//update likes=1 and like+1
            if ($resultchecklikes == '0') {
                if ($result[0]->likes == "" || $result[0]->likes == "NULL") {
                    $this->db->query('update usersvideo set likes=1 where id="' . $usersvideoid . '"');
                } else {
                    $this->db->query('update usersvideo set likes=likes+1 where id="' . $usersvideoid . '"');
                }
//update likes=1 and like-1
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
  // function for save unlikes 
    public function saveunlikes() {
        if ($this->session->userdata('usersid')) {
            $usersid = $this->session->userdata('usersid');
            $usersvideoid = $this->input->post('usersvideoid');

//select unlikes from database by usersvideoid
            $fetchunlikes = $this->db->query('select unlikes from usersvideo where id="' . $usersvideoid . '"');
            $result = $fetchunlikes->result();
//select where usersvideoid and usersid
            $checkunlikes = $this->db->query('select * from usersvideounlikes 
                                    where usersvideoid="' . $usersvideoid . '" 
                                    and usersid = "' . $usersid . '"');
            $resultcheckunlikes = $checkunlikes->num_rows();
//update unlikes=1 and unlike+1
            if ($resultcheckunlikes == '0') {
                if ($result[0]->unlikes == "" || $result[0]->unlikes == "NULL") {
                    $this->db->query('update usersvideo set unlikes=1 where id="' . $usersvideoid . '"');
                } else {
                    $this->db->query('update usersvideo set unlikes=unlikes+1 where id="' . $usersvideoid . '"');
                }
//update unlikes=1 and unlike-1
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

   //select comment from database where usersvideoid and usersid 
    //cant make comment if you are not  login 
    //if you comment open new page with message 'thanks for comment' 
    public function comment_v() {
        
           $usersid = $this->session->userdata('usersid');
           $usersvideoid = $this->input->post('usersvideoid');
      
        $this->form_validation->set_rules('comment', 'Comment', 'trim|required');
        

        if ($this->form_validation->run() == FALSE) {
             $checkcomment = $this->db->query('select * from usersvideocomment 
                                    where usersvideoid="' . $usersvideoid . '" 
                                    and usersid = "' . $usersid . '"');
            $resultcheckcomment = $checkcomment->num_rows();

            $data = array(
                'errors' => '<div class="bg-danger">' . validation_errors() . '</div>'
            );


            $data['content'] = 'video_view';
            $this->load->view('home_view', $data);
        } else {


            if ($this->session->userdata('usersid')) {
                $comment_v = $this->show_model->comment_v($this->session->userdata('usersid'));



                if ($comment_v) {
                    
                   echo 'thanks for comment ';
                   
                } 
        }
        
                }
    }

}



?>