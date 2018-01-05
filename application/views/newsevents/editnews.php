<div class="col-lg-12">
    <div class="panel panel-default"<?php echo $style_; ?>>
        <div class="panel-heading" style="background: #ff9000; color: #ffffff">
            Update News &amp; Events here...
        </div>
        <div class="panel-body">
            <?php echo form_open_multipart('newsevents/updateNews/'.$record_->ID, array('name' => 'frmNewsEvents', 'id' => 'frmNewsEvents', 'role' => 'form')); ?>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label>Subject</label>
                        <?php
                        $data = array(
                            'type' => 'text',
                            'autocomplete' => 'off',
                            'required' => 'required',
                            'placeholder' => 'subject of Detailed News/ Event',
                            'class' => 'required form-control',
                            'name' => 'txtSubject',
                            'id' => 'txtSubject',
                            'value' => $record_->SUBJECT,
                            'style' => 'color: #ff9000'
                        );
                        echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group">
                        <label>News</label>
                        <?php
                        $data = array(
                            'rows' => '3',
                            'autocomplete' => 'off',
                            'required' => 'required',
                            'placeholder' => 'News/ Event',
                            'class' => 'required form-control',
                            'name' => 'txtNews',
                            'id' => 'txtNews',
                            'value' => $record_->NEWS,
                            'style' => 'color: #ff9000; height: 120px'
                        );
                        echo form_textarea($data);
                        ?>
                    </div>
                    <div class="form-group">
                        <label>File input <span style="font-size: 11px; color: #808080; font-weight: normal; font-style: italic">Only <b>[ .doc| .docx| .pdf| .jpg| .png ]</b> are allowed</span></label>
                        <?php
                        $data = array(
                            'type' => 'file',
                            'autocomplete' => 'off',
                            'class' => 'required form-control',
                            'name' => 'txtInputFile',
                            'id' => 'txtInputFile',
                            'value' => '',
                            'style' => 'color: #ff9000'
                        );
                        echo form_input($data);
                        ?>
                    </div>
                    <div style="color: #ff0000; font-weight: bold; font-style: italic; padding: 5px"><?php echo $this->session->flashdata('feed_msg_'); ?></div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group col-sm-12">
                        <label>Start Date</label>
                        <?php
                        $data = array(
                            'type' => 'date',
                            'autocomplete' => 'off',
                            'required' => 'required',
                            'class' => 'required form-control',
                            'name' => 'txtStartDate_edit',
                            'id' => 'txtStartDate',
                            'value' => $record_->DATE_START,
                            'min' => $record_->DATE_START,
                            'style' => 'color: #ff9000',
                            'onchange' => 'setDeptDate(txtStartDate, txtEndDate)'
                        );
                        echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group col-sm-12">
                        <label>End Date</label>
                        <?php
                        $data = array(
                            'type' => 'date',
                            'autocomplete' => 'off',
                            'required' => 'required',
                            'class' => 'required form-control',
                            'name' => 'txtEndDate',
                            'id' => 'txtEndDate',
                            'value' => $record_->DATE_END,
                            'min' => date('Y-m-d'),
                            'style' => 'color: #ff9000'
                        );
                        echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group col-sm-12">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-danger col-sm-6" style="float: right"> Update </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>