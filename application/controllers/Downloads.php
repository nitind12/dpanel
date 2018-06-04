<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Downloads extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('My_model_dwnlds', 'md');
        $this->load->model('My_model', 'mm');
        if (! $this->session->userdata('ussr_')) {
            redirect(__BACKTOSITE__);
        }
    }

    function index($limit=-1, $year__='x'){

        if($year__ == 'x'){ $year__=date('Y'); }
    	
        $data['user___'] = $this->session->userdata('ussr_');
        $data['dwnldsData'] = $this->md->getDownload_data();
        $data['menu'] = $this->mm->get_menu($this->session->userdata('stss_'));
        $data['innerst'] ='0';
        $data['thisYear'] = $year__;
        $data['limit_'] = $limit;
        $data['folder_'] = 'downloads';
        $data['page__'] = 'feed-downloads';
        $data['page_head'] = 'Upload &amp; Manage Downloads';
        $data['view1'] = 'viewadwnlds_';
        $data['wallpaper_'] = '';
        $this->load->view('templates/header', $data);
        $this->load->view('inner', $data);
        $this->load->view('templates/footer');
    }
    function uploadDownloads(){
        $res_ = $this->md->uploadDownloads();
        $this->session->set_flashdata('feed_msg_', $res_['msg_']);

        redirect('downloads');
    }
    
    function edit_Downloads($id__){
        
        $data['user___'] = $this->session->userdata('ussr_');
        $data['dwnldsEditData'] = $this->md->get_specific_Download_data($id__);
        $data['dwnldsData'] = $this->md->getDownload_data();
        $data['menu'] = $this->mm->get_menu($this->session->userdata('stss_'));

        $data['innerst'] ='0';
        $data['folder_'] = 'downloads';
        $data['page__'] = 'edit-downloads';
        $data['page_head'] = 'Update Downloads';
        $data['view1'] = 'viewadwnlds_';    
        $data['wallpaper_'] = '';

        $this->load->view('templates/header', $data);
        $this->load->view('inner', $data);
        $this->load->view('templates/footer');
    }
    function updateDownloads($id_){
        $res_ = $this->md->update_Downloads($id_);
        $this->session->set_flashdata('feed_msg_', $res_['msg_']);

        redirect('downloads/edit_downloads/' . $id_);
    }
    function delete_downloads($id__){
        $res_ = $this->md->delete_downloads($id__);
        if($res_ == TRUE){
            $this->session->set_flashdata('feed_msg_', 'File deleted successfully.');
        } else {
            $this->session->set_flashdata('feed_msg_', 'Something goes wrong. Try again !!');
        }

        redirect('downloads');
    }
}