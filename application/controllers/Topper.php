<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Topper extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('My_model_toppers', 'mmtprs');
        $this->load->model('My_model', 'mm');
        if (! $this->session->userdata('ussr_')) {
            redirect(__BACKTOSITE__);
        }
        $this->checkMenuAuthentication();
	}

	function index(){
		$data['user___'] = $this->session->userdata('ussr_');
        $data['toppers'] = $this->mmtprs->get_all_toppers();
        $data['toppers_d'] = $this->mmtprs->get_all_toppers_deactive();
        $data['wallpaper_'] = '';
        $data['menu'] = $this->mm->get_menu($this->session->userdata('stss_'));

        $this->load->view('templates/header', $data);
        $this->load->view('topper', $data);
        $this->load->view('templates/footer');
	}

	function feedtoppers(){
		$res_ = $this->mmtprs->feedtoppers();
        $this->session->set_flashdata('feed_msg_', $res_['msg_']);
        redirect('topper');

	}
	function checkMenuAuthentication(){
        if($this->mm->my_menu($this->session->userdata('stss_'), 'topper') == false){
            redirect('dashboard');
        }
    }

    function active_deactive_toppers($id_, $status_){
    	$res_ = $this->mmtprs->active_deactive_toppers($id_, $status_);
        if ($res_ == TRUE) {
            if ($status_ == 1) {
                $this->session->set_flashdata('error_msg_', 'Toppers Activated Successfully');
            } else {
                $this->session->set_flashdata('error_msg_', 'Toppers Deactivated Successfully');
            }
        } else {
            $this->session->set_flashdata('error_msg_', 'Something went wrong. Please try again !!');
        }
        redirect('topper');
    }

    function edit_topper($id__){
    	$data['record_'] = $this->mmtprs->get_topper_for_edit($id__);

        $data['user___'] = $this->session->userdata('ussr_');
        $data['toppers'] = $this->mmtprs->get_all_toppers();
        $data['toppers_d'] = $this->mmtprs->get_all_toppers_deactive();
        $data['menu'] = $this->mm->get_menu($this->session->userdata('stss_'));
        $data['edit_page_heading'] = 'Update Toppers';
        $data['edit_page'] = "toppers/edittopper";
        $data['view1'] = "toppers/viewtopper_active";
        $data['view2'] = "toppers/viewtopper_deactive";
        $data['wallpaper_'] = '';

        $this->load->view('templates/header', $data);
        $this->load->view('edit_topper', $data);
        $this->load->view('templates/footer');
    }
    function updateTopper($id__){
    	$res_ = $this->mmtprs->updateTopper($id__);
        $this->session->set_flashdata('feed_msg_', $res_['msg_']);
        redirect('topper/edit_topper/' . $id__);
    }
    function delete_attachment($id__){
    	$res_ = $this->mmtprs->delete_attach_topperphoto($id__);

        if ($res_ == TRUE) {
            $this->session->set_flashdata('error_msg_', 'News Attachment Deleted Successfully');
        } else {
            $this->session->set_flashdata('error_msg_', 'Something went wrong. Please try again !!');
        }
        redirect('topper');
    }
}