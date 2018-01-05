<style type="text/css">
    .myseq_txt{
        width: 65px;
        text-align: center;
    }
    .bordercolorji{
        color: #ff0000;
        font-weight: bold;
    }
</style>
<div class="col-lg-12">
        <div class="panel-body">
            <?php
                $attrib_ = array(
                    'class' => 'form-vertical',
                    'name' => 'frmFacultySeq',
                    'id' => 'frmFacultySeq',
                );
                echo form_open('#', $attrib_); 
            ?>
            <div class="row">                
                <div class="col-sm-9" style="text-align: right; float: left; color: #ff0000; font-size: 10px">
                    Just change the sequence number as per your desire and press tab to modify
                </div>
                <div class="col-sm-9">                    
                        <table class="table table-striped" id="faculty_sequence_here">
                        </table>
                        <input type="hidden" value="<?php echo $this->session->userdata('course_'); ?>" name="txtCourse_for_sequence" id="txtCourse_for_sequence">
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
</div>