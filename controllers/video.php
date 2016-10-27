<?php

class Video extends CI_Controller {

        
    //function upload video
    public function upload() {
 if ($this->session->userdata('usersid')) {
        $this->form_validation->set_rules('video_name', 'Video_name', 'trim|required');
        $this->form_validation->set_rules('video', 'Video', 'trim|required');



        if ($this->form_validation->run() == FALSE) {


            $data = array(
                'errors' => '<div class="bg-danger">' . validation_errors() . '</div>'
            );


            $data['content'] = 'upload_view';
            $this->load->view('home_view', $data);
        } else {


            if ($this->session->userdata('usersid')) {
                $video_upload = $this->user_model->upload_video($this->session->userdata('usersid'));



                if ($video_upload) {
                    $this->session->set_flashdata('register_succed', '<div class="bg_sucsess">you have been successfuly upload</div>');
                    redirect(home);
                } else {
                    redirect('video/upload');
                }
            } else {
                redirect('home');
            }
        }
   
 }else{
     redirect('home');
 }   
 }
}

?>