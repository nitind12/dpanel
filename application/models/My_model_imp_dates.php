<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_model_imp_dates extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function feedImpDates(){
    	$data = array(
    		'IMP_DATE_EVENT'=>$this->input->post('txtEvent'),
    		'IMP_DATE'=>$this->input->post('txtImpDate'),
    		'DESC_'=>$this->input->post('txtDesc'),
    		'PATH_'=>'x',
    		'DATE_'=> date('Y-m-d H:i:s'),
    		'STATUS_'=>1,
    		'USERNAME'=>$this->session->userdata('ussr_')
    	);
    	if($this->db->insert('importantdates', $data) == true){
            $id_ = $this->db->insert_id();
            $path_ = $this->upload_downloads_file($id_);
            if($path_ != 'x'){
                $data = array(
                        'PATH_' => $path_
                );
                $this->db->where('IMPDTID', $id_);
                if($this->db->update('importantdates', $data) == true){
                    $bool_ = array('res_'=>TRUE, 'msg_' => 'Record Sucessfully added.');
                } else {
                    $bool_ = array('res_'=>TRUE, 'msg_' => 'Record Sucessfully added without uploading file.');
                }
            } else {
                $bool_ = $bool_ = array('res_'=>TRUE, 'msg_' => 'Record Sucessfully added without uploading file.');
            }
    	} else {
    		$bool_ = array('res_'=>FALSE, 'msg_' => 'Some server error. Please try again!!!');
    	}
    	return $bool_;
    }

    function updateImpDates(){
        $data = array(
            'IMP_DATE_EVENT'=>$this->input->post('txtEvent'),
            'IMP_DATE'=>$this->input->post('txtImpDate'),
            'DESC_'=>$this->input->post('txtDesc'),
            'DATE_'=> date('Y-m-d H:i:s'),
            'USERNAME'=>$this->session->userdata('ussr_')
        );
        $id_ = $this->input->post('id');
        $this->db->where('IMPDTID', $id_);
        if($this->db->update('importantdates', $data) == true){
            $path_ = $this->upload_downloads_file($id_);
            if($path_ != 'x'){
                $data = array(
                        'PATH_' => $path_
                );
                $this->db->where('IMPDTID', $id_);
                if($this->db->update('importantdates', $data) == true){
                    $data = array(
                        'PATH_' => $path_
                    );
                    $bool_ = array('res_'=>TRUE, 'msg_' => 'Record Sucessfully updated.');
                } else {
                    $bool_ = array('res_'=>TRUE, 'msg_' => 'Record Sucessfully updated without uploading file.');
                }
            } else {
                $bool_ = array('res_'=>TRUE, 'msg_' => 'Record Sucessfully updated without uploading file.');
            }
        } else {
            $bool_ = array('res_'=>FALSE, 'msg_' => 'Some server error. Please try again!!!');
        }
        return $bool_;
    }

    function upload_downloads_file($id__) {
        $config1 = array(
            'upload_path' => './_assets_/impDatesFiles',
            'allowed_types' => 'jpg|png|bmp|gif|pdf',
            'overwrite' => TRUE,
            'file_name' => $id__
        );
        $file_element_name = 'txtInputFileImpDate';
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

    function getActiveImpDates(){
    	$this->db->where('STATUS_', 1);
    	$query = $this->db->get('importantdates');
    	return $query->result();
    }

    function getAllImpDates(){
    	$query = $this->db->get('importantdates');
    	return $query->result();
    }

    function getDatesData(){
        $id = $this->input->post('id');
        $this->db->where('IMPDTID', $id);
        $query = $this->db->get('importantdates');
        if($query->num_rows()!=0){
            $bool_ = array('res_'=>true, 'record'=>$query->row());
        } else {
            $bool_ = array('res_'=>false, 'record'=>'x');
        }
        return $bool_;
    }

    function delDatesData(){
        $id = $this->input->post('id');
        $this->db->where('IMPDTID', $id);
        $query = $this->db->get('importantdates');

        if ($query->num_rows() != 0) {
            $item_ = $query->row();

            if ($item_->PATH_ != 'x') {
                $file__ = $item_->PATH_;
            } else {
                $file__ = 'x';
            }
        }
        $this->db->where('IMPDTID', $id);
        $bool_ = $this->db->delete('importantdates');
        if ($bool_ == TRUE) {
            if ($file__ != 'x') {
                $full_path_ = FCPATH . '_assets_/impDatesFiles/' . $file__;
                @unlink($full_path_);
                $bool_ = array('res_'=>true, 'record'=>'Record Deleted successfully.');
            }
        } else {
            $bool_ = array('res_'=>false, 'record'=>'x');
        }
        return $bool_;
    }

    function active_deactive($imptid, $status){
        $this->db->where('IMPDTID', $imptid);
        $data = array(
            'STATUS_'=>$status
        );
        $this->db->update('importantdates', $data);
    }
}