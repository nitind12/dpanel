<style>
    sup{
        color: #ff0000;
    }
</style>
<div class="col-lg-12">
    <div class="panel panel-default"<?php //echo $style_; ?>>
        <div class="panel-heading">
            Feed Important Dates here...
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-12">
                    <?php echo form_open_multipart('importantDates/feed', array('name' => 'frmImpDates', 'id' => 'frmImpDates', 'role' => 'form')); ?>
                    <div class="form-group col-sm-3">
                        <label>Important Date<sup>*</sup></label>
                        <?php
                        $data = array(
                            'type' => 'date',
                            'autocomplete' => 'off',
                            'required' => 'required',
                            'class' => 'required form-control colorme',
                            'name' => 'txtImpDate',
                            'id' => 'txtImpDate',
                            'value' => date('m-d-Y')
                        );
                        echo form_input($data);
                        ?>
                    </div>
                
                    <div class="form-group col-sm-4">
                        <label>Important Event<sup>*</sup></label>
                        <?php
                        $data = array(
                            'type' => 'text',
                            'autocomplete' => 'off',
                            'required' => 'required',
                            'placeholder' => 'Event here',
                            'class' => 'required form-control colorme',
                            'name' => 'txtEvent',
                            'id' => 'txtEvent',
                            'value' => ''
                        );
                        echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group col-sm-5">
                        <label>Upload Detailed file (if any?)<sup>*</sup> <span style="font-size: 11px; color: #808080; font-weight: normal; font-style: italic"><b>[ .jpg| .gif| .png| .pdf]</b> allowed</span></label>
                        <?php
                        $data = array(
                            'type' => 'file',
                            'autocomplete' => 'off',
                            'class' => 'required form-control colorme',
                            'name' => 'txtInputFileImpDate',
                            'id' => 'txtInputFileImpDate',
                            'value' => ''
                        );
                        echo form_input($data);
                        ?>
                    </div>
                    <div class="form-group col-sm-12">
                        <label>Description (if any)</label>
                        <?php
                        $data = array(
                            'type' => 'text',
                            'autocomplete' => 'off',
                            'required' => 'required',
                            'placeholder' => 'Description (if any)',
                            'class' => 'required form-control col-sm-12 colorme',
                            'name' => 'txtDesc',
                            'id' => 'txtDesc',
                            'value' => '',
                            'style' => 'height: 90px'
                        );
                        echo form_textarea($data);
                        ?>
                        <input type="hidden" value='' name="id" id="impdatesid">
                    </div>
                    
                    <div class="form-group col-sm-6">
                        <button type="submit" id="impdates_update" name="imp_submit" class="btn btn-danger" value="update" style="display: none"> Update </button>
                        <button type="submit" id="impdates_submit" name="imp_submit" class="btn btn-primary" value="submit"> Submit </button>
                        <button type="reset" class="btn btn-flickr"> Reset </button>
                    </div>
                    <?php echo form_close(); ?>
                    <div class="form-group col-sm-6">
                        <div style="text-align: right;  color: #ff0000; font-weight: bold; font-style: italic; padding: 5px" id="_msg_">
                            <?php echo $this->session->flashdata('feed_msg_'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>