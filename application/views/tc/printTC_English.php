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

        <title>.: TC NO. <?php echo $tc_data->TCNO;?></title>

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
        <link href="<?php echo base_url('_assets_/css/mystyle.css'); ?>" rel="stylesheet" type="text/css">


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
        	@media print {
	            .print_size{
	                width:100%;
	            }
	            .line__print{
	            	padding: 0px; 
	            	border-bottom: border-bottom: #D0D0D0 solid 1px;
	            }
	        }
	        @media screen, print {
	        	body{
	        		margin: 0mm 0mm;
	        		font-family: 'Times New Roman';
	        	}
	        	.dynamic-text{
	        		text-transform: capitalize;
	        	}
	            .table_{
	            	background: #ffffff;
	            	color: #000090 !important;
	            }
	            td{
	            	padding: 4px 3px 3px 3px;
	            }
	            .header{
	            	font-size: 15px;
	            	font-weight: bold
	            }
	            .content{
	            	font-size: 15px;
	            	font-weight: bold;
	            }
	            U{
	            	color: #000000 !important;
	            }
	            .gap_{
	            	padding: 4px 5px; 
	            	vertical-align: top;
	            }
	            li{
	            	padding: 3px 0px;
	            }
	            td{
	            	line-height: 17px;
	            	vertical-align: top;
	            }
	            ._td{
	            	line-height: 0px !important; 
	            	vertical-align: top;	
	            	border: #090000 solid 0px;
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
	            	padding: 0px 0px 0px 0px;
	            	border-radius: 0px;	
	            	font-family: Arial;
	            	font-size: 13px;
	            }
	            .tc_heading{
	            	font-size: 20px; 
	            	padding: 0px 0px 10px 0px; 
	            	font-weight: bold
	            }
	            .school_name{
	            	font-size: 25px; padding: 0px 0px 0px 0px
	            }
	            u{
	            	text-decoration: none;
	            	font-size: 16px;
	            	padding: 0px 0px 0px 5px;
	            }
	            .labelhead{
	            	float: left; width: 110px
	            }
	            .labelhead_{
	            	float: right; 
	            	width: 110px;
	            	text-align: left;
	            	border: #f00000 solid 0px;
	            }
	            .labelcontent{
	            	float: left; 
	            	max-width: 150px;
	            	min-width: 120px;
	            	text-align: left;
	            	border: #f00000 solid 0px;	
	            	font-size: 13px !important;
	            	color: #000000;
	            	padding: 0px 0px 0px 4px;
	            }
	            .labelcontent_{
	            	float: right; 
	            	max-width: 150px;
	            	min-width: 122px;
	            	text-align: left;
	            	border: #f00000 solid 0px;	
	            	font-size: 13px !important;
	            	color: #000000;
	            	padding: 0px 0px 0px 4px;
	            }
	            hr{
	            	padding: 0px !important;
	            }
	            .line__{
	            	padding: 0px; border-bottom: #D0D0D0 solid 1px;
	            }
	        }
        </style>
    </head>
    <?php $num_ = 1;?>
    <body onload="//window.print();">
    	<center>
    		<div class="container">
	    		<div class="row">
	    			<div class="col-sm-12 col-md-12 col-lg-12">
	    				<table border="0" class="print_size" width="80%" height="auto" cellpadding="10" class="table_" align="center" style="background: #ffffff">
	    				    <tr>
	    				        <td></td>
	    				        <td style="padding: 7px 0px 0px 0px; text-align:right; vertical-align: top" colspan="2">Ph.:<?php echo $school_profile['sch_contact'];?>&nbsp;</td>
	    				    </tr>
	    					<tr>
	    						<td width="120">
	    							<img src='<?php echo base_url("_assets_/logo/logo.jpg"); ?>?ver=1.1' width="140" / ><br>
	    						</td>
	    						<td align="center" class="header">
	    							<?php if($tc_data->ORIGINAL != 1){ ?>
	    							<div class="tccopy"><?php echo $copy__;?></div>
	    							<?php } ?>
	    							<div class="tc_heading">TRANSFER CERTIFICATE</div>
	    							<div class="school_name" style="font-family: DoonConvent"><?php echo strtoupper($school_profile['sch_name']);?></div>
	    							<i style="font-size: 12px">(Affiliated to CBSE New Delhi: Affiliation Code No 3530334, School Code: 81562)</i><br>
	    							<b style="font-size: 16px"><?php echo $school_profile['sch_addr'].", ".$school_profile['sch_city']." (".$school_profile['sch_distt'].")";?>
	    							</b>
	    						</td>
	    						<td width="50">
	    						</td>
	    					</tr>
	    					
	    					<tr class="content">
	    						<td colspan="3">
	    							<table border="0" width="100%" height="auto" cellpadding="10" class="table_" align="center" style="background: #ffffff" class="content">
	    								
	    								<tr>
	    									<td class="_td">
	    										<table border="0" width="100%">
	    											<tr>
	    												<td colspan="4" class="_td">
	    													<table border="0" width="100%">
	    														<tr>
				    												<td width="35%" class="_td"><b class="tcno">TC. NO. - <?php echo $tc_data->TCNO;?></b></td>
				    												<td width="30%" colspan="2" class="_td"></td>
				    												<td width="35%" class="_td" style="text-align: right"><b class="tcno">Date: <u><?php echo date('d-m-Y');?></b></td>
				    											</tr>
	    													</table>
	    												</td>
	    											<tr>
	    												<td colspan="4" height="10"></td>
	    											</tr>
	    											<tr>
	    												<td colspan="4"><div class="line__ line__print"></div></td>
	    											</tr>
	    											<tr>
	    												<td width="50%" class="_td"  style="text-align: left; line-height: 16px !important; font-family: Arial; font-size: 13px">
	    													<div class="labelhead">School No.</div>
	    													<div class="labelcontent">: <?php echo '81562';//$tc_data->SCHOOL_NO;?></div>
	    													<div style="clear: both; height: 1px; padding: 1px 0px"></div>

	    													<div class="labelhead">Book No.</div>
	    													<div class="labelcontent">: <?php echo $tc_data->BOOK_NO;?></u></div>
	    													<div style="clear: both; height: 1px; padding: 1px 0px"></div>
	    													
	    													<div class="labelhead">S.No.</div>
	    													<div class="labelcontent">: <?php echo $tc_data->SNO;?></div>
	    													<div style="clear: both; height: 1px; padding: 1px 0px"></div>

	    													<div class="labelhead">Admission No.</div>
	    													<div class="labelcontent">: <?php echo $tc_data->ADMISSION_NO;?></div>
	    													<div style="clear: both; height: 1px; padding: 1px 0px"></div>
	    												</td>
	    												<td width="50%" class="_td"  style="text-align: right; line-height: 16px !important; font-family: Arial; font-size: 13px">
	    													<div class="labelcontent_">: <?php echo $tc_data->AFFILIATION_NO;?></div>
	    													<div class="labelhead_">Affiliation No.</div>
	    													<div style="clear: both; height: 1px; padding: 1px 0px"></div>

	    													<div class="labelcontent_">: <?php echo $tc_data->RENEWED_UPTO;?></div>
	    													<div class="labelhead_">Renewed upto</div>
	    													<div style="clear: both; height: 1px; padding: 1px 0px"></div>
	    													
	    													<div class="labelcontent_">: Senior Secondary</div>
	    													<div class="labelhead_">Status of School</div>
	    													<div style="clear: both; height: 1px; padding: 1px 0px"></div>
	    												</td>
	    											</tr>
	    											<tr>
	    												<td colspan="4"><div class="line__ line__print"></div></td>
	    											</tr>
	    											<!--tr>
	    												<td width="25%" class="_td"  style="padding: 0px !important; height: 15px !important; text-align: left">
	    													 School No. : <u><?php echo '81562';//$tc_data->SCHOOL_NO;?></u></td>
	    												<td width="25%" class="_td"  style="padding: 0px !important; height: 15px !important; text-align: left">Book No. : <u><?php echo $tc_data->BOOK_NO;?></u></td>
	    												<td width="25%" class="_td" style="text-align: center">
	    													S.N. : <u><?php echo $tc_data->SNO;?></u></td>
	    												<td width="25%" class="_td" style="text-align: right">
	    													Admission No. : <u><?php echo $tc_data->ADMISSION_NO;?></b></td>
	    											</tr-->
	    											<!--tr>
	    												<td colspan="4" style="padding: 0px !important; height: 15px !important"></td>
	    											</tr>
	    											<tr>
	    												<td width="25%" style="padding: 0px !important;"> Affiliation No. : <u><?php echo $tc_data->AFFILIATION_NO;?></u></td>
	    												<td width="25%" style="padding: 0px !important; text-align: left">Renewed upto : <u><?php echo $tc_data->RENEWED_UPTO;?></u></td>
	    												<td colspan="2" width="50%" style="padding: 0px !important; text-align: right">Status of School : <u>Senior Secondary</u></td>
													</tr>
	    											<tr>
	    												<td colspan="4" style="padding: 0px !important; height: 10px !important"></td>
	    											</tr-->
	    											<tr>
	    												<td colspan="4">
	    													Registration No. of Candidate (in case Class - IX to XII)<u>: <?php echo $tc_data->REGNO_OF_CANDIDATE;?></u>
	    												</td>
	    											</tr>
	    											<tr>
	    												<td colspan="4"><div class="line__ line__print"></div></td>
	    											</tr>
	    										</table>
	    									</td>
	    								</tr>
	    								<tr>
	    									<td>
	    										<table>
	    											<tr>
	    												<td><?php echo $num_++;?>.</td>
				    									<td>Name of Pupil </td>
				    									<td class="gap_">:</td>
				    									<td class="dynamic-text"><u><?php echo strtolower($tc_data->CANDIDATE_NAME);?></u></td>
				    								</tr>
				    								<tr>
	    												<td><?php echo $num_++;?>.</td>
				    									<td>Student's Adhaar Card <i>(optional)</i> </td>
				    									<td class="gap_">:</td>
				    									<td class="dynamic-text"><u><?php echo strtolower($tc_data->CANDIDATE_ADHAAR);?></u></td>
				    								</tr>
				    								<tr>
				    									<td><?php echo $num_++;?>.</td>
				    									<td>Mother's Name </td>
				    									<td class="gap_">:</td>
				    									<td class="dynamic-text"><u><?php echo strtolower($tc_data->MOTHERS_NAME);?></u></td>
				    								</tr>
				    								<tr>
	    												<td><?php echo $num_++;?>.</td>
				    									<td>Mother's Adhaar Card <i>(optional)</i> </td>
				    									<td class="gap_">:</td>
				    									<td class="dynamic-text"><u><?php echo strtolower($tc_data->MOTHER_ADHAAR);?></u></td>
				    								</tr>
				    								<tr>
				    									<td><?php echo $num_++;?>.</td>
				    									<td>Father's Name </td>
				    									<td class="gap_">:</td>
				    									<td class="dynamic-text"><u><?php echo strtolower($tc_data->FATHERS_NAME);?></u></td>
				    								</tr>
				    								<tr>
	    												<td><?php echo $num_++;?>.</td>
				    									<td>Father's Adhaar Card <i>(optional)</i> </td>
				    									<td class="gap_">:</td>
				    									<td class="dynamic-text"><u><?php echo $tc_data->FATHER_ADHAAR;?></u></td>
				    								</tr>
				    								<tr>
				    									<td><?php echo $num_++;?>.</td>
				    									<td>Nationality </td>
				    									<td class="gap_">:</td>
				    									<td><u><?php echo ucwords($tc_data->NATIONALITY);?></u></td>
				    								</tr>
				    								<tr>
				    									<td><?php echo $num_++;?>.</td>
				    									<td>Whether the pupil belongs to SC/ST/OBC Category </td>
				    									<td class="gap_">:</td>
				    									<td><u><?php echo ucwords(strtolower($tc_data->SC_ST_OBC_GEN_CATEGORY));?></u></td>
				    								</tr>
				    								<tr>
				    									<td><?php echo $num_++;?>.</td>
				    									<td>Date of Birth according to the Admission Register <i>(in figures)</i> </td>
				    									<td class="gap_">:</td>
				    									<td><u><?php echo ucwords($tc_data->DOB_IN_FIGURES);?></u></td>
				    								</tr>
				    								<tr>
				    									<td><?php echo $num_++;?>.</td>
				    									<td>Date of Birth according to the Admission Register <i>(in words)</i> </td>
				    									<td class="gap_">:</td>
				    									<td><u><?php echo ucwords($tc_data->DOB_IN_WORDS);?></u></td>
				    								</tr>
				    								<tr>
				    									<td><?php echo $num_++;?>.</td>
				    									<td>Whether the student is failed? </td>
				    									<td class="gap_">:</td>
				    									<td><u><?php echo ucwords($tc_data->STUDENT_FAILED);?></u></td>
				    								</tr>
				    								<tr>
				    									<td><?php echo $num_++;?>.</td>
				    									<td>Subjects Offered </td>
				    									<td class="gap_">:</td>
				    									<td><u><?php echo ucwords($tc_data->SUBJECT_OFFERED);?></u></td>
				    								</tr>
				    								<tr>
				    									<td><?php echo $num_++;?>.</td>
				    									<td>Class in which the pupil last studied </td>
				    									<td class="gap_">:</td>
				    									<td><u><?php echo ucwords($tc_data->LAST_STUDIED_CLASS);?></u></td>
				    								</tr>
				    								<tr>
				    									<td><?php echo $num_++;?>.</td>
				    									<td>School/Board Annual examination last taken with result </td>
				    									<td class="gap_">:</td>
				    									<td><u><?php echo ucwords($tc_data->SCHOOL_OR_BOARD);?></u></td>
				    								</tr>
				    								<tr>
				    									<td><?php echo $num_++;?>.</td>
				    									<td>Whether qualified for promotion to the next higher class </td>
				    									<td class="gap_">:</td>
				    									<td><u><?php echo ucwords($tc_data->PROMOTED);?></u></td>
				    								</tr>
				    								<tr>
				    									<td><?php echo $num_++;?>.</td>
				    									<td>Whether the pupil was paid all dues to the school </td>
				    									<td class="gap_">:</td>
				    									<td><u><?php echo ucwords($tc_data->DUES_PAID);?></u></td>
				    								</tr>
				    								<tr>
				    									<td><?php echo $num_++;?>.</td>
				    									<td>Whether the pupil has in receipt of any fee consession, <br>if so the nature of such concession </td>
				    									<td class="gap_">:</td>
				    									<td><u><?php echo ucwords($tc_data->ANY_CONSESSION);?></u></td>
				    								</tr>
				    								<tr>
				    									<td><?php echo $num_++;?>.</td>
				    									<td>Whether the pupil is NCC Cadet/ Boy Scout/ <br>Girl Guide (give details) </td>
				    									<td class="gap_">:</td>
				    									<td><u><?php echo ucwords($tc_data->NCC_SCOUT_GUIDE);?></u></td>
				    								</tr>
				    								<tr>
				    									<td><?php echo $num_++;?>.</td>
				    									<td>Date of which pupil's name was struck off from <br>the rolls of the school </td>
				    									<td class="gap_">:</td>
				    									<td><u><?php echo ucwords($tc_data->DATE_OF_CUTTING_NAME);?></u></td>
				    								</tr>
				    								<tr>
				    									<td><?php echo $num_++;?>.</td>
				    									<td>Reason for leaving the school </td>
				    									<td class="gap_">:</td>
				    									<td><u><?php echo ucwords($tc_data->REASON_OF_LEAVING_SCHOOL);?></u></td>
				    								</tr>
				    								<tr>
				    									<td><?php echo $num_++;?>.</td>
				    									<td>No. of meetings up to date </td>
				    									<td class="gap_">:</td>
				    									<td><u><?php echo ucwords($tc_data->NO_OF_MEETING_UPTODATE);?></u></td>
				    								</tr>
				    								<tr>
				    									<td><?php echo $num_++;?>.</td>
				    									<td>Total number of attendance till last date</td>
				    									<td class="gap_">:</td>
				    									<td><u><?php echo ucwords($tc_data->SCHOOL_DAYS_ATTENDED);?></u></td>
				    								</tr>
				    								<tr>
				    									<td><?php echo $num_++;?>.</td>
				    									<td>General Conduct </td>
				    									<td class="gap_">:</td>
				    									<td><u><?php echo ucwords($tc_data->GENERAL_CONDUCT_OF_STUDENT);?></u></td>
				    								</tr>
				    								<tr>
				    									<td><?php echo $num_++;?>.</td>
				    									<td>Any other remarks </td>
				    									<td class="gap_">:</td>
				    									<td><u><?php echo ucwords($tc_data->REMARKS_IF_ANY);?></u></td>
				    								</tr>
				    								<tr>
				    									<td><?php echo $num_++;?>.</td>
				    									<td>Date of issue of certificate </td>
				    									<td class="gap_">:</td>
				    									<td><u><?php echo $dt_issue[2]."-".$dt_issue[1]."-".$dt_issue[0];?></u></td>
				    								</tr>
	    										</table>
	    									</td>
	    								</tr>
	    								</tr>
	    								<tr>
	    									<td colspan="3" style="padding: 5px 0px; height: 60px;"></td>
	    								</tr>
	    								<tr>
	    									<td colspan="3">
	    										<table border="0" width="100%" height="auto" cellpadding="10" class="table_" align="center" style="background: #ffffff" class="content">
	    											<tr>
	    												<td width="10"></td>
	    												<td align="center" style="border-top: #000000 solid 1px">Prepared by<br>(Name &amp; Designation)</td>
	    												<td width="10"></td>
	    												<td align="center" style="border-top: #000000 solid 1px">Checked by<br>(Name &amp; Designation)</td>
	    												<td width="10"></td>
	    												<td align="center" style="border-top: #000000 solid 1px">Signature of Principal<br>(with official seal)</td>
	    												<td width="10"></td>
	    											</tr>
	    										</table>
	    									</td>
	    								</tr>
	    								<tr>
	    									<td colspan="3" style="font-size: 11px !important">
	    										Note: If this T.C. is isuued by the officiating/ Incharge Principal, it should in variably be countersigned by the Manager.
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