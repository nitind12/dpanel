<div class="col-lg-12">
    <div class="panel panel-default"<?php echo $style_; ?>>
        <div class="panel-heading" style="background: #ff9000; color: #ffffff">
            Update Toppers here...
        </div>
        <div class="panel-body">
            <?php echo form_open_multipart('topper/updateTopper/'.$record_->SNO, array('name' => 'frmToppers', 'id' => 'frmToppers', 'role' => 'form')); ?>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group col-sm-12">
                        <label>Topper Name</label>
                        <?php
                            $data = array(
                                'type' => 'text',
                                'autocomplete' => 'off',
                                'required' => 'required',
                                'placeholder' => 'Topper Name',
                                'class' => 'required form-control',
                                'name' => 'txtTopperName',
                                'id' => 'txtTopperName',
                                'value' => $record_->SNAME,
                                'style' => 'color: #ff9000'
                            );
                        echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group col-sm-12">
                        <label>Merit <span style="font-weight: normal !important; font-size: 11px">(Here you can feed the achievement/ award name)</span></label>
                        <?php
                        $data = array(
                            'rows' => '3',
                            'autocomplete' => 'off',
                            'required' => 'required',
                            'placeholder' => 'Award Name/ Achievement Name/ Class etc.',
                            'class' => 'required form-control',
                            'name' => 'txtMerit',
                            'id' => 'txtMerit',
                            'value' => $record_->MERIT_NAME,
                            'style' => 'color: #ff9000'
                        );
                        echo form_textarea($data);
                        ?>
                    </div>
                    <div class="form-group col-sm-8">
                        <label>Rank</label>
                        <?php
                        $data = array(
                            'type' => 'text',
                            'autocomplete' => 'off',
                            'required' => 'required',
                            'placeholder' => 'Rank achieved',
                            'class' => 'required form-control',
                            'name' => 'txtRank',
                            'id' => 'txtRank',
                            'value' => $record_->RANK,
                            'style' => 'color: #ff9000'
                        );
                        echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group col-sm-4">
                        <label>Achievement Year</label>
                        <?php
                        $data = array(
                            'type' => 'text',
                            'autocomplete' => 'off',
                            'required' => 'required',
                            'placeholder' => 'Year',
                            'class' => 'required form-control',
                            'name' => 'txtYOP',
                            'id' => 'txtYOP',
                            'value' => $record_->YOP,
                            'maxlength' => 4,
                            'style' => 'color: #ff9000'
                        );
                        echo form_input($data);
                        ?>
                    </div>
                    <div style="color: #ff0000; font-weight: bold; font-style: italic; padding: 5px"><?php echo $this->session->flashdata('feed_msg_'); ?></div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group col-sm-12">
                        <label>Remark (if any?)</span></label>
                        <?php
                        $data = array(
                            'rows' => '2',
                            'autocomplete' => 'off',
                            'required' => 'required',
                            'placeholder' => 'Any remark?',
                            'class' => 'required form-control',
                            'name' => 'txtRemark',
                            'id' => 'txtRemark',
                            'value' => $record_->ANY_REMARK,
                            'style' => 'color: #ff9000'
                        );
                        echo form_textarea($data);
                        ?>
                    </div>
                    <div class="form-group col-sm-12">
                        <label>Photo <span style="font-size: 11px; color: #808080; font-weight: normal; font-style: italic">Only <b>[ .jpg| .png | .gif ]</b> are allowed</span></label>
                        <?php
                        $data = array(
                            'type' => 'file',
                            'autocomplete' => 'off',
                            'class' => 'required form-control',
                            'name' => 'txtPhotoFile',
                            'id' => 'txtPhotoFile',
                            'value' => '',
                            'style' => 'color: #ff9000'
                        );
                        echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group col-sm-12">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-danger col-sm-6"> Update </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>