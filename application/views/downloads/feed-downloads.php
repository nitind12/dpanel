<style>
    sup{
        color: #ff0000;
    }
</style>
<div class="col-lg-12">
    <div class="panel panel-default"<?php //echo $style_; ?>>
        <div class="panel-heading">
            Feed Downloads here...
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <?php echo form_open_multipart('downloads/uploadDownloads', array('name' => 'frmDwnlds', 'id' => 'frmDwnlds', 'role' => 'form')); ?>
                    <div class="form-group">
                        <label>Download Title<sup>*</sup></label>
                        <?php
                        $data = array(
                            'type' => 'text',
                            'autocomplete' => 'off',
                            'required' => 'required',
                            'placeholder' => 'Download Title here',
                            'class' => 'required form-control',
                            'name' => 'txtdTitle',
                            'id' => 'txtdTitle',
                            'value' => ''
                        );
                        echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Upload Download file<sup>*</sup> <span style="font-size: 11px; color: #808080; font-weight: normal; font-style: italic">Only <b>[ .jpg| .gif| .png| .pdf| .docx| .doc ]</b> are allowed</span></label>
                        <?php
                        $data = array(
                            'type' => 'file',
                            'required' => 'required',
                            'autocomplete' => 'off',
                            'class' => 'required form-control',
                            'name' => 'txtInputFileDwnlds',
                            'id' => 'txtInputFileDwnlds',
                            'value' => ''
                        );
                        echo form_input($data);
                        ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Description (if any)</label>
                        <?php
                        $data = array(
                            'type' => 'text',
                            'autocomplete' => 'off',
                            'required' => 'required',
                            'placeholder' => 'Description (if any)',
                            'class' => 'required form-control',
                            'name' => 'txtDesc',
                            'id' => 'txtDesc',
                            'value' => '',
                            'style' => 'height: 110px'
                        );
                        echo form_textarea($data);
                        ?>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div style="color: #ff0000; font-weight: bold; font-style: italic; padding: 5px">
                    <?php echo $this->session->flashdata('feed_msg_'); ?>
                </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group" style="text-align: right">
                        <button type="submit" id="tc_submit" class="btn btn-primary"> Submit </button>
                        <button type="reset" class="btn btn-flickr"> Reset </button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>