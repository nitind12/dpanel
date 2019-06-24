<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Offers extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('my_model_offer', 'mmo');
        $this->load->model('My_model', 'mm');
        if (! $this->session->userdata('ussr_')) {
            redirect(__BACKTOSITE__);
        }
        $this->checkMenuAuthentication();
    }

    function index() {
        $data['user___'] = $this->session->userdata('ussr_');
        $data['offers_'] = $this->mmo->get_all_offers();
        $data['offers_d'] = $this->mmo->get_all_offers_deactive();
        $data['wallpaper_'] = '';
        $data['menu'] = $this->mm->get_menu($this->session->userdata('stss_'));

        $this->load->view('templates/header', $data);
        $this->load->view('offer', $data);
        $this->load->view('templates/footer');
    }

    function edit_offers($id__) {
        $data['record_'] = $this->mmo->get_offers_for_edit($id__);

        $data['user___'] = $this->session->userdata('ussr_');
        $data['offers_'] = $this->mmo->get_all_offers();
        $data['offers_d'] = $this->mmo->get_all_offers_deactive();
        $data['menu'] = $this->mm->get_menu($this->session->userdata('stss_'));
        $data['edit_page_heading'] = 'Update Offers';
        $data['edit_page'] = "offers/editoffers";
        $data['view1'] = "offers/viewoffers_active";
        $data['view2'] = "offers/viewoffers_deactive";
        $data['wallpaper_'] = '';

        $this->load->view('templates/header', $data);
        $this->load->view('edit', $data);
        $this->load->view('templates/footer');
    }

    function updateOffers($id__) {
        $res_ = $this->mmo->updateOffers_($id__);
        $this->session->set_flashdata('feed_msg_', $res_['msg_']);
        redirect('offers/edit_offers/' . $id__);
    }

    function active_deactive_offers($id_, $status_) {
        $res_ = $this->mmo->active_deactive_offers($id_, $status_);
        if ($res_ == TRUE) {
            if ($status_ == 1) {
                $this->session->set_flashdata('error_msg_', 'Offers Activated Successfully');
            } else {
                $this->session->set_flashdata('error_msg_', 'Offers Deactivated Successfully');
            }
        } else {
            $this->session->set_flashdata('error_msg_', 'Something went wrong. Please try again !!');
        }
        redirect('offers');
    }

    function feedOffers(){
    	$res_ = $this->mmo->feedOffers_();
        $this->session->set_flashdata('feed_msg_', $res_['msg_']);
        redirect('offers');
    }

    function delete_offers($id_) {
        $res_ = $this->mmo->delete_offer($id_);
        if ($res_ == TRUE) {
            $this->session->set_flashdata('error_msg_', 'Offers Deleted Successfully');
        } else {
            $this->session->set_flashdata('error_msg_', 'Something went wrong. Please try again !!');
        }
        redirect('offers');
    }

    function delete_attachment($id__) {
        $res_ = $this->mmo->delete_attach_offers($id__);

        if ($res_ == TRUE) {
            $this->session->set_flashdata('error_msg_', 'Offers Attachment Deleted Successfully');
        } else {
            $this->session->set_flashdata('error_msg_', 'Something went wrong. Please try again !!');
        }
        redirect('offers');
    }
    
    function checkMenuAuthentication(){
        if($this->mm->my_menu($this->session->userdata('stss_'), 'offers') == false){
            redirect('dashboard');
        }
    }

}