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
        $this->db->order_by('ABS(CLASS_)');
        $data['studentTCData'] = $this->em->fetch_TC_data($session_);
        echo json_encode($data);
    }
    function fetchTCDataClasswise(){
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

    function get_duplicates( $array ) {
        return array_unique( array_diff_assoc( $array, array_unique( $array ) ) );
    }

    function cancelTC(){
        $tcno = $this->input->post('tcno');
        $data['cancelTCMsg'] = $this->em->cancelTC($tcno);
        echo json_encode($data);
    }
    function uploadTCData(){
        $x = $this->em->fetchallsno();
        $data_ = explode(',', $x);
        $data = array();
        $msg = '';
        if(isset($_FILES["txtTCDataUpload"]["name"]))
        {
            $path = $_FILES["txtTCDataUpload"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);

            $session_ = $this->input->post('txtSession');
            $str = '';
            $i = 0;
            $admno = array();

            foreach($object->getWorksheetIterator() as $worksheet){
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for($row=2; $row<=$highestRow; $row++){
                    array_push($admno, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
                }
            }
            //print_r($admno);
            $duplicates = $this->get_duplicates($admno);
            if(empty($duplicates)){ 
                foreach($object->getWorksheetIterator() as $worksheet)
                {
                    $highestRow = $worksheet->getHighestRow();
                    $highestColumn = $worksheet->getHighestColumn();
                    for($row=2; $row<=$highestRow; $row++)
                    {
                        $class_                 = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                        $schoolno               = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                        $bookno                 = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                        $sno                    = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                        $admssionno             = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                        $affiliationno          = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                        $renewedupto            = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                        $schoolstatus           = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                        $regno                  = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                        $studentname            = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                        $studentadhaar          = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                        $mother                 = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                        $motheradhaar           = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                        $father                 = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                        $fatheradhaar           = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                        $nationality            = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
                        $dobfigures             = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
                        $dob                    = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
                        $category               = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
                        $studentfailed          = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
                        $subjectoffered         = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
                        $laststudiedclass       = $worksheet->getCellByColumnAndRow(21, $row)->getValue();
                        $schoolorboard          = $worksheet->getCellByColumnAndRow(22, $row)->getValue();
                        $promoted               = $worksheet->getCellByColumnAndRow(23, $row)->getValue();
                        $duespaid               = $worksheet->getCellByColumnAndRow(24, $row)->getValue();
                        $anyconcession          = $worksheet->getCellByColumnAndRow(25, $row)->getValue();
                        $nccscoutguide          = $worksheet->getCellByColumnAndRow(26, $row)->getValue();
                        $dateofcuttingname      = $worksheet->getCellByColumnAndRow(27, $row)->getValue();
                        $reasonofleavingschool  = $worksheet->getCellByColumnAndRow(28, $row)->getValue();
                        $noofmeetinguptodate    = $worksheet->getCellByColumnAndRow(29, $row)->getValue();
                        $schooldaysattended     = $worksheet->getCellByColumnAndRow(30, $row)->getValue();
                        $generalconduct         = $worksheet->getCellByColumnAndRow(31, $row)->getValue();
                        $remarksifany           = $worksheet->getCellByColumnAndRow(32, $row)->getValue();
                        $dateofissue            = 'x';//$worksheet->getCellByColumnAndRow(26, $row)->getValue();
                        //echo array_search($sno, $data_) . "<br>";
                        if(array_search($sno, $data_) !== false){
                            if($i == 0){
                                $str = "<b class='sno_box'>".$sno."</b>";
                            } else {
                                $str = $str . " " . "<b class='sno_box'>".$sno."</b>";
                            }
                            $i=1;
                        } else {
                            if($this->searchData(trim($sno), $data) == 0 && trim($sno) != ''){
                                $data[] = array(
                                     'SCHOOL_NO'                    => trim($schoolno)!=''?$schoolno:'NA', 
                                     'BOOK_NO'                      => trim($bookno)!=''?$bookno:'NA', 
                                     'SNO'                          => trim($sno)!=''?$sno:'NA', 
                                     'ADMISSION_NO'                 => trim($admssionno)!=''?$admssionno:'NA', 
                                     'AFFILIATION_NO'               => trim($affiliationno)!=''?$affiliationno:'NA', 
                                     'RENEWED_UPTO'                 => trim($renewedupto)!=''?trim($renewedupto):'NA', 
                                     'SCHOOL_STATUS'                => trim($schoolstatus)!=''?trim($schoolstatus):'NA', 
                                     'REGNO_OF_CANDIDATE'           => trim($regno)!=''?trim($regno):'NA', 
                                     'CANDIDATE_NAME'               => trim($studentname)!=''?ucfirst($studentname):'NA',
                                     'CANDIDATE_ADHAAR'             => trim($studentadhaar)!=''?ucfirst($studentadhaar):'NA', 
                                     'MOTHERS_NAME'                 => trim($mother)!=''?ucfirst($mother):'NA', 
                                     'MOTHER_ADHAAR'                => trim($motheradhaar)!=''?ucfirst($motheradhaar):'NA',
                                     'FATHERS_NAME'                 => trim($father)!=''?ucfirst($father):'NA', 
                                     'FATHER_ADHAAR'                => trim($fatheradhaar)!=''?ucfirst($fatheradhaar):'NA',
                                     'NATIONALITY'                  => trim($nationality)!=''?trim($nationality):'NA', 
                                     'DOB_IN_FIGURES'               => trim($dobfigures)!=''?trim($dobfigures):'NA', 
                                     'DOB_IN_WORDS'                 => trim($dob)!=''?trim($dob):'NA', 
                                     'SC_ST_OBC_GEN_CATEGORY'       => trim($category)!=''?trim(strtoupper($category)):'NA', 
                                     'STUDENT_FAILED'               => trim($studentfailed)!=''?trim($studentfailed):'NA', 
                                     'SUBJECT_OFFERED'              => trim($subjectoffered)!=''?trim($subjectoffered):'NA', 
                                     'LAST_STUDIED_CLASS'           => trim($laststudiedclass)!=''?trim($laststudiedclass):'NA', 
                                     'SCHOOL_OR_BOARD'              => trim($schoolorboard)!=''?trim($schoolorboard):'NA', 
                                     'PROMOTED'                     => trim($promoted)!=''?trim($promoted):'NA', 
                                     'DUES_PAID'                    => trim($duespaid)!=''?trim($duespaid):'NA', 
                                     'ANY_CONSESSION'               => trim($anyconcession)!=''?trim($anyconcession):'NA', 
                                     'NCC_SCOUT_GUIDE'              => trim($nccscoutguide)!=''?trim($nccscoutguide):'NA', 
                                     'DATE_OF_CUTTING_NAME'         => trim($dateofcuttingname)!=''?trim($dateofcuttingname):'NA', 
                                     'REASON_OF_LEAVING_SCHOOL'     => trim($reasonofleavingschool)!=''?trim($reasonofleavingschool):'NA', 
                                     'NO_OF_MEETING_UPTODATE'       => trim($noofmeetinguptodate)!=''?trim($noofmeetinguptodate):'NA', 
                                     'SCHOOL_DAYS_ATTENDED'         => trim($schooldaysattended)!=''?trim($schooldaysattended):'NA', 
                                     'GENERAL_CONDUCT_OF_STUDENT'   => trim($generalconduct)!=''?trim($generalconduct):'NA', 
                                     'REMARKS_IF_ANY'               => trim($remarksifany)!=''?trim($remarksifany):'NA', 
                                     'DATE_OF_ISSUE'                => trim($dateofissue)!=''?trim($dateofissue):'NA', 
                                     'USERNAME'                     => $this->session->userdata('ussr_'), 
                                     'DATE_'                        => date('Y-m-d H:i:s'), 
                                     'STATUS'                       => '1', 
                                     'SESSION_'                     => $session_,
                                     'CLASS_'                       => $class_,
                                     'ORIGINAL'                     => '0'
                                );
                            } else {
                                if($i == 0){
                                    $str = "<b class='sno_box'>".$sno."</b>";
                                } else {
                                    $str = $str . " " . "<b class='sno_box'>".$sno."</b>";
                                }
                                $i=1;
                            }
                        } 
                    }
                }
                if(count($data) != 0){
                    $this->em->insert($data, $session_, $class_);
                    if($str == ''){
                        $msg =  'Data Imported successfully';
                    } else {
                        $msg = count($data).' record(s) imported successfully, but still some duplicate record(s) found SNO as: '. $str;
                    }
                } else {
                    $msg = "Nothing uploaded. Duplicate Record(s) found havng SNO as: ".$str;
                }
            } else {
                $msg = "<span style='color:#0000ff'>Please correct your excel file.</span> Duplicate Admission No(s). found - <span style='color:#505050'> [".implode(", ", $duplicates)."].</span> Please remove duplicates and try again.";
            }
        }   
        echo json_encode($msg);
    }

    function uploadTCDataClasswise(){
        //$x = $this->em->fetchallsno();
        $x = $this->em->fetchalladmissionno();
        $data_ = explode(',', $x);
        $data = array();
        $msg = '';
        if(isset($_FILES["txtTCDataUpload"]["name"]))
        {
            $path = $_FILES["txtTCDataUpload"]["tmp_name"];
            $object = PHPExcel_IOFactory::load($path);

            $session_ = $this->input->post('txtSession');
            $class_  = $this->input->post('txtClass');
            $str = '';
            $i = 0;
            $admno = array();

            foreach($object->getWorksheetIterator() as $worksheet){
                $highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                for($row=2; $row<=$highestRow; $row++){
                    array_push($admno, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
                }
            }
            //print_r($admno);
            $duplicates = $this->get_duplicates($admno);
            if(empty($duplicates)){ 
                foreach($object->getWorksheetIterator() as $worksheet){
                    $highestRow = $worksheet->getHighestRow();
                    $highestColumn = $worksheet->getHighestColumn();
                    for($row=2; $row<=$highestRow; $row++){
                        $class_                 = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                        $schoolno               = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                        $bookno                 = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                        $sno                    = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                        $admssionno             = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                        $affiliationno          = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                        $renewedupto            = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
                        $schoolstatus           = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
                        $regno                  = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
                        $studentname            = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
                        $studentadhaar          = $worksheet->getCellByColumnAndRow(10, $row)->getValue();
                        $mother                 = $worksheet->getCellByColumnAndRow(11, $row)->getValue();
                        $motheradhaar           = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
                        $father                 = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
                        $fatheradhaar           = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
                        $nationality            = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
                        $dobfigures             = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
                        $dob                    = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
                        $category               = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
                        $studentfailed          = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
                        $subjectoffered         = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
                        $laststudiedclass       = $worksheet->getCellByColumnAndRow(21, $row)->getValue();
                        $schoolorboard          = $worksheet->getCellByColumnAndRow(22, $row)->getValue();
                        $promoted               = $worksheet->getCellByColumnAndRow(23, $row)->getValue();
                        $duespaid               = $worksheet->getCellByColumnAndRow(24, $row)->getValue();
                        $anyconcession          = $worksheet->getCellByColumnAndRow(25, $row)->getValue();
                        $nccscoutguide          = $worksheet->getCellByColumnAndRow(26, $row)->getValue();
                        $dateofcuttingname      = $worksheet->getCellByColumnAndRow(27, $row)->getValue();
                        $reasonofleavingschool  = $worksheet->getCellByColumnAndRow(28, $row)->getValue();
                        $noofmeetinguptodate    = $worksheet->getCellByColumnAndRow(29, $row)->getValue();
                        $schooldaysattended     = $worksheet->getCellByColumnAndRow(30, $row)->getValue();
                        $generalconduct         = $worksheet->getCellByColumnAndRow(31, $row)->getValue();
                        $remarksifany           = $worksheet->getCellByColumnAndRow(32, $row)->getValue();
                        $dateofissue            = 'x';//$worksheet->getCellByColumnAndRow(26, $row)->getValue();
                        //echo array_search($sno, $data_) . "<br>";
                        //if(array_search($sno, $data_) !== false){ // checking unique serial no.
                        if(array_search($admssionno, $data_) !== false){ // Checking unique admission no.
                            if($i == 0){
                                $str = "<b class='sno_box'>".$admssionno."</b>";
                            } else {
                                $str = $str . " " . "<b class='sno_box'>".$admssionno."</b>";
                            }
                            $i=1;
                        } else {
                            if($this->searchData(trim($admssionno), $data) == 0 && trim($admssionno) != ''){
                                $data[] = array(
                                     'SCHOOL_NO'                    => trim($schoolno)!=''?$schoolno:'NA', 
                                     'BOOK_NO'                      => trim($bookno)!=''?$bookno:'NA', 
                                     'SNO'                          => trim($sno)!=''?$sno:'NA', 
                                     'ADMISSION_NO'                 => trim($admssionno)!=''?$admssionno:'NA', 
                                     'AFFILIATION_NO'               => trim($affiliationno)!=''?$affiliationno:'NA', 
                                     'RENEWED_UPTO'                 => trim($renewedupto)!=''?trim($renewedupto):'NA', 
                                     'SCHOOL_STATUS'                => trim($schoolstatus)!=''?trim($schoolstatus):'NA', 
                                     'REGNO_OF_CANDIDATE'           => trim($regno)!=''?trim($regno):'NA', 
                                     'CANDIDATE_NAME'               => trim($studentname)!=''?ucfirst($studentname):'NA',
                                     'CANDIDATE_ADHAAR'             => trim($studentadhaar)!=''?ucfirst($studentadhaar):'NA', 
                                     'MOTHERS_NAME'                 => trim($mother)!=''?ucfirst($mother):'NA', 
                                     'MOTHER_ADHAAR'                => trim($motheradhaar)!=''?ucfirst($motheradhaar):'NA',
                                     'FATHERS_NAME'                 => trim($father)!=''?ucfirst($father):'NA', 
                                     'FATHER_ADHAAR'                => trim($fatheradhaar)!=''?ucfirst($fatheradhaar):'NA',
                                     'NATIONALITY'                  => trim($nationality)!=''?trim($nationality):'NA', 
                                     'DOB_IN_FIGURES'               => trim($dobfigures)!=''?trim($dobfigures):'NA',
                                     'DOB_IN_WORDS'                 => trim($dob)!=''?trim($dob):'NA', 
                                     'SC_ST_OBC_GEN_CATEGORY'       => trim($category)!=''?trim(strtoupper($category)):'NA', 
                                     'STUDENT_FAILED'               => trim($studentfailed)!=''?trim($studentfailed):'NA', 
                                     'SUBJECT_OFFERED'              => trim($subjectoffered)!=''?trim($subjectoffered):'NA', 
                                     'LAST_STUDIED_CLASS'           => trim($laststudiedclass)!=''?trim($laststudiedclass):'NA', 
                                     'SCHOOL_OR_BOARD'              => trim($schoolorboard)!=''?trim($schoolorboard):'NA', 
                                     'PROMOTED'                     => trim($promoted)!=''?trim($promoted):'NA', 
                                     'DUES_PAID'                    => trim($duespaid)!=''?trim($duespaid):'NA', 
                                     'ANY_CONSESSION'               => trim($anyconcession)!=''?trim($anyconcession):'NA', 
                                     'NCC_SCOUT_GUIDE'              => trim($nccscoutguide)!=''?trim($nccscoutguide):'NA', 
                                     'DATE_OF_CUTTING_NAME'         => trim($dateofcuttingname)!=''?trim($dateofcuttingname):'NA', 
                                     'REASON_OF_LEAVING_SCHOOL'     => trim($reasonofleavingschool)!=''?trim($reasonofleavingschool):'NA', 
                                     'NO_OF_MEETING_UPTODATE'       => trim($noofmeetinguptodate)!=''?trim($noofmeetinguptodate):'NA', 
                                     'SCHOOL_DAYS_ATTENDED'         => trim($schooldaysattended)!=''?trim($schooldaysattended):'NA', 
                                     'GENERAL_CONDUCT_OF_STUDENT'   => trim($generalconduct)!=''?trim($generalconduct):'NA', 
                                     'REMARKS_IF_ANY'               => trim($remarksifany)!=''?trim($remarksifany):'NA', 
                                     'DATE_OF_ISSUE'                => trim($dateofissue)!=''?trim($dateofissue):'NA', 
                                     'USERNAME'                     => $this->session->userdata('ussr_'), 
                                     'DATE_'                        => date('Y-m-d H:i:s'), 
                                     'STATUS'                       => '1', 
                                     'SESSION_'                     => $session_,
                                     'CLASS_'                       => $class_,
                                     'ORIGINAL'                     => '0'
                                );
                            } else {
                                if($i == 0){
                                    $str = "<b class='sno_box'>".$sno."</b>";
                                } else {
                                    $str = $str . " " . "<b class='sno_box'>".$sno."</b>";
                                }
                                $i=1;
                            }
                        } 
                    }
                }
                if(count($data) != 0){
                    $this->em->insert($data, $session_, $class_);
                    if($str == ''){
                        $msg =  'Data Imported successfully';
                    } else {
                        $msg = count($data).' record(s) imported successfully, but still some duplicate record(s) found SNO as: '. $str;
                    }
                } else {
                    $msg = "Nothing uploaded. Duplicate Record(s) found havng SNO as: ".$str;
                }
            } else {
                $msg = "<span style='color:#0000ff'>Please correct your excel file.</span> Duplicate Admission No. found [".implode(", ", $duplicates)."] in the uploaded excel.";
            }
        }   
        echo json_encode($msg);
    }

    function searchData($data_, $arr_){ // Searcinh Admission Number
        $bool_ = 0;
        foreach ($arr_ as $item) {
            if($item['ADMISSION_NO'] == $data_){
                $bool_ = 1;
                break;
            }
        }
        return $bool_;
    }
    /*function searchData($data_, $arr_){ // Searching Serial Number
        $bool_ = 0;
        foreach ($arr_ as $item) {
            if($item['SNO'] == $data_){
                $bool_ = 1;
                break;
            }
        }
        return $bool_;
    }*/
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

    function printTCEnglish($tcid){
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
        $this->load->view('tc/printTC_English', $data);
        $this->load->view('templates/footer');

    }

    function deleteTCRecord($tcid){
        echo $this->em->deleteTCRecord($tcid);
    }

    /*function exportTC($table, $yr__){ // Export TC in csv format
        $this->em->exportTC($table, $yr__);
    }
    */

    // create xlsx
    public function exportTC($table, $yr__) { // Export TC in xlsx format
    // create file name
        $fileName = '_TC_List_'.$yr__.'.xlsx';  
    // load excel library
        $this->load->library('excel');
        $empInfo = $this->em->fetchTCDataToExport($table, $yr__);
        //zprint_r($empInfo); die();
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);

        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'CLASS');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'SCHOOL_NO');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'BOOK_NO');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'SNO');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'ADMISSION_NO');    
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'AFFILIATION_NO'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'RENEWED_UPTO');    
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'SCHOOL_STATUS'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'REGNO_OF_CANDIDATE'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'CANDIDATE_NAME'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'CANDIDATE_ADHAAR');
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'MOTHERS_NAME'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'MOTHER_ADHAAR');
        $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'FATHERS_NAME'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('O1', 'FATHER_ADHAAR');
        $objPHPExcel->getActiveSheet()->SetCellValue('P1', 'NATIONALITY'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'DOB_IN_FIGURES'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('R1', 'DOB_IN_WORDS'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('S1', 'SC_ST_OBC_GEN_CATEGORY'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('T1', 'STUDENT_FAILED'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('U1', 'SUBJECT_OFFERED'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('V1', 'LAST_STUDIED_CLASS'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('W1', 'SCHOOL_OR_BOARD'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('X1', 'PROMOTED'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('Y1', 'DUES_PAID'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('Z1', 'ANY_CONSESSION'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('AA1', 'NCC_SCOUT_GUIDE');
        $objPHPExcel->getActiveSheet()->SetCellValue('AB1', 'DATE_OF_CUTTING_NAME');
        $objPHPExcel->getActiveSheet()->SetCellValue('AC1', 'REASON_OF_LEAVING_SCHOOL');
        $objPHPExcel->getActiveSheet()->SetCellValue('AD1', 'NO_OF_MEETING_UPTODATE');
        $objPHPExcel->getActiveSheet()->SetCellValue('AE1', 'SCHOOL_DAYS_ATTENDED');
        $objPHPExcel->getActiveSheet()->SetCellValue('AF1', 'GENERAL_CONDUCT_OF_STUDENT');
        $objPHPExcel->getActiveSheet()->SetCellValue('AG1', 'REMARKS_IF_ANY');
        // set Row
        $rowCount = 2;
        foreach ($empInfo as $element) {           
            $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $element->CLASS);
            $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $element->SCHOOL_NO);
            $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $element->BOOK_NO);
            $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $element->SNO);
            $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $element->ADMISSION_NO);    
            $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $element->AFFILIATION_NO); 
            $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $element->RENEWED_UPTO);    
            $objPHPExcel->getActiveSheet()->SetCellValue('H' . $rowCount, $element->SCHOOL_STATUS); 
            $objPHPExcel->getActiveSheet()->SetCellValue('I' . $rowCount, $element->REGNO_OF_CANDIDATE); 
            $objPHPExcel->getActiveSheet()->SetCellValue('J' . $rowCount, $element->CANDIDATE_NAME); 
            $objPHPExcel->getActiveSheet()->SetCellValue('K' . $rowCount, $element->CANDIDATE_ADHAAR);
            $objPHPExcel->getActiveSheet()->SetCellValue('L' . $rowCount, $element->MOTHERS_NAME); 
            $objPHPExcel->getActiveSheet()->SetCellValue('M' . $rowCount, $element->MOTHER_ADHAAR);
            $objPHPExcel->getActiveSheet()->SetCellValue('N' . $rowCount, $element->FATHERS_NAME);
            $objPHPExcel->getActiveSheet()->SetCellValue('O' . $rowCount, $element->FATHER_ADHAAR); 
            $objPHPExcel->getActiveSheet()->SetCellValue('P' . $rowCount, $element->NATIONALITY); 
            $objPHPExcel->getActiveSheet()->SetCellValue('Q' . $rowCount, $element->DOB_IN_FIGURES);
            $objPHPExcel->getActiveSheet()->SetCellValue('R' . $rowCount, $element->DOB_IN_WORDS); 
            $objPHPExcel->getActiveSheet()->SetCellValue('S' . $rowCount, $element->SC_ST_OBC_GEN_CATEGORY); 
            $objPHPExcel->getActiveSheet()->SetCellValue('T' . $rowCount, $element->STUDENT_FAILED);
            $objPHPExcel->getActiveSheet()->SetCellValue('U' . $rowCount, $element->SUBJECT_OFFERED); 
            $objPHPExcel->getActiveSheet()->SetCellValue('V' . $rowCount, $element->LAST_STUDIED_CLASS); 
            $objPHPExcel->getActiveSheet()->SetCellValue('W' . $rowCount, $element->SCHOOL_OR_BOARD); 
            $objPHPExcel->getActiveSheet()->SetCellValue('X' . $rowCount, $element->PROMOTED); 
            $objPHPExcel->getActiveSheet()->SetCellValue('Y' . $rowCount, $element->DUES_PAID); 
            $objPHPExcel->getActiveSheet()->SetCellValue('Z' . $rowCount, $element->ANY_CONSESSION); 
            $objPHPExcel->getActiveSheet()->SetCellValue('AA' . $rowCount, $element->NCC_SCOUT_GUIDE);
            $objPHPExcel->getActiveSheet()->SetCellValue('AB' . $rowCount, $element->DATE_OF_CUTTING_NAME);
            $objPHPExcel->getActiveSheet()->SetCellValue('AC' . $rowCount, $element->REASON_OF_LEAVING_SCHOOL);
            $objPHPExcel->getActiveSheet()->SetCellValue('AD' . $rowCount, $element->NO_OF_MEETING_UPTODATE);
            $objPHPExcel->getActiveSheet()->SetCellValue('AE' . $rowCount, $element->SCHOOL_DAYS_ATTENDED);
            $objPHPExcel->getActiveSheet()->SetCellValue('AF' . $rowCount, $element->GENERAL_CONDUCT_OF_STUDENT);
            $objPHPExcel->getActiveSheet()->SetCellValue('AG' . $rowCount, $element->REMARKS_IF_ANY);
            $rowCount++;
        }
        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        // $objWriter->save($fileName); // If want to save the file at server-side
    // download file
        header("Content-Type: application/vnd.ms-excel");
        redirect(base_url($fileName)); // want to open and download at client-side      
    }
}