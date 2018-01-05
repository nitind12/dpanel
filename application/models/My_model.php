<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function login() {
        $this->db->where('USERNAME_', $this->input->post('txtUsr'));
        $this->db->where('PASSWORD_', $this->input->post('txtPwd'));
        $query = $this->db->get('login');

        if ($query->num_rows() != 0) {
            $res = $query->row();
            $data = array('bool_' => TRUE, 'sts_' => $res->USER_STATUS, 'dept_'=>$res->DEPT_, 'course' => $res->COURSE);
        } else {
            $data = array('bool_' => FALSE, 'sts_' => 'x');
        }

        return $data;
    }

    function changepwd(){
        if($this->session->userdata('pwd_count') <= 3){
            $old_pwd = $this->input->post('old_pwd');
            $new_pwd = $this->input->post('new_pwd');

            $data = array(
                'PASSWORD_' => $new_pwd
            );

            $this->db->where('USERNAME_', $this->session->userdata('ussr_'));
            $this->db->where('PASSWORD_', $old_pwd);
            $query = $this->db->get('login', $data);

            if($query->num_rows() != 0){
                $this->db->where('USERNAME_', $this->session->userdata('ussr_'));
                $this->db->where('PASSWORD_', $old_pwd);
                $query = $this->db->update('login', $data);

                $bool_ = array('res_'=>TRUE, 'msg_' => '<span style="color: #00ff00; background: #808080">Password changed successfully</span><br />&lt;&lt;<a href="'.site_url('dashboard').'">Go back to Dashboard</a>');
                $this->session->unset_userdata('pwd_count');
            } else {
                $bool_ = array('res_'=>FALSE, 'msg_' => 'Your old credentials are not matching. Please try again!!!');
            }
        } else {
            $bool_ = array('res_'=>FALSE, 'msg_' => 'All three chances over.');
        }

        return $bool_;
    }

    function get_menu($status_){
        $this->db->order_by('a.PRIORITY_');
        $this->db->select('a.*, b.USER_');
        $this->db->from('menu_1 a');
        $this->db->join('user_menu b', 'a.ID_= b.MENU');
        $this->db->where('b.USER_', $status_);
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }

    function my_menu($status_, $path_){
        $this->db->select('b.USER_');
        $this->db->from('menu_1 a');
        $this->db->join('user_menu b', 'a.ID_= b.MENU');
        $this->db->where('b.USER_', $status_);
        $this->db->where('a.PATH_', $path_);
        $query = $this->db->get();
        if($query->num_rows()!=0){
            $bool_ = true;
        } else {
            $bool_ = false;
        }
        //echo $this->db->last_query();
        return $bool_;
    }
}