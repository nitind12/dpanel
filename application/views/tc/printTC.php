<?php
	if($tc_data->ORIGINAL == 1){
		$copy__ = 'ORIGINAL';
	} else {
		$copy__ = 'DUPLICATE';
	}
	$dt_issue = explode('-',$tc_data->DATE_OF_ISSUE);

?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <title>.: <?php echo _SCHOOL_; ?>: Transfer Certificate</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Transfer Certificate">
        <meta name="author" content="<?php echo _SCHOOL_;?>">

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url('_assets_/admin_sources/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url('_assets_/admin_sources/bower_components/metisMenu/dist/metisMenu.min.css'); ?>" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="<?php echo base_url('_assets_/admin_sources/dist/css/timeline.css'); ?>" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url('_assets_/admin_sources/dist/css/sb-admin-2.css'); ?>" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="<?php echo base_url('_assets_/admin_sources/bower_components/morrisjs/morris.css'); ?>" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url('_assets_/admin_sources/bower_components/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('_assets_/css/mycss.css'); ?>" rel="stylesheet" type="text/css">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript">
            base_url_ = "<?php echo base_url(); ?>";
            site_url_ = "<?php echo site_url(); ?>";
        </script>
        <style media="all">
        	body{
        		margin: 0mm 0mm;
        		font-family: 'Times New Roman'
        	}
            .table_{
            	background: #ffffff;
            	color: #000090 !important;
            }
            .header{
            	font-size: 13px;
            	font-weight: bold
            }
            .content{
            	font-size: 12px;
            	font-weight: bold;
            }
            U{
            	color: #000000 !important;
            }
            .gap_{
            	padding: 0px 5px; 
            }
            li{
            	padding: 3px 0px;
            }
            td{
            	line-height: 20px;
            }
            .tccopy{
            	position: absolute;
            	float: left;
            	z-index: 99999;
            	border: #000090 solid 2px;
            	padding: 2px 2px;
            	border-radius: 0px;
            }
            .tcno{
            	position: relative;
            	text-align: left;
            	color: #000000;
            	z-index: 99999;
            	padding: 0px 0px 0px 5px;
            	border-radius: 0px;	
            	font-family: verdana;
            }
        </style>
    </head>

    <body onload="//window.print();">
    	<center>
    		<div class="container">
	    		<div class="row">
	    			<div class="col-sm-12 col-md-12 col-lg-12">
	    				<table border="0" width="80%" height="auto" cellpadding="10" class="table_" align="center" style="background: #ffffff">
	    				    <tr>
	    				        <td></td>
	    				        <td style="padding: 7px 0px 0px 0px; text-align:right; vertical-align: top">Ph.:<?php echo $school_profile['sch_contact'];?></td>
	    				        <td></td>
	    				    </tr>
	    					<tr>
	    						<td width="120">
	    							<img src='<?php echo base_url("_assets_/logo/logo.jpg"); ?>?ver=1.0' width="120" / ><br>
	    							<b style="font-size:7px; font-family: Arial">*NOBLE IN THOUGHT AND DEED*</b>
	    						</td>
	    						<td align="center" class="header">
	    							<?php if($tc_data->ORIGINAL != 1){ ?>
	    							<div class="tccopy"><?php echo $copy__;?></div>
	    							<?php } ?>
	    							<h2 style="text-align: center"><?php echo strtoupper($school_profile['sch_name']);?></h2>
	    							<i style="font-size: 12px">(Affiliated to CBSE New Delhi: Affiliation Code No 3530334, School Code: 81562)</i><br>
	    							<b style="font-size: 16px"><?php echo $school_profile['sch_addr'].", ".$school_profile['sch_city']." (".$school_profile['sch_distt'].")";?></b>
	    						</td>
	    						<td width="50">
	    						</td>
	    					</tr>
	    					<tr>
	    						<td colspan="3">
	    							<table border="0" width="80%" height="auto" cellpadding="10" class="table_" align="center" style="background: #ffffff">
	    								<tr>
	    									<td width="100"></td>
	    									<td align="center">
	    										<div style="padding: 5px 0px; width: 500px; font-size: 20px; font-weight: bold" class="col-sm-3">
			    									छात्र पत्रावली तथा स्थानांतरण प्रमाण-पत्र<br>
			    									<span style="font-size: 13px">(Scholar's Register &amp; Transfer Certificate Form)</span>
			    								</div>
	    									</td>
	    									<td width="100"></td>
	    								</tr>
		    						</table>
	    						</td>
	    					</tr>
	    					<tr class="content">
	    						<td colspan="3">
	    							<table border="0" width="100%" height="auto" cellpadding="10" class="table_" align="center" style="background: #ffffff" class="content">
	    								
	    								<tr>
	    									<td>
	    										<b class="tcno">TC. NO. - <?php echo $tc_data->TCNO;?></b>
	    										<b class="tcno" style="float: right">Date of Issue: <u><?php echo $dt_issue[2]."-".$dt_issue[1]."-".$dt_issue[0];?></u></b><br>
	    										विद्यालय सं0/ School No. <u><?php echo $tc_data->SCHOOL_NO;?></u><span class="gap_"></span>पुस्तक नं/ Book No. <u><?php echo $tc_data->BOOK_NO;?></u><span class="gap_"></span>क्रम सं/ S.N. <u><?php echo $tc_data->SNO;?></u><span class="gap_"></span>प्रवेश सं/ Admission No. <u><?php echo $tc_data->ADMISSION_NO;?></u><span class="gap_"></span>
	    										<br>
	    										Affiliation No. <u><?php echo $tc_data->AFFILIATION_NO;?></u><span class="gap_"></span><span class="gap_"></span>Renewed upto <u><?php echo $tc_data->RENEWED_UPTO;?></u><span class="gap_"></span>Status of School <u><?php echo $tc_data->SCHOOL_STATUS;?></u>
	    										<br>
	    										Registration No. of Candidate (in case Class - IX to XII) <u><?php echo $tc_data->REGNO_OF_CANDIDATE;?></u>
	    									</td>
	    								</tr>
	    								<tr>
	    									<td>
	    										<ol>
	    											<li>विद्यार्थी का नाम/ Name of Pupil: <u><?php echo ucwords($tc_data->CANDIDATE_NAME);?></u></li>

	    											<li>माता का नाम/ Mother's Name: <u><?php echo ucwords($tc_data->MOTHERS_NAME);?></u></li>
	    											
	    											<li>पिता का नाम/ Father's Name: <u><?php echo ucwords($tc_data->FATHERS_NAME);?></u></li>
	    											
	    											<li>राष्ट्रीयता/ Nationality: <u><?php echo strtoupper($tc_data->NATIONALITY);?></u></li>
	    											
	    											<li>क्या अनु०जाति/ जनजाति/ पिछड़ा वर्ग से सम्बंधित है : /Whether the pupil belongs to SC/ST/OBC Category: <u><?php echo strtoupper($tc_data->SC_ST_OBC_GEN_CATEGORY);?></u></li>
	    											
	    											<li>प्रवेश पुस्तिका के अनुसार  जन्म-तिथि/ DOB according to the Admission Register (अंकों में/in figure): <u><?php echo strtoupper($tc_data->DOB_IN_WORDS);?></u></li>
	    											
	    											<li>क्या विद्यार्थी का परीक्षा परिणाम अनुतीर्ण है/ Whether the student is failed: <u><?php echo strtoupper($tc_data->STUDENT_FAILED);?></u></li>
	    											
	    											<li>प्रस्तावित विषय/ Subject Offered: <u><?php echo strtoupper($tc_data->SUBJECT_OFFERED);?></u></li>
	    											
	    											<li>पिछली कक्षा जिसमे विद्यार्थी अध्यनरत था/ Class in which the pupil last studied: <u><?php echo $tc_data->LAST_STUDIED_CLASS;?></u></li>
	    											
	    											<li>पिछले विद्यालय/ बोर्ड परीक्षा एवं परिणाम/ School/Board Annual examination last taken with result: <u><?php echo $tc_data->SCHOOL_OR_BOARD;?></u></li>
	    											
	    											<li>क्या उच्च कक्षा में पदोन्नति केअधिकारी है<br> Whether qualified for promotion to the next higher class: <u><?php echo $tc_data->PROMOTED;?></u></li>
	    											
	    											<li>क्या विधार्थी ने विद्यालय को सभी देय राशि का भुगतान कर दिया है<br> Whether the pupil was paid all dues to the school: <u><?php echo $tc_data->DUES_PAID;?></u></li>
	    											
	    											<li>क्या विधार्थी को कोई शुल्क रियायत प्रदान की गयी थी, यदि हाँ तो उसकी प्रकति<br> Whether the pupil was in receipt of any fee consession, if so the nature of such concession: <u><?php echo $tc_data->ANY_CONSESSION;?></u></li>

													<li>क्या विधार्थी ऐन०सी०सी० कैडिट/ स्काउट है? विवरण दें<br> Whether the pupil is NCC Cadet/ Boy Scout/ Girl Guide (give details): <u><?php echo $tc_data->NCC_SCOUT_GUIDE;?></u></li>

													<li>विद्यालय से विद्यार्थी का नाम काटे जाने की तिथि<br> Date of which pupil's name was struck off the rolls of the school: <u><?php echo $tc_data->DATE_OF_CUTTING_NAME;?></u></li>

													<li>विद्यालय छोड़ने का कारण/ Reason for leaving the school: <u><?php echo $tc_data->REASON_OF_LEAVING_SCHOOL;?></u></li>

													<li>अंतिम तिथि तक उपस्थितियों की कुल संख्या/ No. of meetings up to date: <u><?php echo $tc_data->NO_OF_MEETING_UPTODATE;?></u></li>

													<li>विद्यार्थी की विद्यालय दिनों की कुल उपस्थितियाँ/ No. of school days the pupil attended: <u><?php echo $tc_data->SCHOOL_DAYS_ATTENDED;?></u></li>

													<li>कोई अन्य टिप्प्पणी/ Any other remarks: <u><?php echo $tc_data->REMARKS_IF_ANY;?></u></li>

													<li>प्रमाण पत्र जारी करने की तिथि/ Date of issue of certificate: <u><?php echo $tc_data->DATE_OF_ISSUE;?></u></li>
	    										</ol>
	    									</td>
	    								</tr>
	    								<tr>
	    									<td colspan="3" style="padding: 5px 0px; height: 25px;"></td>
	    								</tr>
	    								<tr>
	    									<td colspan="3">
	    										<table border="0" width="100%" height="auto" cellpadding="10" class="table_" align="center" style="background: #ffffff" class="content">
	    											<tr>
	    												<td width="10"></td>
	    												<td align="center" style="border-top: #000000 solid 1px">हस्ताक्षरकर्ता/ Prapared by<br>(Name &amp; Designation)</td>
	    												<td width="10"></td>
	    												<td align="center" style="border-top: #000000 solid 1px">जााँचकर्ता/ Checked by<br>(Name &amp; Designation)</td>
	    												<td width="10"></td>
	    												<td align="center" style="border-top: #000000 solid 1px">ह० प्राचार्य/ कार्यालय मोहर<br>(Name &amp; Designation)</td>
	    												<td width="10"></td>
	    											</tr>
	    										</table>
	    									</td>
	    								</tr>
	    								<tr>
	    									<td colspan="3" style="font-size: 11px !important">
	    										नोट: यदि इस प्रबंधन केंद्र इंचार्ज द्वारा प्रमाणित हो तो प्रबंधक/ अध्यक्ष विद्यालय प्रबंधन समिति द्वारा प्रति हस्ताक्षरित आवशयक है |<br>
	    										Note: If this T.C. is certified by the officiating/ Incharge Principal, in variably countersigned by the Manager V.M.C.
	    									</td>
	    								</tr>
	    							</table>
	    						</td>
	    					</tr>
	    				</table>
	    			</div>
	    		</div>
	    	</div>
    	</center>

<!-- jQuery -->
<script src="<?php echo base_url('_assets_/admin_sources/bower_components/jquery/dist/jquery.min.js'); ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('_assets_/admin_sources/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url('_assets_/admin_sources/bower_components/metisMenu/dist/metisMenu.min.js'); ?>"></script>

<!-- Morris Charts JavaScript -->
<script src="<?php echo base_url('_assets_/admin_sources/bower_components/raphael/raphael-min.js'); ?>"></script>
<script src="<?php echo base_url('_assets_/admin_sources/bower_components/morrisjs/morris.min.js'); ?>"></script>
<script src="<?php echo base_url('_assets_/admin_sources/js/morris-data.js'); ?>"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url('_assets_/admin_sources/dist/js/sb-admin-2.js'); ?>"></script>
<script src="<?php echo base_url('_assets_/admin_sources/bower_components/jquery/dist/jquery-2.1.1.min.js'); ?>"></script>        
<script src="<?php echo base_url('_assets_/admin_sources/bower_components/jquery/dist/jquery.form.min.js'); ?>"></script>
<script src="<?php echo base_url('_assets_/admin_sources/js/adminJS.js'); ?>"></script>  
<script type="text/javascript" src="<?php echo base_url('_assets_/js/agijs.js');?>?ver=3.9"></script>  
<script>
    var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);

    if (!isChrome){
        document.getElementById("doc__").innerHTML = "<div style='padding: 25px; text-align: center; font-size: 25px; color: #900000; font-weight: bold'>- Please switch to <span style='color: #ff0000'>google { chrome } browser</span> to use this application. -</div>"; 
    } 
</script>
</body>
</html>