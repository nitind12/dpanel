<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_model_dwnlds extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function uploadDownloads() {
        $dTitle_ = $this->input->post('txtdTitle');
        $desc_ = $this->input->post('txtDesc');

        $this->db->where('TITLE', $dTitle_);
        //$this->db->or_where('ROLLNO', $rollno_);
        $query = $this->db->get('downloads');

        if ($query->num_rows() != 0) {
            $bool_ = array('res_' => FALSE, 'msg_' => 'Titled <b style="color:#0000ff">'.$dTitle_.'</b> was Already uploaded');
        } else {
            $data = array(
                'TITLE' => $dTitle_,
                'DESCRIPTION' => $desc_,
                'DATE_' => date('Y-m-d H:i:s'),
                'STATUS'	=> 1,
                'USERNAME' => $this->session->userdata('ussr_')
            );
            $query_ = $this->db->insert('downloads', $data);

            if ($query_ == TRUE) {
                $id__ = $this->db->insert_id();
                $path_ = $this->upload_downloads_file($id__);
                if ($path_ != 'x') {
                    $this->db->where('DWNLD_ID', $id__);
                    $data = array(
                        'PATH_' => $path_,
                    );
                    $query = $this->db->update('downloads', $data);

                    if ($query == TRUE) {
                        $bool_ = array('res_' => TRUE, 'msg_' => $dTitle_.' Uploaded Successfully !!');
                    } else {
                        $bool_ = array('res_' => FALSE, 'msg_' => $dTitle_.' record Updated succesfully but something went wrong in uploading file. Please update the '.$dTitle_.' copy immediately !!');
                    }
                } else {
                    $bool_ = array('res_' => FALSE, 'msg_' => $dTitle_.' record Updated succesfully but without file. Please update the '.$dTitle_.' copy immediately!!');
                }
            } else {
                $bool_ = array('res_' => FALSE, 'msg_' => 'Something goes wrong. Please try again !!');
            }
        }
        return $bool_;
    }

    function upload_downloads_file($id__) {
        $config1 = array(
            'upload_path' => './_assets_/downloads',
            'allowed_types' => 'jpg|png|bmp|gif|pdf|docx|doc',
            'overwrite' => TRUE,
            'file_name' => $id__
        );
        $file_element_name = 'txtInputFileDwnlds';
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

    function getDownload_data(){
        $query = $this->db->get('downloads');
        return $query->result();
    }

    function getDownload_data_active(){
        $this->db->where('STATUS', 1);
        $query = $this->db->get('downloads');
        return $query->result();
    }

    function getDownload_data_deactive(){
        $this->db->where('STATUS', 0);
        $query = $this->db->get('downloads');
        return $query->result();
    }

    function get_specific_Download_data($id__){
        $this->db->where('DWNLD_ID', $id__);
        $query = $this->db->get('downloads');
        return $query->row();
    }

    function update_Downloads($id__){
        $dTitle_ = $this->input->post('txtdTitle');
        $desc_ = $this->input->post('txtDesc');

        $this->db->where('TITLE', $dTitle_);
        $this->db->where('DWNLD_ID !=', $id__);
        $query = $this->db->get('downloads');
        
        if ($query->num_rows() != 0) {
            $bool_ = array('res_' => FALSE, 'msg_' => 'Titled <b style="color:#0000ff">'.$dTitle_.'</b> was Already uploaded');
        } else {
            $data = array(
                'TITLE' => $dTitle_,
                'DESCRIPTION' => $desc_,
                'DATE_' => date('Y-m-d H:i:s'),
                'USERNAME' => $this->session->userdata('ussr_')
            );
            $this->db->where('DWNLD_ID', $id__);
            $query_ = $this->db->update('downloads', $data);

            if ($query_ == TRUE) {
                $path_ = $this->upload_downloads_file($id__);
                if ($path_ != 'x') {
                    $data = array(
                        'PATH_' => $path_,
                    );
                    $this->db->where('DWNLD_ID', $id__);
                    $query = $this->db->update('downloads', $data);

                    if ($query == TRUE) {
                        $bool_ = array('res_' => TRUE, 'msg_' => $dTitle_.' Uploaded Successfully !!');
                    } else {
                        $bool_ = array('res_' => FALSE, 'msg_' => $dTitle_.' record Updated succesfully but something went wrong in uploading file. Please update the '.$dTitle_.' copy immediately !!');
                    }
                } else {
                    $bool_ = array('res_' => FALSE, 'msg_' => $dTitle_.' record Updated succesfully but without file. Please update the '.$dTitle_.' copy immediately!!');
                }
            } else {
                $bool_ = array('res_' => FALSE, 'msg_' => 'Something goes wrong. Please try again !!');
            }
        }
        return $bool_;
    }
    function delete_downloads($id__){
        $this->db->where('DWNLD_ID', $id__);
        $query = $this->db->get('downloads');

        if ($query->num_rows() != 0) {
            $item_ = $query->row();

            if ($item_->PATH_ != 'x') {
                $file__ = $item_->PATH_;
            } else {
                $file__ = 'x';
            }
            $mainID = $item_->DWNLD_ID;
        }
        $this->db->where('DWNLD_ID', $id__);
        $bool_ = $this->db->delete('downloads');
        if ($bool_ == TRUE) {
            if ($file__ != 'x') {
                $full_path_ = FCPATH . '_assets_/downloads/' . $file__;
                @unlink($full_path_);
            }
            $this->db->where('DWNLD_ID', $mainID);
            $bool_ = $this->db->delete('downloads');
        }
        return $bool_;
    }
}