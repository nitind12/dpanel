$(function(){
	var facid_for_sequence = 'x';
    $(window).on("load", function () {
        if ($("#frmFacultySeq").length != 0) {
            fill_faculty_for_sequence('');
        }
    $('#old_pwd').focus(function(){$('#msg_').html('');});
	$('#new_pwd').focus(function(){$('#msg_').html('');});
	$('#new_re-pwd').focus(function(){$('#msg_').html('');});
    });
	
	$('#changepwdbutt').click(function(){
		if($.trim($('#old_pwd').val()) == ''){
			$('#msg_').html("X: Please mention your old password");
		} else if($.trim($('#new_pwd').val()) == ''){
			$('#msg_').html("X: New password should not be left blank.");
		} else if($.trim($('#new_pwd').val()) != $.trim($('#new_re-pwd').val())){
			$('#msg_').html("X: Please confirm the new password correctly.");
		} else {
			url_ = site_url_ + '/c_pwd/changepwd';
			data_ = $('#frm_cpwd').serialize();
			$('#msg_').html('<span style="color: #0000ff">Loading...</span>');
			
			$.ajax({
				type: "POST",
				url: url_,
				data: data_,
				success: function(data){
					if(data == "All three chances over."){
						$('#fullform').css({'padding':'20px'});
						$('#fullform').html("Please contact administrator to reset your password.<br /><a href='"+site_url_+"/dashboard/log__out'>Logout</a>");
					} else {
						$('#msg_').html(data);	
					}
					$('#frm_cpwd')[0].reset();
				}
			});
		}
	});
	function fill_faculty_for_sequence(id__){
		url_ = site_url_ + "/faculty/getActiveFaculty/"+$('#txtCourse_for_sequence').val();
		var csrf = $("#frmFacultySeq input[name~='csrf_test_name']").val();
		$('#faculty_sequence_here').html('<img src="'+base_url_+'_assets_/images/load.gif" style="width: 15px"> Loading...');
		$.ajax({
			type: "POST",
			url : url_,
			data: { csrf_test_name: csrf },
			success:  function(data){
				var obj = JSON.parse(data);
				var str_html = '';
				str_html = str_html + "<tr>";
                str_html = str_html + "<th>Faculty Name</th>";
				str_html = str_html + "<th>Designation</th>";
				str_html = str_html + "<th>Change Sequence</th>";
				str_html = str_html + "</tr>";
				for (i=0; i<obj.length; i++) {
					str_html = str_html + "<tr>";
					str_html = str_html + "<td>"+obj[i].FACULTY_NAME+"</td>";
					str_html = str_html + "<td>"+obj[i].DESIG+"</td>";
					if(id__ != '' && id__ == obj[i].FAC_ID){
						str_html = str_html + '<td><input type="text" name="'+obj[i].FAC_ID+'" id="'+obj[i].FAC_ID+'" class="myseq_txt bordercolorji" value="'+obj[i].SEQ+'"></td>';
					} else {
						str_html = str_html + '<td><input type="text" name="'+obj[i].FAC_ID+'" id="'+obj[i].FAC_ID+'" class="myseq_txt" value="'+obj[i].SEQ+'"></td>';
					}
					str_html = str_html + "<tr>";
				}
				$('#faculty_sequence_here').html(str_html);
				if(id__ != '') $('#'+id__).focus();
			}, error(xhr, status, error){
				$('#faculty_sequence_here').html(xhr.responseText);
			}
		});
	return false;
	}
	$('body').on('focus', '.myseq_txt', function(){
    	facid_for_sequence = $('#'+this.id).val();
    });

    $('body').on('blur', '.myseq_txt', function(){
    	var id__ = this.id;
    	if($.trim($('#'+this.id).val()) != ''){
	    	if($('#'+this.id).val() != facid_for_sequence){
	    		var csrf = $("#frmFacultySeq input[name~='csrf_test_name']").val();
	    		data_ = 'seq_='+$('#'+this.id).val()+"&facid="+this.id+"&csrf_test_name='"+csrf;
	    		url_ = site_url_ + "/faculty/changesequence";
	    		$('#faculty_sequence_here').html('<img src="'+base_url_+'_assets_/images/load.gif" style="width: 15px"> Loading...');
	    		$.ajax({
	    			type: "POST",
	    			url: url_,
	    			data: data_,
	    			success: function(data){
	    				var obj = JSON.parse(data);
	    				if(obj.res_ == true){
	    					fill_faculty_for_sequence(id__);
	    				} else {
	    					alert(obj.msg_);
	    				}
	    			}, error(xhr, status, error){
	    				//$('#faculty_sequence_here').html("<span style='color: #ff0000'>"+error+". Check your internet connection and <b>reload</b> the page and try again. <br />If still error occurs then please drop email to <span style='color: #0000ff'>nitin.d12@amrapali.ac.in <b>OR</b> navtewari@amrapali.ac.in</span></span>");
	    			}
	    		});
	    	}
    	} else {
			$('#'+this.id).val(facid_for_sequence);
		}
    return false;
    });

    $('body').on('click', '.edit_del', function(){
    	var str = this.id;
    	var arr = str.split('_');
    	if(arr[0] == 'edit'){
    		var url_ = site_url_ + "/ImportantDates/edit_dates";
    	} else if(arr[0]=='del'){
    		var url_ = site_url_ + "/ImportantDates/delete_dates";
    	}
    	var data_ = "id="+arr[1];
    	$('#impdatesid').val(arr[1]);
    	if(arr[0]=='edit'){
	    	$.ajax({
	    		type: "POST",
	    		url: url_,
	    		data: data_,
	    		success: function(data){
	    			var obj = JSON.parse(data);
	    			if(obj.row.res_ == true ){
	    				$('.colorme').css('color', '#900000');
	    				$('.colorme').css('background', '#FFFAA7');
	    				$('#txtImpDate').val(obj.row.record.IMP_DATE);
	    				$('#txtEvent').val(obj.row.record.IMP_DATE_EVENT);
	    				$('#txtDesc').val(obj.row.record.DESC_);
	    				$('#impdatesid').val(arr[1]);
	    				$('#impdates_update').css('display', 'inline');
	    				$('#impdates_submit').css('display', 'none');
	    			} else alert('some server error. Please reload the page and try again!!');
	    		},
	    		error: function(xhr, error, status){
	    			document.write(xhr.responseText);
	    		}
	    	});
	    } else {
	    	$('#frmImpDates').attr('action', 'importantDates/delete_dates');
	    	$('#frmImpDates').submit();
	    }
    });

    $('body').on('click','.active_deactive', function(){
    	var str = this.id;
    	var obj = str.split("_");
    	if(obj[0] == 'active'){
    		url_ = site_url_+'/ImportantDates/active_deactive/'+obj[1]+'/0';
    	} else {
    		url_ = site_url_+'/ImportantDates/active_deactive/'+obj[1]+'/1';
    	}
    	window.location = url_;
    });
    $('body').on('click','.active_deactive_category', function(){
    	var str = this.id;
    	var obj = str.split("_");
    	if(obj[0] == 'active'){
    		url_ = site_url_+'/activity/active_deactive_category/'+obj[1]+'/0';
    	} else {
    		url_ = site_url_+'/activity/active_deactive_category/'+obj[1]+'/1';
    	}
    	window.location = url_;
    });
    $('body').on('click', '.categ_edit_del', function(){
    	var str = this.id;
    	var arr = str.split('_');
    	if(arr[0] == 'edit'){
    		var url_ = site_url_ + "/activity/edit_activity_category";
    	} else if(arr[0]=='del'){
    		var url_ = site_url_ + "/activity/delete_activity_category";
    	}
    	$('#actcategid').val(arr[1]);
    	if(arr[0]=='edit'){
    		var data_ = "id="+arr[1];
	    	$.ajax({
	    		type: "POST",
	    		url: url_,
	    		data: data_,
	    		success: function(data){
	    			var obj = JSON.parse(data);
	    			if(obj.row.res_ == true ){
	    				$('.colorme').css('color', '#900000');
	    				$('.colorme').css('background', '#FFFAA7');
	    				$('#txtActivityCategory').val(obj.row.record.CATEGORY);
	    				$('#actcategid').val(arr[1]);
	    				$('#actcategdates_update').css('display', 'inline');
	    				$('#actcategdates_submit').css('display', 'none');
	    			} else alert('some server error. Please reload the page and try again!!');
	    		},
	    		error: function(xhr, error, status){
	    			document.write(xhr.responseText);
	    		}
	    	});
	    } else {
	    	$('#frmActivitiesCategories').attr('action', 'activity/delete_activity_category');
	    	$('#frmActivitiesCategories').submit();
	    }
    });	

    // Uploading, view and Cancel TC data
    	load_data();
    	$('#reloadData').click(function(){load_data();});

		function load_data(){
			var class_ = $('#txtClass').val();
			var session_ = $('#txtSession').val();
			$('#view_tc_data').html('Wait! Its loading...');
			if(session_!=''){
				var url_ = site_url_ + "/excel_/fetchTCData";
				var data_ = "txtSession="+session_;
				$.ajax({
					url:url_,
					type:"POST",
					data: data_,
					success:function(data){
						var obj = JSON.parse(data);
						var len = obj.studentTCData.length;
						var sno = 1;
						$('#heading_TC_data').html('<b style="background: #00f0f0; padding: 3px; border-radius: 3px">Session: '+session_+'</b>');
						var str = '';
						if(len != 0){
							str = str + "<table style='width: 3250px; height: auto; max-height: 100px; font-family: Arial; font-size: 12px' class='table table-striped'>";
							str = str + "<tr style='vertical-align: top;'>";
							str = str + "<th style='text-align: left'>Action</th>";
							str = str + "<th>Serial</th>";
							str = str + "<th>TC NO.</th>";
							str = str + "<th>Date of Issue</th>";
							str = str + "<th style='text-align: center'>Class</th>";
							str = str + "<th>Student Name</th>";
							str = str + "<th>Student Adhaar</th>";
							str = str + "<th>Mother</th>";
							str = str + "<th>Mother Adhaar</th>";
							str = str + "<th>Father</th>";
							str = str + "<th>Father Adhaar</th>";
							str = str + "<th>School No</th>";
							str = str + "<th>Book No</th>";
							str = str + "<th>SN No</th>";
							str = str + "<th>Admission No</th>";
							str = str + "<th>Affiliation No</th>";
							str = str + "<th>Renewed upto</th>";
							str = str + "<th>School Status</th>";
							str = str + "<th>Reg. No</th>";
							str = str + "<th>Nationality</th>";
							str = str + "<th>DOB (Figures)</th>";
							str = str + "<th>DOB (Words)</th>";
							str = str + "<th>Category</th>";
							str = str + "<th>Student Failed?</th>";
							str = str + "<th>Subject Offered</th>";
							str = str + "<th>Last Studied Class</th>";
							str = str + "<th>School/ Board</th>";
							str = str + "<th>Promoted?</th>";
							str = str + "<th>Dues Paid?</th>";
							str = str + "<th>Any Consession?</th>";
							str = str + "<th>NCC/ Scout/ Guide</th>";
							str = str + "<th>Date of Cutting Name</th>";
							str = str + "<th>Reason of Leaving School</th>";
							str = str + "<th>No of meetings upto date</th>";
							str = str + "<th>School days attended</th>";
							str = str + "<th>General Conduct</th>";
							str = str + "<th>Remarks (if any)</th>";
							str = str + "</tr>";
							for(i=0;i<obj.studentTCData.length; i++){
								if(obj.studentTCData[i]['ORIGINAL'] == 0){
									myicon = "fa-power-off";
									mycss = "color: #C0C0C0; cursor: pointer";
									myclass = " class='dblclickedit' ";
								} else {
									myicon = "fa-check categ_edit_del";
									mycss = "color:#0066cc; font-size: 13px; cursor: pointer";
									myclass = " class='disableedit' ";
								}
								str = str + "<tr id='delrow_"+obj.studentTCData[i]['TCID']+"'>";
								str = str + "<td style='text-align: left; width: 80px;'>";
								str = str + '<i class="fa '+myicon+' issueTC" id="issue_'+obj.studentTCData[i]['TCID']+'" title="Issue TC" style="'+mycss+'"></i> |';
								if(obj.studentTCData[i]['ORIGINAL'] == 0){
								str = str + '<i class="fa fa-times categ_edit_del"  id="del_'+obj.studentTCData[i]['TCID']+'" title="Delete" style="color:#E13300; font-size: 13px; cursor: pointer"></i>';
								}
								str = str + "</td>";
								str = str + "<td style='text-align: center'>"+sno+"</td>";
								if(obj.studentTCData[i]['DATE_OF_ISSUE'] != 'x'){
									str = str + "<td class='disableedit' style='text-align: center'>"+obj.studentTCData[i]['TCNO']+"</td>";
									str = str + "<td class='disableedit' style='text-align: center'>"+obj.studentTCData[i]['DATE_OF_ISSUE']+"</td>";
								} else {
									str = str + "<td style='text-align: center'>-</td>";
									str = str + "<td style='text-align: center'>-</td>";
								}
								str = str + "<td"+myclass+" style='text-align: center' id='"+obj.studentTCData[i]['TCID']+"@CLASS_'>"+obj.studentTCData[i]['CLASS_']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@CANDIDATE_NAME'>"+obj.studentTCData[i]['CANDIDATE_NAME']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@CANDIDATE_ADHAAR'>"+obj.studentTCData[i]['CANDIDATE_ADHAAR']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@MOTHERS_NAME'>"+obj.studentTCData[i]['MOTHERS_NAME']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@MOTHER_ADHAAR'>"+obj.studentTCData[i]['MOTHER_ADHAAR']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@FATHERS_NAME'>"+obj.studentTCData[i]['FATHERS_NAME']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@FATHER_ADHAAR'>"+obj.studentTCData[i]['FATHER_ADHAAR']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@SCHOOL_NO'>"+obj.studentTCData[i]['SCHOOL_NO']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@BOOK_NO'>"+obj.studentTCData[i]['BOOK_NO']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@SNO'>"+obj.studentTCData[i]['SNO']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@ADMISSION_NO'>"+obj.studentTCData[i]['ADMISSION_NO']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@AFFILIATION_NO'>"+obj.studentTCData[i]['AFFILIATION_NO']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@RENEWED_UPTO'>"+obj.studentTCData[i]['RENEWED_UPTO']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@SCHOOL_STATUS'>"+obj.studentTCData[i]['SCHOOL_STATUS']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@REGNO_OF_CANDIDATE'>"+obj.studentTCData[i]['REGNO_OF_CANDIDATE']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@NATIONALITY'>"+obj.studentTCData[i]['NATIONALITY']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@DOB_IN_FIGURES'>"+obj.studentTCData[i]['DOB_IN_FIGURES']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@DOB_IN_WORDS'>"+obj.studentTCData[i]['DOB_IN_WORDS']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@SC_ST_OBC_GEN_CATEGORY'>"+obj.studentTCData[i]['SC_ST_OBC_GEN_CATEGORY']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@STUDENT_FAILED'>"+obj.studentTCData[i]['STUDENT_FAILED']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@SUBJECT_OFFERED'>"+obj.studentTCData[i]['SUBJECT_OFFERED']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@LAST_STUDIED_CLASS'>"+obj.studentTCData[i]['LAST_STUDIED_CLASS']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@SCHOOL_OR_BOARD'>"+obj.studentTCData[i]['SCHOOL_OR_BOARD']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@PROMOTED'>"+obj.studentTCData[i]['PROMOTED']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@DUES_PAID'>"+obj.studentTCData[i]['DUES_PAID']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@ANY_CONSESSION'>"+obj.studentTCData[i]['ANY_CONSESSION']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@NCC_SCOUT_GUIDE'>"+obj.studentTCData[i]['NCC_SCOUT_GUIDE']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@DATE_OF_CUTTING_NAME'>"+obj.studentTCData[i]['DATE_OF_CUTTING_NAME']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@REASON_OF_LEAVING_SCHOOL'>"+obj.studentTCData[i]['REASON_OF_LEAVING_SCHOOL']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@NO_OF_MEETING_UPTODATE'>"+obj.studentTCData[i]['NO_OF_MEETING_UPTODATE']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@SCHOOL_DAYS_ATTENDED'>"+obj.studentTCData[i]['SCHOOL_DAYS_ATTENDED']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@GENERAL_CONDUCT_OF_STUDENT'>"+obj.studentTCData[i]['GENERAL_CONDUCT_OF_STUDENT']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@REMARKS_IF_ANY'>"+obj.studentTCData[i]['REMARKS_IF_ANY']+"</td>";
								str = str + "</tr>";
								sno++;
							}
							str= str + "</table>";
						} else {
							str = "No Data Found...";
						}
						$('#view_tc_data').html(str);
					}
				});
			} else {
				$('#view_tc_data').html('No Data Found...');
			}
		}

		function load_data_classwise(){
			var class_ = $('#txtClass').val();
			var session_ = $('#txtSession').val();
			$('#view_tc_data').html('Wait! Its loading...');
			if(class_!='' && session_!=''){
				var url_ = site_url_ + "/excel_/fetchTCData"
				var data_ = "txtSession="+session_+"&txtClass="+class_;
				$.ajax({
					url:url_,
					type:"POST",
					data: data_,
					success:function(data){
						var obj = JSON.parse(data);
						var len = obj.studentTCData.length;
						var sno = 1;
						$('#heading_TC_data').html('<b style="background: #f0f000; padding: 3px; border-radius: 3px">Class: '+class_+'</b> | <b style="background: #00f0f0; padding: 3px; border-radius: 3px">Session: '+session_+'</b>');
						var str = '';
						if(len != 0){
							str = str + "<table style='width: 3250px; height: auto; max-height: 100px; font-family: Arial; font-size: 12px' class='table'>";
							str = str + "<tr style='vertical-align: top;'>";
							str = str + "<th style='text-align: left'>Action</th>";
							str = str + "<th>Serial</th>";
							str = str + "<th>TC NO.</th>";
							str = str + "<th>Date of Issue</th>";
							str = str + "<th>Student Name</th>";
							str = str + "<th>Mother</th>";
							str = str + "<th>Father</th>";
							str = str + "<th>School No</th>";
							str = str + "<th>Book No</th>";
							str = str + "<th>SN No</th>";
							str = str + "<th>Admission No</th>";
							str = str + "<th>Affiliation No</th>";
							str = str + "<th>Renewed upto</th>";
							str = str + "<th>School Status</th>";
							str = str + "<th>Reg. No</th>";
							str = str + "<th>Nationality</th>";
							str = str + "<th>DOB (Figures)</th>";
							str = str + "<th>DOB (Words)</th>";
							str = str + "<th>Category</th>";
							str = str + "<th>Student Failed?</th>";
							str = str + "<th>Subject Offered</th>";
							str = str + "<th>Last Studied Class</th>";
							str = str + "<th>School/ Board</th>";
							str = str + "<th>Promoted?</th>";
							str = str + "<th>Dues Paid?</th>";
							str = str + "<th>Any Consession?</th>";
							str = str + "<th>NCC/ Scout/ Guide</th>";
							str = str + "<th>Date of Cutting Name</th>";
							str = str + "<th>Reason of Leaving School</th>";
							str = str + "<th>No of meetings upto date</th>";
							str = str + "<th>School days attended</th>";
							str = str + "<th>General Conduct</th>";
							str = str + "<th>Remarks (if any)</th>";
							str = str + "</tr>";
							for(i=0;i<obj.studentTCData.length; i++){
								if(obj.studentTCData[i]['ORIGINAL'] == 0){
									myicon = "fa-power-off";
									mycss = "color: #C0C0C0; cursor: pointer";
									myclass = " class='dblclickedit' ";
								} else {
									myicon = "fa-check categ_edit_del";
									mycss = "color:#0066cc; font-size: 13px; cursor: pointer";
									myclass = " class='disableedit' ";
								}
								str = str + "<tr id='delrow_"+obj.studentTCData[i]['TCID']+"'>";
								str = str + "<td style='text-align: left; width: 80px;'>";
								str = str + '<i class="fa '+myicon+' issueTC" id="issue_'+obj.studentTCData[i]['TCID']+'" title="Issue TC" style="'+mycss+'"></i> |';
								if(obj.studentTCData[i]['ORIGINAL'] == 0){
								str = str + '<i class="fa fa-times categ_edit_del"  id="del_'+obj.studentTCData[i]['TCID']+'" title="Delete" style="color:#E13300; font-size: 13px; cursor: pointer"></i>';
								}
								str = str + "</td>";
								str = str + "<td style='text-align: center'>"+sno+"</td>";
								if(obj.studentTCData[i]['DATE_OF_ISSUE'] != 'x'){
									str = str + "<td class='disableedit'>"+obj.studentTCData[i]['TCNO']+"</td>";
									str = str + "<td class='disableedit'>"+obj.studentTCData[i]['DATE_OF_ISSUE']+"</td>";
								} else {
									str = str + "<td></td>";
									str = str + "<td>-</td>";
								}
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@CANDIDATE_NAME'>"+obj.studentTCData[i]['CANDIDATE_NAME']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@MOTHERS_NAME'>"+obj.studentTCData[i]['MOTHERS_NAME']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@FATHERS_NAME'>"+obj.studentTCData[i]['FATHERS_NAME']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@SCHOOL_NO'>"+obj.studentTCData[i]['SCHOOL_NO']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@BOOK_NO'>"+obj.studentTCData[i]['BOOK_NO']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@SNO'>"+obj.studentTCData[i]['SNO']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@ADMISSION_NO'>"+obj.studentTCData[i]['ADMISSION_NO']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@AFFILIATION_NO'>"+obj.studentTCData[i]['AFFILIATION_NO']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@RENEWED_UPTO'>"+obj.studentTCData[i]['RENEWED_UPTO']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@SCHOOL_STATUS'>"+obj.studentTCData[i]['SCHOOL_STATUS']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@REGNO_OF_CANDIDATE'>"+obj.studentTCData[i]['REGNO_OF_CANDIDATE']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@NATIONALITY'>"+obj.studentTCData[i]['NATIONALITY']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@DOB_IN_FIGURES'>"+obj.studentTCData[i]['DOB_IN_FIGURES']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@DOB_IN_WORDS'>"+obj.studentTCData[i]['DOB_IN_WORDS']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@SC_ST_OBC_GEN_CATEGORY'>"+obj.studentTCData[i]['SC_ST_OBC_GEN_CATEGORY']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@STUDENT_FAILED'>"+obj.studentTCData[i]['STUDENT_FAILED']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@SUBJECT_OFFERED'>"+obj.studentTCData[i]['SUBJECT_OFFERED']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@LAST_STUDIED_CLASS'>"+obj.studentTCData[i]['LAST_STUDIED_CLASS']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@SCHOOL_OR_BOARD'>"+obj.studentTCData[i]['SCHOOL_OR_BOARD']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@PROMOTED'>"+obj.studentTCData[i]['PROMOTED']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@DUES_PAID'>"+obj.studentTCData[i]['DUES_PAID']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@ANY_CONSESSION'>"+obj.studentTCData[i]['ANY_CONSESSION']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@NCC_SCOUT_GUIDE'>"+obj.studentTCData[i]['NCC_SCOUT_GUIDE']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@DATE_OF_CUTTING_NAME'>"+obj.studentTCData[i]['DATE_OF_CUTTING_NAME']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@REASON_OF_LEAVING_SCHOOL'>"+obj.studentTCData[i]['REASON_OF_LEAVING_SCHOOL']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@NO_OF_MEETING_UPTODATE'>"+obj.studentTCData[i]['NO_OF_MEETING_UPTODATE']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@SCHOOL_DAYS_ATTENDED'>"+obj.studentTCData[i]['SCHOOL_DAYS_ATTENDED']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@GENERAL_CONDUCT_OF_STUDENT'>"+obj.studentTCData[i]['GENERAL_CONDUCT_OF_STUDENT']+"</td>";
								str = str + "<td"+myclass+" id='"+obj.studentTCData[i]['TCID']+"@REMARKS_IF_ANY'>"+obj.studentTCData[i]['REMARKS_IF_ANY']+"</td>";
								str = str + "</tr>";
								sno++;
							}
							str= str + "</table>";
						} else {
							str = "No Data Found...";
						}
						$('#view_tc_data').html(str);
					}
				});
			} else {
				$('#view_tc_data').html('No Data Found...');
			}
		}

		$('body').on('click', '.categ_edit_del', function(){
			var str = this.id;
			var arr = str.split('_');

			if(arr[0] == 'del'){
				var url_ = site_url_ + "/excel_/deleteTCRecord/"+arr[1];

				$.ajax({
					type: "POST",
					url: url_,
					success: function(data){
						var arr1 = str.split('_');
						var id__ = '#delrow_'+arr[1];
						if(data == true){
							$(id__).animate(
						    {height: '0px',
						     opacity: 0}, 500);
							$(id__).remove();
						}
					}
				});
			}

		});
		$('#txtTCDataUpload').click(function(){
			$('#_msg_here').html("");
			$('#msg_box').css('display', 'none');
		});
		$('#frmTCDetail').on('submit', function(event){
			event.preventDefault();
			var url_ = site_url_ + "/excel_/uploadTCData";
			$('#msg_box').css('display', 'block');
			$('#_msg_here').html("<span style='color: #009000'>It's uploading... Please wait...</span>")
			$.ajax({
				url:url_,
				type:"POST",
				data:new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				success:function(data){
					$('#msg_box').css('display', 'none');
					var obj = JSON.parse(data);
					$('#msg_box').css('display', 'block');
					$('#_msg_here').html(obj);
					load_data();
					//alert(data);
				}
			});
			$('#txtTCDataUpload').val('');
			return false;
		});

		$('#close_msg_box').click(function(){
			$('#msg_box').css('display', 'none');
			$('#_msg_here').html('');
		});

		$('#txtClass').change(function(){$('#close_msg_box').click();load_data();});
		$('#txtSession').change(function(){$('#close_msg_box').click();load_data();});

		$('body').on('click','.issueTC', function(){
			var str = this.id;
			var arr = str.split('_');
			var url_ = site_url_ + "/Excel_/geTCRecordforstudent/"+arr[1];
			var str = $('#txtIssueDate').val();
			var arr = str.split('-');
			var tc_dt = arr[2]+"-"+arr[1]+"-"+arr[0];
			$('#txtTCID').html('...');
			$('#tcName').html('...');
			$('#tcFather').html('...');
			$('#tcMother').html('...');
			$('#tcDOB').html('...');
			$('#tcLSC').html('...');
			$('.copy__').html('...');
			$('#chkAcceptTerms').prop('checked', false);
			$('#cmbIssueTC').val('Verify & Issue TC');
			$('#cmbIssueTC').removeClass('btn-default');
			$('#cmbIssueTC').addClass('btn-success');
			$('#cmbIssueTC').attr('disabled', 'disabled');
			$.ajax({
				url: url_,
				type:"POST",
				success: function(data){
					var obj = JSON.parse(data);
					$('#txtTCID').html(obj.record.TCID);
					$('#tcName').html(obj.record.CANDIDATE_NAME);
					$('#tcFather').html(obj.record.FATHERS_NAME);
					$('#tcMother').html(obj.record.MOTHERS_NAME);
					$('#tcDOB').html(obj.record.DOB_IN_WORDS);
					$('#tcLSC').html(obj.record.LAST_STUDIED_CLASS);
					$('#txtRemark').val(obj.record.REMARKS_IF_ANY);
					$('.dt_').html(tc_dt);
					if(obj.record.ORIGINAL == 0){
						$('.copy__').css('color', '#009000');
						$('.copy__').html('Original');
						$('#txtTCTerms').html("I accept all terms &amp; Conditions in issuing this Transfer Certificate as (Original copy) on behalf of the School ("+obj.school_+") authority.")
					} else {
						$('.copy__').css('color', '#ff0000');
						$('.copy__').html('Duplicate');
						$('#txtTCTerms').html("I accept all terms &amp; Conditions in issuing this Transfer Certificate as (Duplicate copy) on behalf of the School ("+obj.school_+") authority.")
					}
				}
			});
			$('#issue_tc_data').css('display', 'block');
		});

		$('#cmbCancelTCIssue').click(function(){
			$('#tcName').html('');
			$('#tcFather').html('');
			$('#tcMother').html('');
			$('#tcDOB').html('');
			$('#tcLSC').html('');
		});

		$('#cmbIssueTC').click(function(){
			$('#cmbIssueTC').val('Wait its loading...');
			$('#cmbIssueTC').removeClass('btn-success');
			$('#cmbIssueTC').addClass('btn-default');
			var url_= site_url_ + "/Excel_/issueTC/";
			var data_ = "tcid="+encodeURIComponent($('#txtTCID').html())+"&txtIssueDate="+encodeURIComponent($('#txtIssueDate').val())+"&txtRemark="+encodeURIComponent($('#txtRemark').val())+"&txtTCTerms="+encodeURIComponent($('#txtTCTerms').html());
			$.ajax({
				url: url_,
				type: 'POST',
				data: data_,
				success: function(data){
					var obj = JSON.parse(data);
					if(obj.res == true){
						$('#cmbCancelTCIssue').click();
						$('#issue_tc_data').css('display', 'none');
						$('#view_tc_data').html('TC Successfully issued to '+obj.name);
						window.open(site_url_+'/Excel_/printTCEnglish/'+$('#txtTCID').html());
					}
				}
			});
		});
		$('#txtIssueDate').change(function(){
			var str = $(this).val();
			var arr = str.split('-');
			var tc_dt = arr[2]+"-"+arr[1]+"-"+arr[0];
			$('.dt_').html(tc_dt);
		});
		$('#chkAcceptTerms').click(function(){
			if($('#chkAcceptTerms:checkbox:checked').length>0){
				$('#cmbIssueTC').removeAttr('disabled');
			} else {
				$('#cmbIssueTC').attr('disabled', 'disabled');
			}
		})
		$('body').on('dblclick', '.dblclickedit', function(){
			// this.id - it will give you the specific id of td where dblclick held
			var str = this.id;
			var arr = str.split('@');
			$(this).css('color', '#0000ff');
			oriVal = $(this).text();
			$(this).attr('title', 'Earlier - '+oriVal)
		    $(this).text("");
		    $("<input type='text' id="+arr[1]+"-"+arr[0]+" value='"+oriVal+"' class='dblfocusout' style='background: #05FFE1; color: #000090'>").appendTo(this).focus();
		});
		
		$('body').on('focusout', '.dblfocusout', function(){
			var str = this.id;
			var arr = str.split('-');
			//alert(arr[0] + "  " + arr[1] + "  " + arr[2]);
			var $this = $(this);
		    var newVal = $this.val();
		    $this.parent().text($this.val() || oriVal);
		    $this.remove(); // Don't just hide, remove the element.
		    var dt__ = $this.val();
		    var data_ = "id="+arr[1]+"&newvalue="+newVal+"&columnname="+arr[0];
		    var url_ = site_url_ + "/excel_/updatedColumn";

		    $.ajax({
		    	url:url_,
				type: 'post',
				data: data_,
				success: function(data){
					if(data == false){
						alert('Some server error! Please try again')
					} else {
					}
				}, error: function (xhr, status, error){
					//alert(xhr.responseText);
				}
		    });
		});

		$('#cmbCancelTC').click(function(){
	    	if($.trim($('#txtTCNoForCancelation').val())!=''){
    	    	var tcno = $('#txtTCNoForCancelation').val();
    	    	var url_= site_url_ + "/Excel_/cancelTC/";
    			var data_ = "tcno="+encodeURIComponent($('#txtTCNoForCancelation').val());
    			$('#cmbCancelTC').val('Canceling...');
    			$('#cmbCancelTC').removeClass('btn-danger');
    			$('#cmbCancelTC').addClass('btn-default');
    			$.ajax({
    				type:'POST',
    				url:url_,
    				data:data_,
    				success: function(data){
    					var obj = JSON.parse(data);
    					if(obj.cancelTCMsg.res_ == true){
    						alert(obj.cancelTCMsg.msg_);
    
    						$('#txtTCNoForCancelation').val('');
    						$('#cmbCancelTC').val('Cancel TC');
    						$('#cmbCancelTC').removeClass('btn-default');
    						$('#cmbCancelTC').addClass('btn-danger');
    					load_data();
    					} else {
    						alert(obj.cancelTCMsg.msg_);
    					}
    				}
    			});
		    } else {
		        alert('You cannot leave the field blank. Please fill correct TC No for cancellation.');
		    }
	    });
	    
		$('#exportTCDataInExcel').click(function(){
				var uri__ = site_url_+"/Excel_/exportTC/tc_detail/"+$('#txtSession').val();
				window.location.href = uri__;
		});
    // --------------------------
});
function setDeptDate(startDate, endDate) {
    endDate.setAttribute('min', startDate.value);
}