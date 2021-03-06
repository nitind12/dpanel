<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class C_pwd extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('My_model', 'mm');
        if (! $this->session->userdata('ussr_')) {
            redirect(__BACKTOSITE__);
        }
    }

    function index(){
        $data['user___'] = $this->session->userdata('ussr_');
        $data['wallpaper_'] = '';
        
        $this->load->view('templates/header', $data);
        $this->load->view('c_pwd/index', $data);
        $this->load->view('templates/footer');
    }
    
    function changepwd(){
        if($this->session->userdata('pwd_count')){
            $cnt_ = $this->session->userdata('pwd_count');
            $this->session->set_userdata('pwd_count', ++$cnt_);
        } else {
            $this->session->set_userdata('pwd_count', 1);
        }
        $res = $this->mm->changepwd();
        echo $res['msg_'];
    }
}
