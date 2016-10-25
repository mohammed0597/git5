<?php

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('show_model');
    }

    public function index() {

        $data['users'] = $this->user_model->get_users();
        $this->load->view('users_view', $data);
    }

    public function login() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[15]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[7]|max_length[20]');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'errors' => validation_errors()
            );
            $this->session->set_flashdata($data);
            redirect('home');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $id = $this->user_model->user_login($username, $password);
            if ($id) {
                $data = array(
                    'id' => $id,
                    'username' => $username,
                    'logged_in' => true
                );
                $this->session->set_userdata('usersid', $id);



                $this->session->set_userdata($data);

                $this->session->set_flashdata('login_succed', 'you are now logged in');
                redirect('home ');
            } else {
                $this->session->set_flashdata('login_failed', 'Username or password is incorrect');
                redirect('home');
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('home');
    }

    public function register() {

        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[15]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[7]|max_length[20]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[7]|max_length[20]|matches[password]');



        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'errors' => '<div class="bg-danger">' . validation_errors() . '</div>'
            );
            $this->session->set_flashdata($data);
            $data['content'] = 'register_view';
            $this->load->view('home_view', $data);
        } else {
            $user_register = $this->user_model->register_user();
            if ($user_register) {
                $this->session->set_flashdata('register_succed', '<div class="bg_sucsess">you have been successfuly register, you can login</div>');
                redirect('home');
            } else {
                redirect('user/register');
            }
        }
    }

}
