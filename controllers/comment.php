<?php

class Comment extends CI_Controller {

    public function comment_v() {

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('comment', 'Comment', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'errors' => '<div class="bg-danger">' . validation_errors() . '</div>'
            );


            $data['content'] = 'comment_view';
            $this->load->view('home_view', $data);
        } else {

            $comment_v = $this->show_model->comment_v($this->session->userdata('usersid'));
            if ($comment_v) {
                $this->session->set_flashdata('register_succed', '<div class="bg_sucsess">you  commented</div>');
                redirect(home);
            } else {
                redirect('comment/comment_v');
            }
        }
    }

}

?>