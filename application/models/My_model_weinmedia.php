<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_model_weinmedia extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function feedactivityCategory(){
        $categ = $this->input->post('txtActivityCategory');

        $this->db->where('CATEGORY', $categ);
        $query = $this->db->get('activities_category');
        if($query->num_rows()!=0){
            $bool_ = array('res_'=>TRUE, 'msg_'=>'X: Activity Category already exist !!');
        } else {
            if($this->input->post('actcateg_submit') == 'submit'){
                $data = array(
                    'CATEGORY' => $categ,
                    'USERNAME_' => $this->session->userdata('ussr_'),
                    'DATE_' => date('Y-m-d H:i:s'),
                    'STATUS_' => 1
                );
                if($this->db->insert('activities_category', $data)){
                    $bool_ = array('res_'=>TRUE, 'msg_'=>'Activity Category Submitted Successfully.');
                } else {
                    $bool_ = array('res_'=>FALSE, 'msg_'=>'Some Server Error !! Please try again.');
                }
            } else {
                $data = array(
                    'CATEGORY' => $categ,
                    'USERNAME_' => $this->session->userdata('ussr_'),
                    'DATE_' => date('Y-m-d H:i:s')
                );
                $this->db->where('ACT_CATEG_ID', $this->input->post('id'));
                if($this->db->update('activities_category', $data)){
                    $bool_ = array('res_'=>TRUE, 'msg_'=>'Activity Category updated Successfully.');
                } else {
                    $bool_ = array('res_'=>FALSE, 'msg_'=>'Some Server Error !! Please try again.');
                }
            }
        }

        return $bool_;
    }
    function getall_activity_category(){
        $query = $this->db->get('activities_category');
        return $query->result();
    }
    function get_active_activity_category(){
        $this->db->where('STATUS_', 1);
        $query = $this->db->get('activities_category');
        return $query->result();
    }
    function get_activity_category(){
        $id_ = $this->input->post('id');
        $this->db->where('ACT_CATEG_ID', $id_);
        $query = $this->db->get('activities_category');
        if($query->num_rows()!=0){
            $bool_ = array('res_'=>true, 'record'=>$query->row());
        } else {
            $bool_ = array('res_'=>false, 'record'=>'x');
        }
        return $bool_;
    }
    function delete_activity_category(){
        $id = $this->input->post('id');
        $this->db->where('ACT_CATEG_ID', $id);
        $query = $this->db->get('activities_category');

        if ($query->num_rows() != 0) {
            $item_ = $query->row();
        }
        $this->db->where('ACT_CATEG_ID', $id);
        $bool_ = $this->db->delete('activities_category');
        if ($bool_ == TRUE) {
            $bool_ = array('res_'=>true, 'record'=>'Record Deleted successfully.');
        } else {
            $bool_ = array('res_'=>false, 'record'=>'x');
        }
        return $bool_;
    }
    function active_deactive_category($categid, $status){
        $this->db->where('ACT_CATEG_ID', $categid);
        $data = array(
            'STATUS_'=>$status
        );
        $this->db->update('activities_category', $data);
    }
    function feedactivity(){
    	$title_ = $this->input->post('txtTitle');
    	$brief_ = $this->input->post('txtBriefDesc');
    	$date_of_activity = $this->input->post('txtDateofActivity');
        $categid = $this->input->post('cmbActivityCategory');

    	$data = array(
    		'TITLE_' => $title_,
    		'BRIEF_' => $brief_,
    		'DET_PATH' => 'x',
    		'PICTURE_PATH' => 'x',
    		'DATE_OF_ACTIVITY' => $date_of_activity,
    		'DATE_' => date('Y-m-d H:i:s'),
    		'STATUS_' => 1,
            'USERNAME_' => $this->session->userdata('ussr_'),
            'ACTIVITYCATEGID' => $categid
    	);
    	$query = $this->db->insert('activities', $data);

    	if($query == TRUE){
    		$id__ = $this->db->insert_id();
    		$path_1 = $this->upload_activity_file($id__, 'txtInputFileDescription');
    		$path_2 = $this->upload_activity_photo($id__, 'txtInputFilePicture');

    		$data_ = array(
    			'DET_PATH' => $path_1,
    			'PICTURE_PATH' => $path_2
    		);
            $this->db->where('ID', $id__);
    		$query = $this->db->update('activities', $data_);
    		if($query == TRUE){
    			$bool_ = array('res_'=>TRUE, 'msg_'=>'Activity Submitted Successfully.');
    		} else {
    			$bool_ = array('res_'=>FALSE, 'msg_'=>'Activity Submitted Successfully without uploading any file.');
    		}
    	} else {
    		$bool_ = array('res_'=>FALSE, 'msg_'=>'Some Server Error !! Please try again.');
    	}

    	return $bool_;
    }

    function upload_activity_file($id__, $file_name) {
        $config1 = array(
            'upload_path' => './_assets_/activities',
            'allowed_types' => 'jpg|png|gif|docx|doc|pdf',
            'overwrite' => TRUE,
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

    function upload_activity_photo($id__, $file_name) {
        $config2 = array(
            'upload_path' => './_assets_/activities/photos',
            'allowed_types' => 'jpg|png|gif',
            'overwrite' => TRUE,
            'file_name' => $id__
        );
        $file_element_name = $file_name;
        $this->load->library('upload', $config2);
        $this->upload->initialize($config2);

        if ($this->upload->do_upload($file_element_name)) {
            $path_ji = $this->upload->data();
            $path_ = $path_ji['file_name'];
        } else {
            $path_ = 'sample.jpg';
        }
        return $path_;
    }

    function get_active_activities(){
    	//$this->db->where('a.STATUS_', 1);
        $this->db->where('b.STATUS_', 1);
        if($this->session->userdata('stss_') != 'adm'){
            $this->db->where('b.USERNAME_', $this->session->userdata('ussr_'));
        }
        $this->db->order_by('ACTIVITYCATEGID');
        $this->db->select('a.CATEGORY, b.*');
        $this->db->from('activities_category a');
        $this->db->join('activities b', 'a.ACT_CATEG_ID=b.ACTIVITYCATEGID');
    	$query = $this->db->get();

    	return $query->result();
    }
    function get_deactive_activities(){
    	//$this->db->where('a.STATUS_', 0);
        $this->db->where('b.STATUS_', 0);
        if($this->session->userdata('stss_') != 'adm'){
            $this->db->where('b.USERNAME_', $this->session->userdata('ussr_'));
        }
        $this->db->order_by('ACTIVITYCATEGID');
        $this->db->select('a.CATEGORY, b.*');
        $this->db->from('activities_category a');
        $this->db->join('activities b', 'a.ACT_CATEG_ID=b.ACTIVITYCATEGID');
        $query = $this->db->get();

        return $query->result();
    }
    function get_activity_detail($id_){
        $this->db->where('ID', $id_);
        if($this->session->userdata('stss_') != 'adm'){
            $this->db->where('USERNAME_', $this->session->userdata('ussr_'));
        }
        $query = $this->db->get('activities');

        return $query->row();   
    }
    function active_deactive_activity($id_, $st_){
    	$data = array(
    		'STATUS_' => $st_
    	);
    	$this->db->where('ID', $id_);
        if($this->session->userdata('stss_') != 'adm'){
            $this->db->where('USERNAME_', $this->session->userdata('ussr_'));
        }
    	$query = $this->db->update('activities', $data);
    	return $query;
    }
    function updateactivity($id_){
        $title_ = $this->input->post('txtTitle');
        $brief_ = $this->input->post('txtBriefDesc');
        $date_of_activity = $this->input->post('txtDateofActivity');
        $categid = $this->input->post('cmbActivityCategory');
        
        $path_1 = $this->upload_activity_file($id_, 'txtInputFileDescription');
        $path_2 = $this->upload_activity_photo($id_, 'txtInputFilePicture');

        if($path_1 != 'x'){
            if($path_2 != 'sample.jpg'){
                $data = array(
                    'TITLE_' => $title_,
                    'BRIEF_' => $brief_,
                    'DET_PATH' => $path_1,
                    'PICTURE_PATH' => $path_2,
                    'DATE_OF_ACTIVITY' => $date_of_activity,
                    'DATE_' => date('Y-m-d H:i:s'),
                    'USERNAME_' => $this->session->userdata('ussr_'),
                    'ACTIVITYCATEGID' => $categid
                );
            } else {
                $data = array(
                    'TITLE_' => $title_,
                    'BRIEF_' => $brief_,
                    'DET_PATH' => $path_1,
                    'DATE_OF_ACTIVITY' => $date_of_activity,
                    'DATE_' => date('Y-m-d H:i:s'),
                    'USERNAME_' => $this->session->userdata('ussr_'),
                    'ACTIVITYCATEGID' => $categid
                );
            }
        } else if($path_2 != 'sample.jpg'){
            $data = array(
                'TITLE_' => $title_,
                'BRIEF_' => $brief_,
                'PICTURE_PATH' => $path_2,
                'DATE_OF_ACTIVITY' => $date_of_activity,
                'DATE_' => date('Y-m-d H:i:s'),
                'USERNAME_' => $this->session->userdata('ussr_'),
                'ACTIVITYCATEGID' => $categid
            );
        } else {
            $data = array(
                'TITLE_' => $title_,
                'BRIEF_' => $brief_,
                'DATE_OF_ACTIVITY' => $date_of_activity,
                'DATE_' => date('Y-m-d H:i:s'),
                'USERNAME_' => $this->session->userdata('ussr_'),
                'ACTIVITYCATEGID' => $categid
            );
        }

        $this->db->where('ID', $id_);
        $query = $this->db->update('activities', $data);
        if($query == TRUE){
            $bool_ = array('res_'=>TRUE, 'msg_'=>'Activity Updated Successfully.');
        } else {
            $bool_ = array('res_'=>FALSE, 'msg_'=>'Some server error!! Please try again.');
        }
        return $bool_;
    }
    function deleteactivity($id_){
        $this->db->where('ID', $id_);
        $query = $this->db->get('activities');

        if ($query->num_rows() != 0) {
            $item_ = $query->row();

            if ($item_->DET_PATH != 'x') {
                $file__1 = $item_->DET_PATH;
            } else {
                $file__1 = 'x';
            }

            if ($item_->PICTURE_PATH != 'sample.jpg') {
                $file__2 = $item_->PICTURE_PATH;
            } else {
                $file__2 = 'sample.jpg';
            }
        }
        $this->db->where('ID', $id_);
        $bool_ = $this->db->delete('activities');
        if ($bool_ == TRUE) {
            if ($file__1 != 'x') {
                $full_path_1 = FCPATH . '_assets_/activities/' . $file__1;
                @unlink($full_path_1);
            }
            if ($file__2 != 'sample.jpg') {
                $full_path_2 = FCPATH . '_assets_/activities/photos/' . $file__2; 
                @unlink($full_path_2);
            }
        }
        return $bool_;
    }
}