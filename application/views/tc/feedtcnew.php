<style>
    sup{
        color: #ff0000;
    }
</style>
<div class="col-lg-12">
    <div class="panel panel-default"<?php //echo $style_; ?>>
        <div class="panel-heading">
            Feed Transfer Certificate here... [Coming Soon...]
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <?php echo form_open_multipart('tc/uploadTC', array('name' => 'frmTC', 'id' => 'frmTC', 'role' => 'form')); ?>
                    <div class="form-group">
                        <label>School Number<sup>*</sup></label>
                        <?php
                        $data = array(
                            'type' => 'text',
                            'autocomplete' => 'off',
                            'required' => 'required',
                            'placeholder' => 'School No. here',
                            'class' => 'required form-control',
                            'name' => 'txtSchoolNo',
                            'id' => 'txtSchoolNo',
                            'value' => ''
                        );
                        echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Book No<sup>*</sup></label>
                        <?php
                        $data = array(
                            'type' => 'text',
                            'autocomplete' => 'off',
                            'required' => 'required',
                            'placeholder' => 'Book No',
                            'class' => 'required form-control',
                            'name' => 'txtBookNo',
                            'id' => 'txtBookNo',
                            'value' => ''
                        );
                        echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Admission No<sup>*</sup></label>
                        <?php
                        $data = array(
                            'type' => 'text',
                            'autocomplete' => 'off',
                            'required' => 'required',
                            'placeholder' => 'Book No',
                            'class' => 'required form-control',
                            'name' => 'txtAdmNo',
                            'id' => 'txtAdmNo',
                            'value' => ''
                        );
                        echo form_input($data);
                        ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Affiliation No<sup>*</sup></label>
                                <?php
                                $data = array(
                                    'type' => 'text',
                                    'autocomplete' => 'off',
                                    'required' => 'required',
                                    'placeholder' => 'Affiliation No',
                                    'class' => 'required form-control',
                                    'name' => 'txtAffiliationNo',
                                    'id' => 'txtAffiliationNo',
                                    'value' => ''
                                );
                               echo form_input($data);
                                ?>s
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Student Reg. No.<sup>*</sup></label>
                                <?php
                                $data = array(
                                    'type' => 'text',
                                    'autocomplete' => 'off',
                                    'required' => 'required',
                                    'placeholder' => 'Reg. No',
                                    'class' => 'required form-control',
                                    'name' => 'txtStudRegNo',
                                    'id' => 'txtStudRegNo',
                                    'value' => ''
                                );
                               echo form_input($data);
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Mother's Name<sup>*</sup></label>
                                <?php
                                $data = array(
                                    'type' => 'text',
                                    'autocomplete' => 'off',
                                    'required' => 'required',
                                    'placeholder' => 'Mother Name',
                                    'class' => 'required form-control',
                                    'name' => 'txtMotherName',
                                    'id' => 'txtMotherName',
                                    'value' => ''
                                );
                               echo form_input($data);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12"><hr></div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Student Name<sup>*</sup></label>
                                <?php
                                $data = array(
                                    'type' => 'text',
                                    'autocomplete' => 'off',
                                    'required' => 'required',
                                    'placeholder' => 'Stduent Name',
                                    'class' => 'required form-control',
                                    'name' => 'txtStudentName',
                                    'id' => 'txtStudentName',
                                    'value' => ''
                                );
                               echo form_input($data);
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Father's Name<sup>*</sup></label>
                                <?php
                                $data = array(
                                    'type' => 'text',
                                    'autocomplete' => 'off',
                                    'required' => 'required',
                                    'placeholder' => 'Father Name',
                                    'class' => 'required form-control',
                                    'name' => 'txtFatherName',
                                    'id' => 'txtFatherName',
                                    'value' => ''
                                );
                               echo form_input($data);
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label>Mother's Name<sup>*</sup></label>
                                <?php
                                $data = array(
                                    'type' => 'text',
                                    'autocomplete' => 'off',
                                    'required' => 'required',
                                    'placeholder' => 'Mother Name',
                                    'class' => 'required form-control',
                                    'name' => 'txtMotherName',
                                    'id' => 'txtMotherName',
                                    'value' => ''
                                );
                               echo form_input($data);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Admission Date</label>
                                <?php
                                $data = array(
                                    'type' => 'date',
                                    'autocomplete' => 'off',
                                    'placeholder' => 'Admission Date',
                                    'class' => 'required form-control',
                                    'name' => 'txtAdmissionDate',
                                    'id' => 'txtAdmissionDate',
                                    'value' => ''
                                );
                               echo form_input($data);
                                ?>
                            </div>
                            <div class="col-sm-6">
                                <label>Admission Class</label>
                                <?php
                                $data = array(
                                    'type' => 'text',
                                    'autocomplete' => 'off',
                                    'placeholder' => 'Admission Class',
                                    'class' => 'required form-control',
                                    'name' => 'txtAdmissionClass',
                                    'id' => 'txtAdmissionClass',
                                    'value' => ''
                                );
                               echo form_input($data);
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Leaving Date<sup>*</sup></label>
                                <?php
                                $data = array(
                                    'type' => 'date',
                                    'autocomplete' => 'off',
                                    'required' => 'required',
                                    'placeholder' => 'Admission Date',
                                    'class' => 'required form-control',
                                    'name' => 'txtLeavingDate',
                                    'id' => 'txtLeavingDate',
                                    'value' => ''
                                );
                               echo form_input($data);
                                ?>
                            </div>
                            <div class="col-sm-6">
                                <label>Leaving Class<sup>*</sup></label>
                                <?php
                                $data = array(
                                    'type' => 'text',
                                    'autocomplete' => 'off',
                                    'required' => 'required',
                                    'placeholder' => 'Admission Class',
                                    'class' => 'required form-control',
                                    'name' => 'txtLeavingClass',
                                    'id' => 'txtLeavingClass',
                                    'value' => ''
                                );
                               echo form_input($data);
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Upload scanned copy of TC<sup>*</sup> <span style="font-size: 11px; color: #808080; font-weight: normal; font-style: italic">Only <b>[ .jpg| .gif| .png| ]</b> are allowed</span></label>
                        <?php
                        $data = array(
                            'type' => 'file',
                            'required' => 'required',
                            'autocomplete' => 'off',
                            'class' => 'required form-control',
                            'name' => 'txtInputFileTC',
                            'id' => 'txtInputFileTC',
                            'value' => ''
                        );
                       echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group" style="text-align: right">
                        <button type="submit" id="tc_submit" class="btn btn-primary"> Submit </button>
                        <button type="reset" class="btn btn-flickr"> Reset </button>
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