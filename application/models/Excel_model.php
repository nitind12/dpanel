<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function fetch_TC_data_classwise($session_='', $class_=''){
		if($session_!=''){
			$this->db->where('SESSION_', $session_);
			$this->db->where('CLASS_', $class_);
		}
		$this->db->order_by('CANDIDATE_NAME', 'ASC');
		$query = $this->db->get('tc_detail');
		//echo $this->db->last_query();
		return $query->result();
	}
	function geTCRecordforstudent($tcid){
		$this->db->where('TCID', $tcid);
		$query = $this->db->get('tc_detail');
		return $query->row();
	}
	function insert($data, $session_='', $class_=''){
		if($session_!='' && $class_!=''){

			$this->db->where('SESSION_', $session_);
			$this->db->where('CLASS_', $class_);
			$this->db->where('DATE_OF_ISSUE', 'x');
			$this->db->delete('tc_detail'); // It deletes the data of specific class, session and TC yet not issued

			$this->db->insert_batch('tc_detail', $data); // Upload/ append the excel data for specific class and session
		}
		die();
	}

	function updatedColumn(){
		$tcid = $this->input->post('id');
		$col = $this->input->post('columnname');
		$newvalue = $this->input->post('newvalue');

		$this->db->where('TCID', $tcid);
		$data = array(
			$col=>$newvalue
		);
		return $this->db->update('tc_detail', $data);
	}

	function issueTC(){
		$date_of_issue = $this->input->post('txtIssueDate');
		$remarks = trim($this->input->post('txtRemark'));
		$terms = trim($this->input->post('txtTCTerms'));
		$tcid = $this->input->post('tcid');

		$this->db->where('TCID', $tcid);
		$query = $this->db->get('tc_detail');
		$row = $query->row();
		$original = (int) $row->ORIGINAL;
		$name = $row->CANDIDATE_NAME;

		$this->db->where('TCID', $tcid);
		$data = array(
			'DATE_OF_ISSUE'=>$date_of_issue,
			'REMARKS_IF_ANY'=>$remarks,
			'ORIGINAL'=>$original+1,
			'DATE_' => date('Y-m-d H:i:s')
		);
		if($this->db->update('tc_detail', $data) == true){
			$bool_ = array('res'=>true, 'name'=>$name);
			$data = array(
				'TCID'=>$tcid,
				'DATE_OF_ISSUE'=>$date_of_issue,
				'TERMS'=>$terms,
				'REMARKS'=>$remarks,
				'USERNAME'=>$this->session->userdata('ussr_'),
				'DATE_' => date('Y-m-d H:i:s')
			);
			$this->db->insert('tc_issued', $data);
		} else {
			$bool_ = array('res'=>false, 'name'=>'NO TC issued');
		}
		return $bool_;
	}

	function fetchTCData($tcid){
		$this->db->where('TCID', $tcid);
		$query = $this->db->get('tc_detail');
		return $query->row();
	}

	function get_profile() {
        $q = $this->db->get('school_profile');
        if ($q->num_rows() == 1) {
            $r = $q->row();
            $data = array(
                'logo' => $r->SCH_LOGO,
                'sch_name' => $r->SCH_NAME,
                'sch_contact' => $r->SCH_CONTACT,
                'sch_email' => $r->SCH_EMAIL,
                'sch_addr' => $r->SCH_ADD,
                'sch_city' => $r->SCH_CITY,
                'sch_distt' => $r->SCH_DISITT,
                'sch_state' => $r->SCH_STATE,
                'sch_country' => $r->SCH_COUNTRY,
                'affiliation' => $r->AFFILIATION,
                'website' => $r->WEBSITE,
                'remark' => $r->REMARK,
                'date_' => $r->DATE_,
                'username' => $r->USERNAME
            );
        } else {
            $data = array(
                'logo' => 'x.png',
                'sch_name' => 'ABC',
                'sch_contact' => '0000000000',
                'sch_email' => 'temp@gmail.com',
                'sch_addr' => 'x',
                'sch_city' => 'x',
                'sch_distt' => 'x',
                'sch_state' => 'x',
                'sch_country' => 'x',
                'affiliation' => 'x',
                'website' => 'x',
                'remark' => 'x',
                'date_' => 'x',
                'username' => 'x'
            );
        }
        return $data;
    }

}