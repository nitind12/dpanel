<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_model_faculties extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function mupdateFaculty() {
        $desig = $this->input->post('txtDesig');
        $facID = $this->input->post('txtfacID');
        $qualification = $this->input->post('txtQualification');
        $summary = $this->input->post('txtSummary');
        $email = $this->input->post('txtEmail');
        $mobile = $this->input->post('txtMobile');

        $data = array(
            'DESIG' => $desig,
            'LAST_QUALIF' => $qualification,
            'SUMMARY' => $summary,
            'EMAIL' =>$email,
            'MOBILE' => $mobile,
            'STATUS' => 1,
            'USERNAME' => $this->session->userdata('ussr_')
        );
        $this->db->where('FAC_ID', $facID);
        $query = $this->db->update('faculty', $data);

        if ($query == TRUE) {
            $id__ = $this->db->insert_id();
            if ($_FILES['txtInputResume']['size'] > 0) {
                $path_1 = $this->upload_resume($facID, 'txtInputResume');
                $data_ = array(
                    'RESUME' => $path_1                  
                );

                $this->db->where('FAC_ID', $facID);
                $query = $this->db->update('faculty', $data_);
            }
            if ($_FILES['txtInputPhoto']['size'] > 0) {
                $path_2 = $this->upload_photo($facID, 'txtInputPhoto');
                $data_ = array(
                    'PHOTO_' => $path_2                  
                );

                $this->db->where('FAC_ID', $facID);
                $query = $this->db->update('faculty', $data_);
            }
            
            if ($query == TRUE) {
                $bool_ = array('res_' => TRUE, 'msg_' => 'Faculty Detail Updated Successfully.');
            } else {
                $bool_ = array('res_' => FALSE, 'msg_' => 'Faculty Detail Updated without uploading any file.');
            }
        } else {
            $bool_ = array('res_' => FALSE, 'msg_' => 'Some Server Error !! Please try again.');
        }

        return $bool_;
    }

    function upload_resume($id__, $file_name) {
        $config1 = array(
            'upload_path' => './_assets_/faculty/resume',
            'allowed_types' => 'docx|doc|pdf',
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

    function upload_photo($id__, $file_name) {
        $config2 = array(
            'upload_path' => './_assets_/faculty/photo',
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

    function get_active_faculties($course) {
        if ($this->session->userdata('stss_') != 'adm') {
            $this->db->where('COURSE', $course);
        }
        $this->db->where('STATUS', 1);
        $this->db->order_by('SEQ', 'asc');
        $query = $this->db->get('faculty');

        return $query->result();
    }

    function getmgetFaculty($id_) {
        $this->db->where('FAC_ID', $id_);
        $query = $this->db->get('faculty');

        if ($query->num_rows() != 0) {
            foreach ($query->result() as $row) {
                $data_ = array('facName' => $row->FACULTY_NAME, 'desig' => $row->DESIG, 'qualif' => $row->LAST_QUALIF, 'photo' => $row->PHOTO_, 'resume' => $row->RESUME, 'summary' => $row->SUMMARY,'email' => $row->EMAIL, 'mobile' => $row->MOBILE, 'photo' => $row->PHOTO_);
            }
        } else {
            $data_ = "NO DATA AVAILABLE";
        }
        $this->output->set_content_type('application/json');
        return json_encode($data_);
    }

    function changesequence(){
        $facid = $this->input->post('facid');
        $seq_ = $this->input->post('seq_');
        $data = array(
            'SEQ' => $seq_,
            'USERNAME' => $this->session->userdata('ussr_')
        );
        $this->db->where('FAC_ID', $facid);
        if($this->db->update('faculty', $data)){
            $bool_ = array('res_'=>true, 'msg'=>'Sequence successfully changed.');
        } else {
            $bool_ = array('res_'=>false, 'msg'=>'Something goes wrong. Please try again.');
        }
        return $bool_;
    }

}
