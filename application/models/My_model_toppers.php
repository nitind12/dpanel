<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_model_toppers extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function feedtoppers() {
        $data = array(
            'SNAME' => $this->input->post('txtTopperName'),
            'MERIT_NAME' => $this->input->post('txtMerit'),
            'YOP' => $this->input->post('txtYOP'),
            'RANK' => $this->input->post('txtRank'),
            'PHOTO_' => 'x',
            'ANY_REMARK'=> $this->input->post('txtRemark'),
            'DOC' => date("Y-m-d h:i:s a"),
            'STATUS' => 1,
            'USERNAME' => $this->session->userdata('ussr_')
        );
        $query = $this->db->insert('toppers', $data);
        $id__ = $this->db->insert_id();

        $path_ = $this->upload_photo($id__, 'txtPhotoFile');

        if($path_ != 'x'){
        	$data = array(
                'PHOTO_' => $path_
            );
            $this->db->where('SNO', $id__);
            $query = $this->db->update('toppers', $data);
        }

        if ($query == TRUE) {
            if ($path_ != 'x') {
                $bool_ = array('res_' => TRUE, 'msg_' => 'Topper Feeded Successfully with uploaded file.');
            } else {
                $bool_ = array('res_' => TRUE, 'msg_' => 'Topper Feeded Successfully without any uploaded file.');
            }
        } else {
            $bool_ = array('res_' => TRUE, 'msg_' => 'Something went wrong. Please try again !!');
        }
        return $bool_;
    }


    function upload_photo($id__, $file_name) {
        $config1 = array(
            'upload_path' => './_assets_/toppers',
            'overwrite' => TRUE,
            'allowed_types' => 'jpg|png|gif',
            'file_name' => $id__
        );
        $file_element_name = $file_name;
        $this->load->library('upload', $config1);
        $this->upload->initialize($config1);

        if ($this->upload->do_upload($file_element_name)) {
            $path_ji = $this->upload->data();
            $path_ = $path_ji['file_name'];
        } else {
            $path_ = 'x';
        }
        return $path_;
    }

    function updateTopper($id__){
    	if($this->session->userdata('stss_') != 'adm') if($this->session->userdata('stss_') != 'adm') $this->db->where('USERNAME', $this->session->userdata('ussr_'));
        $this->db->where('SNO', $id__);
         $data = array(
            'SNAME' => $this->input->post('txtTopperName'),
            'MERIT_NAME' => $this->input->post('txtMerit'),
            'YOP' => $this->input->post('txtYOP'),
            'RANK' => $this->input->post('txtRank'),
            'ANY_REMARK'=> $this->input->post('txtRemark'),
            'DOC' => date("Y-m-d h:i:s a"),
            'USERNAME' => $this->session->userdata('ussr_')
        );
        $query = $this->db->update('toppers', $data);

        $path_ = $this->upload_photo($id__, 'txtPhotoFile');

        if ($path_ != 'x') {
            $data = array(
                'PHOTO_' => $path_
            );
            $this->db->where('SNO', $id__);
            $query = $this->db->update('toppers', $data);
        } else {
            $path_ = 'x';
        }

        if ($query == TRUE) {
            if ($path_ != 'x') {
                $bool_ = array('res_' => TRUE, 'msg_' => 'Record Updated Successfully with uploaded photo.');
            } else {
                $bool_ = array('res_' => TRUE, 'msg_' => 'Record Updated Successfully without any uploaded photo.');
            }
        } else {
            $bool_ = array('res_' => TRUE, 'msg_' => 'Something went wrong. Please try again !!');
        }
        return $bool_;
    }

    function delete_attach_topperphoto($id__){
    	$this->db->where('SNO', $id__);
        if($this->session->userdata('stss_') != 'adm') $this->db->where('USERNAME', $this->session->userdata('ussr_'));
        $query__ = $this->db->get('toppers');
        if ($query__->num_rows() != 0) {
            $item_ = $query__->row();

            if ($item_->PHOTO_ != 'x') {
                $file__ = $item_->PHOTO_;
            } else {
                $file__ = 'x';
            }
        }
        $data = array(
            'PHOTO_' => 'x'
        );
        $this->db->where('SNO', $id__);
        $query = $this->db->update('toppers', $data);
        if ($query == TRUE) {
            if ($file__ != 'x') {
                $full_path_ = FCPATH . '_assets_/toppers/' . $file__;
                @unlink($full_path_);
            }
        }
        return $query;
    }
    function get_topper_for_edit($id__){
    	$this->db->where('SNO', $id__);
        $query = $this->db->get('toppers');

        return $query->row();
    }


    function get_all_toppers() {
        if($this->session->userdata('stss_') != 'adm') $this->db->where('USERNAME', $this->session->userdata('ussr_'));
        $this->db->where('STATUS', 1);
        $this->db->order_by('SNO', 'desc');
        $query = $this->db->get('toppers');
        return $query->result();
    }

    function get_all_toppers_deactive() {
        if($this->session->userdata('stss_') != 'adm') $this->db->where('USERNAME', $this->session->userdata('ussr_'));
        $this->db->where('STATUS', 0);
        $this->db->order_by('SNO', 'desc');
        $query = $this->db->get('toppers');
        return $query->result();
    }

    function active_deactive_toppers($id_, $status_) {
        $this->db->where('SNO', $id_);
        if($this->session->userdata('stss_') != 'adm') $this->db->where('USERNAME', $this->session->userdata('ussr_'));
        $data = array(
            'STATUS' => $status_
        );
        $query = $this->db->update('toppers', $data);
        return $query;
    }

    function delete_news_toppers($id_) {
        if($this->session->userdata('stss_') != 'adm') $this->db->where('USERNAME', $this->session->userdata('ussr_'));
        $this->db->where('SNO', $id_);
        $query = $this->db->get('toppers');

        if ($query->num_rows() != 0) {
            $item_ = $query->row();

            if ($item_->PHOTO_ != 'x') {
                $file__ = $item_->PHOTO_;
            } else {
                $file__ = 'x';
            }
        }
        $this->db->where('SNO', $id_);
        $bool_ = $this->db->delete('toppers');
        if ($bool_ == TRUE) {
            if ($file__ != 'x') {
                $full_path_ = FCPATH . '_assets_/toppers/' . $file__;
                @unlink($full_path_);
            }
        }
        return $bool_;
    }

    function delete_attach_toppers($id__) {
        $this->db->where('SNO', $id__);
        if($this->session->userdata('stss_') != 'adm') $this->db->where('USERNAME', $this->session->userdata('ussr_'));
        $query__ = $this->db->get('toppers');
        if ($query__->num_rows() != 0) {
            $item_ = $query__->row();

            if ($item_->PHOTO_ != 'x') {
                $file__ = $item_->PHOTO_;
            } else {
                $file__ = 'x';
            }
        }
        $data = array(
            'PHOTO_' => 'x'
        );
        $this->db->where('SNO', $id__);
        $query = $this->db->update('toppers', $data);
        if ($query == TRUE) {
            if ($file__ != 'x') {
                $full_path_ = FCPATH . '_assets_/toppers/' . $file__;
                @unlink($full_path_);
            }
        }
        return $query;
    }
}