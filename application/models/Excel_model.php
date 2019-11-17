<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function fetchallsno(){
		$this->db->select('SNO');
		$query = $this->db->get('tc_detail');
		$res = $query->result();
		$i = 0;
		$str = '';
		foreach ($res as $item) {
			if($i == 0){
				$str = $item->SNO;
			}else{
				$str = $str . ", " . $item->SNO;
			}
			$i=1;
		}
		return $str;
	}
	function fetchalladmissionno(){
		$this->db->select('ADMISSION_NO');
		$query = $this->db->get('tc_detail');
		$res = $query->result();
		$i = 0;
		$str = '';
		foreach ($res as $item) {
			if($i == 0){
				$str = $item->ADMISSION_NO;
			}else{
				$str = $str . ", " . $item->ADMISSION_NO;
			}
			$i=1;
		}
		return $str;
	}
	function fetch_TC_data($session_=''){
		if($session_!=''){
			$this->db->where('SESSION_', $session_);
		}
		$this->db->order_by('CANDIDATE_NAME', 'ASC');
		$query = $this->db->get('tc_detail');
		//echo $this->db->last_query();
		return $query->result();
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
	function insert($data, $session_=''){ // This function is used to import data for whole school
		if($session_!=''){
			//$this->db->where('SESSION_', $session_);
			//$this->db->where('CLASS_', $class_);
			//$this->db->where('DATE_OF_ISSUE', 'x');
			//$this->db->delete('tc_detail'); // It deletes the data of specific class, session and TC yet not issued

			$this->db->insert_batch('tc_detail', $data); // Upload & append the excel data for specific class and session
		}
		//echo $this->db->last_query();
	}

	function insert_classwise($data, $session_='', $class_=''){ // This function is used to import data classwise
		if($session_!='' && $class_!=''){

			//$this->db->where('SESSION_', $session_);
			//$this->db->where('CLASS_', $class_);
			//$this->db->where('DATE_OF_ISSUE', 'x');
			//$this->db->delete('tc_detail'); // It deletes the data of specific class, session and TC yet not issued

			$this->db->insert_batch('tc_detail', $data); // Upload & append the excel data for specific class and session
		}
		//echo $this->db->last_query();
	}

	function cancelTC($tcno){
		$this->db->where('TCNO', $tcno);
		$query = $this->db->get('tc_detail');
		if($query->num_rows()!=0){
			$row = $query->row();
			$tcid = $row->TCID;
			$original = $row->ORIGINAL;

			if($original > 1){
				// copy the cancelled record to tc_detail_cancelled table
				$this->db->query('insert into tc_detail_cancelled select * from tc_detail where TCNO = '.$tcno);
				// update the 'ISSUED' status to 'CANCELLED' in tc_issued table
				$this->db->where('TCID', $tcid);
				$this->db->where('STATUS', 'ISSUED');
				$this->db->order_by('ISTID', 'desc');
				$this->db->limit(1,1);
				$data = array(
					'STATUS'=>'CANCELLED'
				);
				$this->db->update('tc_issued', $data);

				// Update the TCNO to $original-1
				$this->db->where('TCID', $tcid);
				$data = array(
					'ORIGINAL' => $original-1,
				);
				$this->db->update('tc_detail', $data);

				$bool_ = array('res_'=>true, 'msg_'=>"TC Cancelled successfully. But this TC had already been issued ".$original." times. Now if need re-generate again with corrections then please cancel the same ".($original-1)." times more.");
			} else {
				// copy the cancelled record to tc_detail_cancelled table
				$this->db->query('insert into tc_detail_cancelled select * from tc_detail where TCNO = '.$tcno);
				// update the 'ISSUED' status to 'CANCELLED' in tc_issued table
				$this->db->where('TCID', $tcid);
				$this->db->where('STATUS', 'ISSUED');
				$this->db->order_by('ISTID', 'desc');
				$this->db->limit(1,1);
				$data = array(
					'STATUS'=>'CANCELLED'
				);
				$this->db->update('tc_issued', $data);

				// Update the TCNO to 0
				$this->db->where('TCID', $tcid);
				$data = array(
					'TCNO'=> '0',
					'ORIGINAL' => 0,
					'DATE_OF_ISSUE'=>'x'
				);
				$this->db->update('tc_detail', $data);

				// Create the new record against the old tc record
				$this->db->query('insert into tc_detail (`SCHOOL_NO`, `BOOK_NO`, `SNO`, `ADMISSION_NO`, `AFFILIATION_NO`, `RENEWED_UPTO`, `SCHOOL_STATUS`, `REGNO_OF_CANDIDATE`, `CANDIDATE_NAME`, `CANDIDATE_ADHAAR`, `MOTHERS_NAME`, `MOTHER_ADHAAR`,`FATHERS_NAME`, `FATHER_ADHAAR`, `NATIONALITY`, `DOB_IN_WORDS`, `SC_ST_OBC_GEN_CATEGORY`, `STUDENT_FAILED`, `SUBJECT_OFFERED`, `LAST_STUDIED_CLASS`, `SCHOOL_OR_BOARD`, `PROMOTED`, `DUES_PAID`, `ANY_CONSESSION`, `NCC_SCOUT_GUIDE`, `DATE_OF_CUTTING_NAME`, `REASON_OF_LEAVING_SCHOOL`, `NO_OF_MEETING_UPTODATE`, `SCHOOL_DAYS_ATTENDED`, `GENERAL_CONDUCT_OF_STUDENT`, `REMARKS_IF_ANY`, `DATE_OF_ISSUE`, `USERNAME`, `DATE_`, `STATUS`, `SESSION_`, `CLASS_`, `ORIGINAL`, `TERMS`, `TCNO`) select `SCHOOL_NO`, `BOOK_NO`, `SNO`, `ADMISSION_NO`, `AFFILIATION_NO`, `RENEWED_UPTO`, `SCHOOL_STATUS`, `REGNO_OF_CANDIDATE`, `CANDIDATE_NAME`, `CANDIDATE_ADHAAR`, `MOTHERS_NAME`, `MOTHER_ADHAAR`,`FATHERS_NAME`, `FATHER_ADHAAR`, `NATIONALITY`, `DOB_IN_WORDS`, `SC_ST_OBC_GEN_CATEGORY`, `STUDENT_FAILED`, `SUBJECT_OFFERED`, `LAST_STUDIED_CLASS`, `SCHOOL_OR_BOARD`, `PROMOTED`, `DUES_PAID`, `ANY_CONSESSION`, `NCC_SCOUT_GUIDE`, `DATE_OF_CUTTING_NAME`, `REASON_OF_LEAVING_SCHOOL`, `NO_OF_MEETING_UPTODATE`, `SCHOOL_DAYS_ATTENDED`, `GENERAL_CONDUCT_OF_STUDENT`, `REMARKS_IF_ANY`, `DATE_OF_ISSUE`, `USERNAME`, `DATE_`, `STATUS`, `SESSION_`, `CLASS_`, `ORIGINAL`, `TERMS`, `TCNO` from tc_detail where TCID = '.$tcid);

				// delete the cancelled TC record 
				$this->db->where('TCID', $tcid);
				$this->db->delete('tc_detail');

				$bool_ = array('res_'=>true, 'msg_'=>$tcno ." TC Number Cancelled successfully.");
			}
		} else {
			$bool_ = array('res_'=>false, 'msg_'=>$tcno ." TC Number not found.");
		}
		return $bool_;
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

	function deleteTCRecord($tcid){
		$this->db->where('TCID', $tcid);
		$query = $this->db->get('tc_detail');
		$r = $query->row();
		if($r->ORIGINAL==0){
			$this->db->where('TCID', $tcid);
			$bool_ = $this->db->delete('tc_detail');
		} else {
			$bool_ = false;
		}
		return $bool_;
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

		
		if($original == 0){
			$sql = $this->db->get('tc_no');
			$r = $sql->row();
			$id__ = $r->ID;

			$data = array(
				'DATE_OF_ISSUE'=>$date_of_issue,
				'REMARKS_IF_ANY'=>$remarks,
				'ORIGINAL'=>$original+1,
				'DATE_' => date('Y-m-d H:i:s'),
				'TCNO' => $id__
			);
		} else {
			$data = array(
				'DATE_OF_ISSUE'=>$date_of_issue,
				'REMARKS_IF_ANY'=>$remarks,
				'ORIGINAL'=>$original+1,
				'DATE_' => date('Y-m-d H:i:s')
			);
		}
		
		$this->db->where('TCID', $tcid);
		if($this->db->update('tc_detail', $data) == true){
			if($original == 0){
				$this->db->update('tc_no', array('ID' => $id__+1)); // increment the TC NO for the next TC
			}
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

    function exportTC($table, $yr__){
    	$this->load->dbutil();
        $this->db->order_by('TCID');

        $this->db->select(array('CLASS_ as CLASS, SCHOOL_NO, BOOK_NO, SNO, ADMISSION_NO, AFFILIATION_NO, RENEWED_UPTO, SCHOOL_STATUS, REGNO_OF_CANDIDATE, CANDIDATE_NAME, CANDIDATE_ADHAAR, MOTHERS_NAME, MOTHER_ADHAAR, FATHERS_NAME, FATHER_ADHAAR, NATIONALITY, CONCAT("[",DOB_IN_WORDS,"]") AS DOB_IN_WORDS, SC_ST_OBC_GEN_CATEGORY, STUDENT_FAILED, SUBJECT_OFFERED, LAST_STUDIED_CLASS, SCHOOL_OR_BOARD, PROMOTED, DUES_PAID, ANY_CONSESSION, NCC_SCOUT_GUIDE, DATE_OF_CUTTING_NAME, REASON_OF_LEAVING_SCHOOL, NO_OF_MEETING_UPTODATE, SCHOOL_DAYS_ATTENDED, GENERAL_CONDUCT_OF_STUDENT, REMARKS_IF_ANY'));
        $this->db->from($table);
        $query = $this->db->get();
        //echo $this->db->last_query();
        $delimiter = ",";
        $newline = "\r\n";
        $filename = "_TC_List_" .$yr__. ".csv";
        $data = $this->dbutil->csv_from_result($query, $delimiter, $newline);
        force_download($filename, $data);
    }

    function fetchTCDataToExport($table, $yr__){
    	$this->db->order_by('TCID');

        $this->db->select('CLASS_ as CLASS, SCHOOL_NO, BOOK_NO, SNO, ADMISSION_NO, AFFILIATION_NO, RENEWED_UPTO, SCHOOL_STATUS, REGNO_OF_CANDIDATE, CANDIDATE_ADHAAR, MOTHERS_NAME, MOTHER_ADHAAR, FATHERS_NAME, FATHER_ADHAAR, NATIONALITY, CONCAT("[",DOB_IN_WORDS,"]") AS DOB_IN_WORDS, SC_ST_OBC_GEN_CATEGORY, STUDENT_FAILED, SUBJECT_OFFERED, LAST_STUDIED_CLASS, SCHOOL_OR_BOARD, PROMOTED, DUES_PAID, ANY_CONSESSION, NCC_SCOUT_GUIDE, DATE_OF_CUTTING_NAME, REASON_OF_LEAVING_SCHOOL, NO_OF_MEETING_UPTODATE, SCHOOL_DAYS_ATTENDED, GENERAL_CONDUCT_OF_STUDENT, REMARKS_IF_ANY');
        $this->db->from($table);
        $query = $this->db->get();
        return $query->result();
    }

}