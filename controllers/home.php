<?php

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');        /*         * LOADING HELPER TO AVOID PHP ERROR *** */
        $this->load->model('show_model');
    }

    public function index() {
        $data['content'] = 'login_view.php';
        $this->load->view('home_view', $data);
        $usersid = $this->session->userdata('usersid');
        $data['usersvideo'] = $this->show_model->show_video();
        $data['single_video'] = $this->show_model->show_v_id2($usersid);
       
        $this->load->view('users1_view', $data);
    }

}
