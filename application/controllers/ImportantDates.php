<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ImportantDates extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('My_model_imp_dates', 'mid');
        $this->load->model('My_model', 'mm');
        if (! $this->session->userdata('ussr_')) {
            redirect(__BACKTOSITE__);
        }
	}

	function index(){
        $this->check_login();
        $data['user___'] = $this->session->userdata('ussr_');
        $data['impDateData'] = $this->mid->getAllImpDates();
        $data['menu'] = $this->mm->get_menu($this->session->userdata('stss_'));
        $data['innerst'] ='0';
        $data['folder_'] = 'importantDates';
        $data['page__'] = 'feed-dates';
        $data['page_head'] = 'Manage Important Dates';
        $data['view1'] = 'viewaImpDates';
        $data['wallpaper_'] = '';
        $this->load->view('templates/header', $data);
        $this->load->view('inner', $data);
        $this->load->view('templates/footer');
	}

	function feed(){
        $this->check_login();
        if($this->input->post('imp_submit') == 'submit'){
            $res_ = $this->mid->feedImpDates();
        } else {
            $res_ = $this->mid->updateImpDates();
        }
        $this->session->set_flashdata('feed_msg_', $res_['msg_']);

        redirect('ImportantDates');
	}

	function edit_dates(){
        $this->check_login();
        $data['row'] = $this->mid->getDatesData();
        echo json_encode($data);
	}

	function delete_dates(){
        $this->check_login();
		$res_ = $this->mid->delDatesData();
        $this->session->set_flashdata('feed_msg_', $res_['record']);
        redirect('ImportantDates');
	}

    function active_deactive($imptid, $status){
        $this->mid->active_deactive($imptid, $status);
        redirect('ImportantDates');
    }
    function check_login(){
        if(! $this -> session -> userdata('ussr_')) redirect('login/log__out');
    }
}
