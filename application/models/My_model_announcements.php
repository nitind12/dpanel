<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_model_announcements extends CI_Model {

    function __construct() {
        parent::__construct();
    }

	function feedNews_() {
        $data = array(
            'SUBJECT' => $this->input->post('txtSubject'),
            'ANNOUNCEMENT' => $this->input->post('txtNews'),
            'PATH_ATTACH' => 'x',
            'DATE_' => date('d/m/Y'),
            'DATE_START'=> $this->input->post('txtStartDate'),
            'DATE_END'=> $this->input->post('txtEndDate'),
            'TIME_' => date("h:i:sa"),
            'STATUS' => 1,
            'USERNAME' => $this->session->userdata('ussr_')
        );
        $query = $this->db->insert('announcements', $data);
        $id__ = $this->db->insert_id();

        $config = array(
            'upload_path' => './_assets_/announcements',
            'overwrite' => TRUE,
            'allowed_types' => 'doc|docx|pdf|jpg|png',
            'file_name' => $id__
        );

        $file_element_name = 'txtInputFile';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload($file_element_name)) {
            $path_ji = $this->upload->data();

            $path_ = $path_ji['file_name'];

            $data = array(
                'PATH_ATTACH' => $path_
            );
            $this->db->where('ID', $id__);
            $query = $this->db->update('announcements', $data);
        } else {
            $path_ = 'x';
        }

        if ($query == TRUE) {
            if ($path_ != 'x') {
                $bool_ = array('res_' => TRUE, 'msg_' => 'Record Feeded Successfully with uploaded file.');
            } else {
                $bool_ = array('res_' => TRUE, 'msg_' => 'Record Feeded Successfully without any uploaded file.');
            }
        } else {
            $bool_ = array('res_' => TRUE, 'msg_' => 'Something went wrong. Please try again !!');
        }
        return $bool_;
    }

    function get_news_events_for_edit($id__) {
        $this->db->where('ID', $id__);
        $query = $this->db->get('announcements');

        return $query->row();
    }

    function updateNews_($id__) {
        if($this->session->userdata('stss_') != 'adm') $this->db->where('USERNAME', $this->session->userdata('ussr_'));
        $this->db->where('ID', $id__);
        $data = array(
            'SUBJECT' => $this->input->post('txtSubject'),
            'ANNOUNCEMENT' => $this->input->post('txtNews'),
            'DATE_' => date('d/m/Y'),
            'DATE_START'=> $this->input->post('txtStartDate'),
            'DATE_END'=> $this->input->post('txtEndDate'),
            'TIME_' => date("h:i:sa"),
        );
        $query = $this->db->update('announcements', $data);

        $config = array(
            'upload_path' => './_assets_/announcements',
            'overwrite' => TRUE,
            'allowed_types' => 'doc|docx|pdf|jpg|png',
            'file_name' => $id__
        );
        $file_element_name = 'txtInputFile';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload($file_element_name)) {
            $path_ji = $this->upload->data();
            $path_ = $path_ji['file_name'];

            $data = array(
                'PATH_ATTACH' => $path_
            );
            $this->db->where('ID', $id__);
            $query = $this->db->update('announcements', $data);
        } else {
            $path_ = 'x';
        }

        if ($query == TRUE) {
            if ($path_ != 'x') {
                $bool_ = array('res_' => TRUE, 'msg_' => 'Record Updated Successfully with uploaded file.');
            } else {
                $bool_ = array('res_' => TRUE, 'msg_' => 'Record Updated Successfully without any uploaded file.');
            }
        } else {
            $bool_ = array('res_' => TRUE, 'msg_' => 'Something went wrong. Please try again !!');
        }
        return $bool_;
    }

    function get_latest_news($limit_) {
        if($this->session->userdata('stss_') != 'adm') $this->db->where('USERNAME', $this->session->userdata('ussr_'));
        $this->db->where('STATUS', 1);
        $this->db->order_by('ID', 'desc');
        $query = $this->db->get('announcements', 0, $limit_);
        return $query->result();
    }

    function get_all_news() {
        if($this->session->userdata('stss_') != 'adm') $this->db->where('USERNAME', $this->session->userdata('ussr_'));
        $this->db->where('STATUS', 1);
        $this->db->order_by('ID', 'desc');
        $query = $this->db->get('announcements');
        return $query->result();
    }

    function get_all_news_deactive() {
        if($this->session->userdata('stss_') != 'adm') $this->db->where('USERNAME', $this->session->userdata('ussr_'));
        $this->db->where('STATUS', 0);
        $this->db->order_by('ID', 'desc');
        $query = $this->db->get('announcements');
        return $query->result();
    }

    function active_deactive_news($id_, $status_) {
        if($this->session->userdata('stss_') != 'adm') $this->db->where('USERNAME', $this->session->userdata('ussr_'));
        $this->db->where('ID', $id_);
        $data = array(
            'STATUS' => $status_
        );
        $query = $this->db->update('announcements', $data);
        return $query;
    }

    function delete_news_events($id_) {
        if($this->session->userdata('stss_') != 'adm') $this->db->where('USERNAME', $this->session->userdata('ussr_'));
        $this->db->where('ID', $id_);
        $query = $this->db->get('announcements');

        if ($query->num_rows() != 0) {
            $item_ = $query->row();

            if ($item_->PATH_ATTACH != 'x') {
                $file__ = $item_->PATH_ATTACH;
            } else {
                $file__ = 'x';
            }
        }
        $this->db->where('ID', $id_);
        $bool_ = $this->db->delete('announcements');
        if ($bool_ == TRUE) {
            if ($file__ != 'x') {
                $full_path_ = FCPATH . '_assets_/announcements/' . $file__;
                @unlink($full_path_);
            }
        }
        return $bool_;
    }

    function delete_attach_news($id__) {
        if($this->session->userdata('stss_') != 'adm') $this->db->where('USERNAME', $this->session->userdata('ussr_'));
        $this->db->where('ID', $id__);
        $query__ = $this->db->get('announcements');
        if ($query__->num_rows() != 0) {
            $item_ = $query__->row();

            if ($item_->PATH_ATTACH != 'x') {
                $file__ = $item_->PATH_ATTACH;
            } else {
                $file__ = 'x';
            }
        }
        $data = array(
            'PATH_ATTACH' => 'x'
        );
        $this->db->where('ID', $id__);
        $query = $this->db->update('announcements', $data);
        if ($query == TRUE) {
            if ($file__ != 'x') {
                $full_path_ = FCPATH . '_assets_/announcements/' . $file__;
                @unlink($full_path_);
            }
        }
        return $query;
    }
}