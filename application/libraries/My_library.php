<?php
class My_library {
    function heading_for_page($value_) {
        switch ($value_) {
            case 1:
                $data['tmp'] = "About Doon Convent School";
                $data['keys_'] = 'About, Objective, Vision & Mission, Profile, Doon Convent School, School';
                $data['desc_'] = 'Doon Convent School';
                $data['pagename'] = 'ABOUT';
                break;
            case 2:
                $data['tmp'] = "Vision And Mission Doon Convent School";
                $data['keys_'] = 'Vision And Mission Doon Convent School, School, Doon Convent School';
                $data['desc_'] = '<b>School Goals:</b> Promote Inclusive Education, Reduce carbon foot-print, Reduce Garbage generation';
                $data['pagename'] = 'Vision &amp; Mission';
                break;
            case 3:
                $data['tmp'] = "Contact Doon Convent School";
                $data['keys_'] = 'Contact, School, Doon Convent School';
                $data['desc_'] = 'Doon Convent School';
                $data['pagename'] = 'CONTACT US';
                break;
            case 4:
                $data['tmp'] = "Principals Message Doon Convent School";
                $data['keys_'] = 'Principals Message,Contact, School, Doon Convent School';
                $data['desc_'] = '&OpenCurlyDoubleQuote; We as responsible adults need to practise and impart positive values. The school is an extension to such a healthy eco-system. &CloseCurlyDoubleQuote;';
                $data['pagename'] = 'MESSAGE FROM PRINCIPAL';
                break;
            case 5:
                $data['tmp'] = "Director Message Doon Convent School";
                $data['keys_'] = 'Director Message,Contact, School, Doon Convent School';
                $data['desc_'] = '&OpenCurlyDoubleQuote; One of the main objective of school education is to make a child fearless &CloseCurlyDoubleQuote;';
                $data['pagename'] = 'MESSAGE FROM DIRECTOR';
                break;
            case 6:
                $data['tmp'] = "Infrastructure Doon Convent School";
                $data['keys_'] = 'Infrastructure, Principals Message,Contact, School, Doon Convent School';
                $data['desc_'] = '';
                $data['pagename'] = 'INFRASTRUCTURE';
                break;
            case 7:
                $data['tmp'] = "Goal Sharing Doon Convent School";
                $data['keys_'] = 'Goal Sharing Infrastructure, Principals Message,Contact, School, Doon Convent School';
                $data['desc_'] = '';
                $data['pagename'] = 'GOAL SETTING &amp; SHARING';
                break;
            case 8:
                $data['tmp'] = "Shared Leadership Doon Convent School";
                $data['keys_'] = 'Shared Leadership Goal Sharing Infrastructure, Principals Message,Contact, School, Doon Convent School';
                $data['desc_'] = '';
                $data['pagename'] = 'SHARED LEADERSHIP';
                break;
            case 9:
                $data['tmp'] = "Learning Environment Doon Convent School";
                $data['keys_'] = 'Learning Environment, Infrastructure, Principals Message,Contact, School, Doon Convent School';
                $data['desc_'] = '';
                $data['pagename'] = 'LEARNING ENVIRONMENT';
                break;
            case 10:
                $data['tmp'] = "Pursuit of Excellence Doon Convent School";
                $data['keys_'] = 'Pursuit of Excellence, Infrastructure, Principals Message,Contact, School, Doon Convent School';
                $data['desc_'] = '';
                $data['pagename'] = 'PURSUIT OF EXCELLENCE';
                break;
            case 11:
                $data['tmp'] = "School Culture Doon Convent School";
                $data['keys_'] = 'School Culture Goal Sharing Infrastructure, Principals Message,Contact, School, Doon Convent School';
                $data['desc_'] = '';
                $data['pagename'] = 'SCHOOL CULTURE';
                break;
            case 12:
                $data['tmp'] = "Sustainability Doon Convent School";
                $data['keys_'] = 'sustainability, Infrastructure, Principals Message,Contact, School, Doon Convent School';
                $data['desc_'] = '';
                $data['pagename'] = 'SUSTAINABILITY';
                break;
            case 13:
                $data['tmp'] = "Other Information Doon Convent School";
                $data['keys_'] = 'Other Information Goal Sharing Infrastructure, Principals Message,Contact, School, Doon Convent School';
                $data['desc_'] = '';
                $data['pagename'] = 'OTHER INFORMATION';
                break;
            case 14:
                $data['tmp'] = "Admission Doon Convent School";
                $data['keys_'] = 'Admission,Goal Sharing Infrastructure, Principals Message,Contact, School, Doon Convent School';
                $data['desc_'] = 'Doon Convent School';
                $data['pagename'] = 'ADMISSION';
                break;
            case 15:
                $data['tmp'] = "Vision and Mission Doon Convent School";
                $data['keys_'] = 'Vision and Mission,Goal Sharing Infrastructure, Principals Message,Contact, School, Doon Convent School';
                $data['desc_'] = '';
                $data['pagename'] = 'VISION & MISSION';
                break;
            case 16:
                $data['tmp'] = "Objective Doon Convent School";
                $data['keys_'] = 'Objective,Goal Sharing Infrastructure, Principals Message,Contact, School, Doon Convent School';
                $data['desc_'] = '';
                $data['pagename'] = 'OBJECTIVE';
                break;
            case 17:
                $data['tmp'] = "Gallery Doon Convent School";
                $data['keys_'] = 'Gallery ,Goal Sharing Infrastructure, Principals Message,Contact, School, Doon Convent School';
                $data['desc_'] = '';
                $data['pagename'] = 'GALLERY';
                break;
            case 18:
                $data['tmp'] = "T.C. Doon Convent School";
                $data['keys_'] = 'TC, Transfer Certificate ,Goal Sharing Infrastructure, Principals Message,Contact, School, Doon Convent School';
                $data['desc_'] = '';
                $data['pagename'] = 'Transfer Certificate(s) (TC)';
                break;
            case 19:
                $data['tmp'] = "Annual Reports Doon Convent School";
                $data['keys_'] = 'Annual Reports, Transfer Certificate ,Goal Sharing Infrastructure, Principals Message,Contact, School, Doon Convent School';
                $data['desc_'] = '';
                $data['pagename'] = 'ANNUAL REPORTS';
                break;
            case 20:
                $data['tmp'] = "Activities: Doon Convent School";
                $data['keys_'] = 'Activities, Transfer Certificate ,Goal Sharing Infrastructure, Principals Message,Contact, School, Doon Convent School';
                $data['desc_'] = '';
                $data['pagename'] = 'ACTIVITIES';
                break;
            case 21:
                $data['tmp'] = "Newsletters: Doon Convent School";
                $data['keys_'] = 'Newsletters, Activities, Transfer Certificate ,Goal Sharing Infrastructure, Principals Message,Contact, School, Doon Convent School';
                $data['desc_'] = '';
                $data['pagename'] = 'NEWSLETTERS';
                break;
            default:
                $data['tmp'] = "Heading Error";
                $data['keys_'] = 'Doon Convent School';
                $data['desc_'] = 'Doon Convent School';
                $data['pagename'] = 'Error Page';
        }
        return $data;
    }

}
