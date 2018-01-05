<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Faculty extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('My_model_faculties', 'mmf');
        $this->load->model('My_model', 'mm');
        if (! $this->session->userdata('ussr_')) {
            redirect(__BACKTOSITE__);
        }
        $this->checkMenuAuthentication();
    }

    function index(){
        $data['user___'] = $this->session->userdata('ussr_');
        $data['faculties'] = $this->mmf->get_active_faculties($this->session->userdata('course_'));     
        $data['menu'] = $this->mm->get_menu($this->session->userdata('stss_'));   
        $data['folder_'] = 'faculties';
        $data['page__'] = 'updatefaculties';
        $data['page_head'] = 'Manage Faculty Profile';       

        $data['wallpaper_'] = '';
        $data['innerst'] ='1';
        
        $this->load->view('templates/header', $data);
        $this->load->view('inner', $data);
        $this->load->view('templates/footer');
    }
        
    function sequence(){
        $data['user___'] = $this->session->userdata('ussr_');
        $data['faculties'] = $this->mmf->get_active_faculties($this->session->userdata('course_'));     
        $data['menu'] = $this->mm->get_menu($this->session->userdata('stss_'));   
        $data['folder_'] = 'faculties';
        $data['page__'] = 'updatefacultysequence';
        $data['page_head'] = 'Manage Faculty Sequence';       

        $data['wallpaper_'] = '';
        $data['innerst'] ='1';
        
        $this->load->view('templates/header', $data);
        $this->load->view('inner', $data);
        $this->load->view('templates/footer');
    }
    function getActiveFaculty($course){
        $res = $this->mmf->get_active_faculties($course);
        echo json_encode($res);
    }
    function getFaculty($id_) {
        $res = $this->mmf->getmgetFaculty($id_);
        echo ($res);
    }
    function changesequence(){
        $data = $this->mmf->changesequence();
        echo json_encode($data);
    }
    function updateFaculty(){
        $res_ = $this->mmf->mupdateFaculty();

        $this->session->set_flashdata('feed_msg_', $res_['msg_']);
        redirect('faculty');
    }

    function checkMenuAuthentication(){
        if($this->mm->my_menu($this->session->userdata('stss_'), 'faculty') == false){
            redirect('dashboard');
        }
    }
        
}