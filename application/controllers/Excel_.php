<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Excel_ extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('excel_model', 'em');
		$this->load->model('My_model', 'mm');
        if (! $this->session->userdata('ussr_')) {
            redirect(__BACKTOSITE__);
        }
        $this->load->library('excel');
	}

	function importTCData(){
		$data['classes'] = array('Nursery', 'L-KG', 'U-KG', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12');
		$data['user___'] = $this->session->userdata('ussr_');
		$data['menu'] = $this->mm->get_menu($this->session->userdata('stss_'));
        $data['innerst'] ='0';

		$data['folder_'] = 'tc';
        $data['page__'] = 'TCData';
        $data['page_head'] = 'Manage TC online';
        $data['view1'] = 'viewtcdata';    
        $data['wallpaper_'] = '';

        $this->load->view('templates/header', $data);
        $this->load->view('inner', $data);
        $this->load->view('templates/footer');
    }

    function fetchTCData(){
        $session_ = $this->input->post('txtSession');
        $class_ = $this->input->post('txtClass');
        $data['studentTCData'] = $this->em->fetch_TC_data_classwise($session_, $class_);
        echo json_encode($data);
    }
    function geTCRecordforstudent($tcid){
        $data['record'] = $this->em->geTCRecordforstudent($tcid);
        $data['school_'] = _SCHOOL_;
        echo json_encode($data);
    }
    function uploadTCData(){

        if(isset($_FILES["txtTCDataUpload"]["name"]))
        {
            $path = $_FILES["txtTCDataUpload"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);

            $session_ = $this->input->post('txtSession');
            $class_  = $this->input->post('txtClass');

            foreach($object->getWorksheetIterator() as $worksheet)
            {
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for($row=2; $row<=$highestRow; $row++)
                {
                    $schoolno               = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $bookno                 = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $sno                    = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $admssionno             = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $affiliationno          = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $regno                  = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $studentname            = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                    $mother                 = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                    $father                 = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                    $nationality            = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                    $dob                    = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                    $category               = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                    $studentfailed          = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                    $subjectoffered         = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                    $laststudiedclass       = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                    $schoolorboard          = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
                    $promoted               = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
                    $duespaid               = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
                    $anyconcession          = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
                    $nccscoutguide          = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
                    $dateofcuttingname      = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
                    $reasonofleavingschool  = $worksheet->getCellByColumnAndRow(21, $row)->getValue();
                    $noofmeetinguptodate    = $worksheet->getCellByColumnAndRow(22, $row)->getValue();
                    $schooldaysattended     = $worksheet->getCellByColumnAndRow(23, $row)->getValue();
                    $generalconduct         = $worksheet->getCellByColumnAndRow(24, $row)->getValue();
                    $remarksifany           = $worksheet->getCellByColumnAndRow(25, $row)->getValue();
                    $dateofissue            = 'x';//$worksheet->getCellByColumnAndRow(26, $row)->getValue();

                    $data[] = array(
                         'SCHOOL_NO'                    =>$schoolno, 
                         'BOOK_NO'                      =>$bookno, 
                         'SNO'                          =>$sno, 
                         'ADMISSION_NO'                 =>$admssionno, 
                         'AFFILIATION_NO'               =>$affiliationno, 
                         'REGNO_OF_CANDIDATE'           =>$regno, 
                         'CANDIDATE_NAME'               =>ucfirst($studentname), 
                         'MOTHERS_NAME'                 =>ucfirst($mother), 
                         'FATHERS_NAME'                 =>ucfirst($father), 
                         'NATIONALITY'                  =>$nationality, 
                         'DOB_IN_WORDS'                 =>$dob, 
                         'SC_ST_OBC_GEN_CATEGORY'       =>strtoupper($category), 
                         'STUDENT_FAILED'               =>$studentfailed, 
                         'SUBJECT_OFFERED'              =>$subjectoffered, 
                         'LAST_STUDIED_CLASS'           =>$laststudiedclass, 
                         'SCHOOL_OR_BOARD'              =>$schoolorboard, 
                         'PROMOTED'                     =>$promoted, 
                         'DUES_PAID'                    =>$duespaid, 
                         'ANY_CONSESSION'               =>$anyconcession, 
                         'NCC_SCOUT_GUIDE'              =>$nccscoutguide, 
                         'DATE_OF_CUTTING_NAME'         =>$dateofcuttingname, 
                         'REASON_OF_LEAVING_SCHOOL'     =>$reasonofleavingschool, 
                         'NO_OF_MEETING_UPTODATE'       =>$noofmeetinguptodate, 
                         'SCHOOL_DAYS_ATTENDED'         =>$schooldaysattended, 
                         'GENERAL_CONDUCT_OF_STUDENT'   =>$generalconduct, 
                         'REMARKS_IF_ANY'               =>$remarksifany, 
                         'DATE_OF_ISSUE'                =>$dateofissue, 
                         'USERNAME'                     =>$this->session->userdata('ussr_'), 
                         'DATE_'                        =>date('Y-m-d H:i:s'), 
                         'STATUS'                       =>'1', 
                         'SESSION_'                     =>$session_,
                         'CLASS_'                       =>$class_,
                         'ORIGINAL'                     =>'0'
                    );
                }
            }
            $this->em->insert($data, $session_, $class_);
            echo 'Data Imported successfully';
        }   
    }
    function issueTC(){
        echo json_encode($this->em->issueTC());
    }
    function updatedColumn(){
        echo $this->em->updatedColumn();
    }
    function printTC($tcid){
        $data['tc_data'] = $this->em->fetchTCData($tcid);
        $data['school_profile'] = $this->em->get_profile();
        
        $data['classes'] = array('Nursery', 'L-KG', 'U-KG', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12');
        $data['user___'] = $this->session->userdata('ussr_');
        $data['menu'] = $this->mm->get_menu($this->session->userdata('stss_'));
        $data['innerst'] ='0';

        $data['folder_'] = 'tc';
        $data['page__'] = 'printTC';
        $data['page_head'] = 'Manage TC online';
        $data['view1'] = 'viewtcdata';
        $data['wallpaper_'] = '';

        //$this->load->view('templates/header', $data);
        $this->load->view('tc/printTC', $data);
        $this->load->view('templates/footer');

    }
}