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

    function show_v_id2() {
        $usersid = $this->uri->segment(3);
        $data['usersvideo'] = $this->show_model->show_video();
        $data['single_video'] = $this->show_model->show_v_id($usersid);
      
        
        $data['usersvideocomment'] = $this->show_model->show_comment();
        $data['s_video'] = $this->show_model->show_v_id3($usersvideoid);
        $this->load->view('users1_view', $data);
    }
    


    
    function delete_video($id) {

        $this->show_model->delete_video($id);
        echo'you have delete your video .<br><a href= http://[::1]/ci4/index.php/home>go back</a>';
    }
    
     function delete_comment($id) {

        $this->show_model->delete_comment($id);
        echo 'you have delete the  .<br><a href= http://[::1]/ci4/index.php/show/show_v_id1/id>go back</a>';
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
                    
                    redirect(show/show_v_id1/$usersvideoid);
                } else {
                    redirect('comment/comment_v');
                }
            } else {
                redirect('show/show_v_id1/$usersvideoid');
            }
        }
    }

}



?>