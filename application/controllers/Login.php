<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('My_model', 'mm');
    }

    function index() {
        //$data['No-USER'] = $this->session->userdata('_ADMIN_');
        $data['wallpaper_'] = "background=".base_url('_assets_/images/bg.jpg');
        $this->load->view('templates/header', $data);
        $this->load->view('login');
        $this->load->view('templates/footer');
    }

    function sign_in_() {

        $res_ = $this->mm->login();

        if ($res_['bool_'] == TRUE) {
            $this->session->set_userdata('ussr_', $this->input->post('txtUsr'));
            $this->session->set_userdata('stss_', $res_['sts_']);
            $this->session->set_userdata('dept_', $res_['dept_']);
            $this->session->set_userdata('course_', $res_['course']);
            redirect('dashboard');
        } else {
            redirect('login');
        }
    }

    function log__out() {
        $this->session->unset_userdata('ussr_');
        $this->session->unset_userdata('stss_');

        redirect(__BACKTOSITE__);
    }

}
