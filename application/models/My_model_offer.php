<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_model_offer extends CI_Model {

    function __construct() {
        parent::__construct();
    }

	function feedOffers_() {
        $data = array(
            'SUBJECT' => $this->input->post('txtSubject'),
            'OFFERS' => $this->input->post('txtOffers'),
            'PATH_ATTACH' => 'x',
            'FONTJI' => 'Arial',
            'DATE_' => date('d/m/Y'),
            'DATE_START'=> $this->input->post('txtStartDate'),
            'DATE_END'=> $this->input->post('txtEndDate'),
            'TIME_' => date("h:i:sa"),
            'STATUS' => 1,
            'USERNAME' => $this->session->userdata('ussr_')
        );
        $query = $this->db->insert('offers', $data);
        $id__ = $this->db->insert_id();

        $config = array(
            'upload_path' => './_assets_/offers',
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
            $query = $this->db->update('offers', $data);
        } else {
            $path_ = 'x';
        }

        if ($query == TRUE) {
            if ($path_ != 'x') {
                $bool_ = array('res_' => TRUE, 'msg_' => 'Offer Feeded Successfully with uploaded file.');
            } else {
                $bool_ = array('res_' => TRUE, 'msg_' => 'Offer Feeded Successfully without any uploaded file.');
            }
        } else {
            $bool_ = array('res_' => TRUE, 'msg_' => 'Something went wrong. Please try again !!');
        }
        return $bool_;
    }

    function get_offers_for_edit($id__) {
        $this->db->where('ID', $id__);
        $query = $this->db->get('offers');

        return $query->row();
    }

    function updateOffers_($id__) {
        if($this->session->userdata('stss_') != 'adm') if($this->session->userdata('stss_') != 'adm') $this->db->where('USERNAME', $this->session->userdata('ussr_'));
        $this->db->where('ID', $id__);
        $data = array(
            'SUBJECT' => $this->input->post('txtSubject'),
            'OFFERS' => $this->input->post('txtOffers'),
            'FONTJI' => 'Arial',
            'DATE_' => date('d/m/Y'),
            'DATE_START'=> $this->input->post('txtStartDate'),
            'DATE_END'=> $this->input->post('txtEndDate'),
            'TIME_' => date("h:i:sa"),
        );
        $query = $this->db->update('offers', $data);

        $config = array(
            'upload_path' => './_assets_/offers',
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
            $query = $this->db->update('offers', $data);
        } else {
            $path_ = 'x';
        }

        if ($query == TRUE) {
            if ($path_ != 'x') {
                $bool_ = array('res_' => TRUE, 'msg_' => 'Offer Updated Successfully with uploaded file.');
            } else {
                $bool_ = array('res_' => TRUE, 'msg_' => 'Offer Updated Successfully without any uploaded file.');
            }
        } else {
            $bool_ = array('res_' => TRUE, 'msg_' => 'Something went wrong. Please try again !!');
        }
        return $bool_;
    }

    function get_latest_offers($limit_) {
        if($this->session->userdata('stss_') != 'adm') $this->db->where('USERNAME', $this->session->userdata('ussr_'));
        $this->db->where('STATUS', 1);
        $this->db->order_by('ID', 'desc');
        $query = $this->db->get('offers', 0, $limit_);
        return $query->result();
    }

    function get_all_offers() {
        if($this->session->userdata('stss_') != 'adm') $this->db->where('USERNAME', $this->session->userdata('ussr_'));
        $this->db->where('STATUS', 1);
        $this->db->order_by('ID', 'desc');
        $query = $this->db->get('offers');
        return $query->result();
    }

    function get_all_offers_deactive() {
        if($this->session->userdata('stss_') != 'adm') $this->db->where('USERNAME', $this->session->userdata('ussr_'));
        $this->db->where('STATUS', 0);
        $this->db->order_by('ID', 'desc');
        $query = $this->db->get('offers');
        return $query->result();
    }

    function active_deactive_offers($id_, $status_) {
        $this->db->where('ID', $id_);
        if($this->session->userdata('stss_') != 'adm') $this->db->where('USERNAME', $this->session->userdata('ussr_'));
        $data = array(
            'STATUS' => $status_
        );
        $query = $this->db->update('offers', $data);
        return $query;
    }

    function delete_offer($id_) {
        if($this->session->userdata('stss_') != 'adm') $this->db->where('USERNAME', $this->session->userdata('ussr_'));
        $this->db->where('ID', $id_);
        $query = $this->db->get('offers');

        if ($query->num_rows() != 0) {
            $item_ = $query->row();

            if ($item_->PATH_ATTACH != 'x') {
                $file__ = $item_->PATH_ATTACH;
            } else {
                $file__ = 'x';
            }
        }
        $this->db->where('ID', $id_);
        $bool_ = $this->db->delete('offers');
        if ($bool_ == TRUE) {
            if ($file__ != 'x') {
                $full_path_ = FCPATH . '_assets_/offers/' . $file__;
                @unlink($full_path_);
            }
        }
        return $bool_;
    }

    function delete_attach_offers($id__) {
        $this->db->where('ID', $id__);
        if($this->session->userdata('stss_') != 'adm') $this->db->where('USERNAME', $this->session->userdata('ussr_'));
        $query__ = $this->db->get('offers');
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
        $query = $this->db->update('offers', $data);
        if ($query == TRUE) {
            if ($file__ != 'x') {
                $full_path_ = FCPATH . '_assets_/offers/' . $file__;
                @unlink($full_path_);
            }
        }
        return $query;
    }
}