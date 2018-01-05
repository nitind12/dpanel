<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Announcements extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('My_model_announcements', 'mmnws');
        $this->load->model('My_model', 'mm');
        if (! $this->session->userdata('ussr_')) {
            redirect(__BACKTOSITE__);
        }
        $this->checkMenuAuthentication();
    }

    function index() {
        $data['user___'] = $this->session->userdata('ussr_');
        $data['news_'] = $this->mmnws->get_all_news();
        $data['news_d'] = $this->mmnws->get_all_news_deactive();
        $data['menu'] = $this->mm->get_menu($this->session->userdata('stss_'));
        $data['wallpaper_'] = '';

        $this->load->view('templates/header', $data);
        $this->load->view('announcements', $data);
        $this->load->view('templates/footer');
    }

    function edit_($id__) {
        $data['record_'] = $this->mmnws->get_news_events_for_edit($id__);

        $data['user___'] = $this->session->userdata('ussr_');
        $data['news_'] = $this->mmnws->get_all_news();
        $data['news_d'] = $this->mmnws->get_all_news_deactive();
        $data['menu'] = $this->mm->get_menu($this->session->userdata('stss_'));
        $data['edit_page_heading'] = 'Update Announcement';
        $data['edit_page'] = "announcements/editannounce";
        $data['view1'] = "announcements/viewannounce_active";
        $data['view2'] = "announcements/viewannounce_deactive";
        $data['wallpaper_'] = '';

        $this->load->view('templates/header', $data);
        $this->load->view('editupcoming', $data);
        $this->load->view('templates/footer');
    }

    function update_($id__) {
        $res_ = $this->mmnws->updateNews_($id__);
        $this->session->set_flashdata('feed_msg_', $res_['msg_']);
        redirect('announcements/edit_/' . $id__);
    }

    function active_deactive_($id_, $status_) {
        $res_ = $this->mmnws->active_deactive_news($id_, $status_);
        if ($res_ == TRUE) {
            if ($status_ == 1) {
                $this->session->set_flashdata('error_msg_', 'Record Activated Successfully');
            } else {
                $this->session->set_flashdata('error_msg_', 'Record Events Deactivated Successfully');
            }
        } else {
            $this->session->set_flashdata('error_msg_', 'Something went wrong. Please try again !!');
        }
        redirect('announcements');
    }

    function feedannouncements() {
        $res_ = $this->mmnws->feedNews_();
        $this->session->set_flashdata('feed_msg_', $res_['msg_']);
        redirect('announcements');
    }

    function delete_($id_) {
        $res_ = $this->mmnws->delete_news_events($id_);
        if ($res_ == TRUE) {
            $this->session->set_flashdata('error_msg_', 'Record Deleted Successfully');
        } else {
            $this->session->set_flashdata('error_msg_', 'Something went wrong. Please try again !!');
        }
        redirect('announcements');
    }

    function delete_attachment($id__) {
        $res_ = $this->mmnws->delete_attach_news($id__);

        if ($res_ == TRUE) {
            $this->session->set_flashdata('error_msg_', 'Attachment Deleted Successfully');
        } else {
            $this->session->set_flashdata('error_msg_', 'Something went wrong. Please try again !!');
        }
        redirect('announcements');
    }
    function checkMenuAuthentication(){
        if($this->mm->my_menu($this->session->userdata('stss_'), 'announcements') == false){
            redirect('dashboard');
        }
    }
}