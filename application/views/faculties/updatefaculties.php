<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">            
            <div class="form-group">
                <label>Choose Faculty<sup>*</sup></label>
                <?php
                $data = array(
                    'class' => 'required form-control m-bot8',
                    'name' => 'cmbFaculty',
                    'style' => 'width:50%',
                    'id' => 'cmbFaculty',
                    'required' => 'required',
                    'onchange' => 'get_faculty(this)'
                );
                $options = array();
                $options['0'] = 'Select Faculty';
                foreach ($faculties as $fac_name) {
                    $options[$fac_name->FAC_ID] = $fac_name->FACULTY_NAME;
                }
                echo form_dropdown($data, $options, '-');
                ?>
            </div>            
        </div>
        <div class="panel-body">
            <div class="row">                
                <div class="col-sm-3">                    
                        <img src="<?php echo base_url('_assets_/faculty/photo/male.png'); ?>" id="facultyPic" style='width:100%;'>                   
                    <h4 id="facName" align='center' style='color: #0088cc'></h4>
                </div>
                <div class="col-sm-5">
                    <?php echo form_open_multipart('faculty/updateFaculty', array('name' => 'frmFaculty', 'id' => 'frmFaculty', 'role' => 'form')); ?>
                    <div class="form-group">
                        <label>Designation</label>
                        <?php
                        $data = array(
                            'autocomplete' => 'off',
                            'placeholder' => 'Designation',
                            'class' => 'required form-control',
                            'name' => 'txtDesig',
                            'id' => 'txtDesig',
                            'value' => ''
                        );
                        echo form_input($data);
                        ?>
                        <?php
                        $data = array(
                            'type' => 'hidden',
                            'autocomplete' => 'off',
                            'required' => 'required',
                            'class' => 'required form-control',
                            'name' => 'txtfacID',
                            'id' => 'txtfacID',
                            'value' => ''
                        );
                        echo form_input($data);
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Qualification</label>
                        <?php
                        $data = array(
                            'autocomplete' => 'off',
                            'placeholder' => 'Qualification',
                            'class' => 'required form-control',
                            'name' => 'txtQualification',
                            'id' => 'txtQualification',
                            'value' => ''
                        );
                        echo form_input($data);
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <?php
                        $data = array(
                            'type' => 'email',
                            'autocomplete' => 'off',
                            'placeholder' => 'Email',
                            'class' => 'required form-control',
                            'name' => 'txtEmail',
                            'id' => 'txtEmail',
                            'value' => ''
                        );
                        echo form_input($data);
                        ?>
                    </div>

                    <div class="form-group">
                        <label>Mobile</label>
                        <?php
                        $data = array(
                            'type' => 'text',
                            'autocomplete' => 'off',
                            'placeholder' => 'Mobile',
                            'class' => 'required form-control',
                            'name' => 'txtMobile',
                            'id' => 'txtMobile',
                            'value' => ''
                        );
                        echo form_input($data);
                        ?>
                    </div>

                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Photo <span style="font-size: 11px; color: #808080; font-weight: normal; font-style: italic">Only <b>[ .jpg]</b> is allowed</span></label>
                        <?php
                        $data = array(
                            'type' => 'file',
                            'autocomplete' => 'off',
                            'class' => 'required form-control',
                            'name' => 'txtInputPhoto',
                            'id' => 'txtInputPhoto',
                            'value' => ''
                        );
                        echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Resume <span style="font-size: 11px; color: #808080; font-weight: normal; font-style: italic">Only <b>[ .doc| .docx| .pdf| ]</b> are allowed</span></label>
                        <?php
                        $data = array(
                            'type' => 'file',
                            'autocomplete' => 'off',
                            'class' => 'required form-control',
                            'name' => 'txtInputResume',
                            'id' => 'txtInputResume',
                            'value' => ''
                        );
                        echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Profile Summary <span style="font-size: 11px; color: #808080; font-weight: normal; font-style: italic">max <span id='wp' style='color:#ff0000; font-weight:bold'>1000</span> characters allowed</span></label>
                        <?php
                        $data = array(
                            'rows' => '5',
                            'autocomplete' => 'off',
                            'placeholder' => 'Profile Summary',
                            'class' => 'required form-control',
                            'name' => 'txtSummary',
                            'id' => 'txtSummary',
                            'value' => '',
                            'maxlength' => '1000',
                            'onkeyup' => 'validateMe(this)',
                        );
                        echo form_textarea($data);
                        ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary col-sm-4" style="margin-right:20px;"> Submit </button>
                        <button type="reset" class="btn btn-danger col-sm-4"> Reset </button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
            <div class="col-sm-12">
                <div style="color: #ff0000; font-weight: bold; font-style: italic; padding: 5px"><?php echo $this->session->flashdata('feed_msg_'); ?></div>
            </div>
        </div>
    </div>
</div>

<script>
    function get_faculty(cmbData) {
        //alert(data.value);
        if (cmbData.value !== '0') {
            $("#txtDesig").val('');
            $("#txtfacID").val('');
            $("#txtQualification").val('');
            $("#txtSummary").val('');
            $("#txtEmail").val('');
            $("#txtMobile").val('');
            $("#facName").html('');
            $('#msg_').html('');
            var loader = base_url_ + '_assets_/images/load.gif';
            $('#msg_').html('<img src="' + loader + '" style="max-height:50px;">');
            $.ajax({
                url: site_url_ + "/faculty/getFaculty/" + cmbData.value,
                type: 'GET'
            }).done(function (data) {
                $("#txtDesig").val(data.desig);
                $("#txtfacID").val(cmbData.value);
                $("#txtQualification").val(data.qualif);
                $("#txtSummary").val(data.summary);
                $("#txtEmail").val(data.email);
                $("#txtMobile").val(data.mobile);
                $("#facName").html(data.facName);
                if (data.photo != 'x') {
                    var path = base_url_ + '_assets_/faculty/photo/' + data.photo;
                } else {
                    var path = base_url_ + '_assets_/faculty/photo/male.png';
                }
                $("#facultyPic").attr('src', path);
                $("#facultyPic").attr('style', 'width:100%;');
                $('#msg_').html('');
            });
        } else {
            alert('Please select a Faculty Name to update Data');
            $("#txtDesig").val('');
            $("#txtfacID").val('');
            $("#txtQualification").val('');
            $("#txtSummary").val('');
            $("#txtEmail").val('');
            $("#txtMobile").val('');
            $("#facName").html('');
            $('#msg_').html('');
        }
    }

    function validateMe(dataMe) {
        // alert(dataMe.value);
        var count = $(dataMe).val().length;
        $("#wp").html(1000 - count);
    }

</script>