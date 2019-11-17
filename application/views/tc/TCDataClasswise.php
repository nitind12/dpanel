<style type="text/css">
    span{
        color:#0000ff;
        font-weight: bold;
    }
    .disableedit{
        color: #FF8E76;
    }
    .sno_box{
        background: #ffff00; 
        border:#808080 solid 1px; 
        padding: 1px; 
        border-radius: 2px;
        margin: 5px 0px;
    }
</style>
<?php 
    $year_session = array('2016-17', '2017-18', '2018-19', '2019-20');
?>
<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading" style="overflow: hidden;">
            <div class="col-sm-6">
                Upload TC Data Classwise
            </div>
            <div class="col-sm-6" style="text-align: right">
                <a href="<?php echo base_url('_assets_/tc.xlsx');?>?ver=1.1" style="color: #009000; font-weight: bold; font-size: 13px">Download <img src="<?php echo base_url('_assets_/images/xls.png');?>?ver=1.1" width="30"></a>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <?php echo form_open_multipart('#', array('name' => 'frmTCDetail', 'id' => 'frmTCDetail', 'role' => 'form')); ?>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Select Session<sup>*</sup></label>
                        <?php
                        $data = array(
                            'type' => 'text',
                            'autocomplete' => 'off',
                            'required' => 'required',
                            'placeholder' => 'Select Session',
                            'class' => 'required form-control',
                            'style' => 'background: #feffa7; color: #0000ff',
                            'name' => 'txtSession',
                            'id' => 'txtSession',
                            'value' => ''
                        );
                        $option[''] = "Session";
                        foreach($year_session as $item){
                            $option[$item] = $item;
                        }
                        echo form_dropdown($data, $option, date('Y'));
                        ?>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Select Class<sup>*</sup></label>
                        <?php
                        $data = array(
                            'type' => 'text',
                            'autocomplete' => 'off',
                            'required' => 'required',
                            'placeholder' => 'Select Class',
                            'class' => 'required form-control',
                            'name' => 'txtClass',
                            'id' => 'txtClass',
                            'value' => ''
                        );
                        $options[''] = "Class";
                        foreach($classes as $item){
                            $options[$item] = $item;
                        }
                        echo form_dropdown($data, $options, '');
                        ?>
                    </div>
                </div>
                <div class="col-sm-4">
                    <label class="control-label">Select Excel</label>
                    <?php
                    $data = array(
                        'type' => 'file',
                        'class' => "form-control",
                        
                        'placeholder' => 'Excel Data',
                        'autocomplete' => 'off',
                        'required' => 'required',
                        'name' => 'txtTCDataUpload',
                        'id' => 'txtTCDataUpload'
                    );
                    echo form_input($data);
                    ?>
                </div>
                <div class="col-sm-2">
                    <label class="control-label">&nbsp;</label>
                    <input type="submit" value="Upload Excel" class="form-control btn btn-primary" name="cmbSubmitExcel" id="cmbSubmitExcel">
                </div>
                <div class="col-sm-2">
                    <label class="control-label">&nbsp;</label>
                    <input type="reset" value="Cancel" class="form-control btn btn-danger" name="cmbReset" id="cmbReset">
                </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="panel panel-default" id="issue_tc_data" style="display: none">
        <div class="panel-heading">
            <div class="row">
                <div class="col-sm-6">Issue TC</div>
                <div class="col-sm-6" style="text-align: right; color: #0000ff">Dated: <u><?php echo date('d-m-Y');?></u></div>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <?php echo form_open_multipart('#', array('name' => 'frmTCDetail', 'id' => 'frmTCDetail', 'role' => 'form')); ?>
                <div class="col-sm-6">
                    <label id="txtTCID" style="display: none"></label>
                    <table class="table">
                        <tr>
                            <th>Name</th>
                            <td id="tcName"></td>
                        </tr>
                        <tr>
                            <th>Father</th>
                            <th id="tcFather"></th>
                        </tr>
                        <tr>
                            <th>Mother</th>
                            <td id="tcMother"></td>
                        </tr>
                        <tr>
                            <th>DOB</th>
                            <td id="tcDOB"></td>
                        </tr>
                        <tr>
                            <th>Last studied Class</th>
                            <td id="tcLSC"></td>
                        </tr>
                    </table>
                </div>
                <div class="col-sm-6">
                    <div class="col-sm-6">
                        <label>Date of Issue</label>
                        <?php
                        $data = array(
                            'type' => 'date',
                            'autocomplete' => 'off',
                            'required' => 'required',
                            'class' => 'required form-control',
                            'name' => 'txtIssueDate',
                            'id' => 'txtIssueDate',
                            'value' => date('Y-m-d'),
                            'min' => date('Y-m-d')
                        );
                        echo form_input($data);
                        ?>
                    </div>
                    <div class="col-sm-6">
                        <label>Any Remark</label>
                        <?php
                        $data = array(
                            'autocomplete' => 'off',
                            'required' => 'required',
                            'class' => 'required form-control',
                            'name' => 'txtRemark',
                            'id' => 'txtRemark',
                            'value'=> 'no remark',
                            'style'=>'height: 50px'
                        );
                        echo form_textarea($data);
                        ?>
                    </div>
                    <div class="col-sm-12" style="padding: 10px;">
                        <?php
                           $data = array(
                                'type' => 'checkbox',
                                'required' => 'required',
                                'name' => 'chkAcceptTerms',
                                'id' => 'chkAcceptTerms',
                                'style'=>'float: left;',
                            );
                            echo form_checkbox($data);
                        ?> &nbsp; I (<span><?php echo $this->session->userdata('ussr_');?></span>) accept all terms &amp; Conditions in issuing this Transfer Certificate as (<span class="copy__"></span> copy) on date: <span class="dt_"><?php echo date('d-m-Y');?></span> on behalf of the School (<span><?php echo _SCHOOL_;?></span>) authority.
                        <label id="txtTCTerms" style="display: none">
                            I (<?php echo $this->session->userdata('ussr_');?>) accept all terms &amp; Conditions in issuing this Transfer Certificate as (<span class="copy__"></span> copy) on date: <span class="dt_"><?php echo date('d-m-Y');?></span> on behalf of the School (<span><?php echo _SCHOOL_;?></span>) authority.
                        </label>
                    </div>
                    <div class="col-sm-6">
                        <input type="button" value="Verify & Issue TC" class="form-control btn btn-success" name="cmbIssueTC" id="cmbIssueTC" disabled="disabled">
                    </div>
                    <div class="col-sm-6">
                        <input type="button" value="Cancel" class="form-control btn btn-danger" name="cmbCancelTCIssue" id="cmbCancelTCIssue">
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12">
<div class="panel panel-default" style="overflow: hidden; display: none" id="msg_box">
<div class="col-lg-12" style="color: #ff0000; font-family: verdana; font-size: 11px;">
    <div style="float: right; margin: 1px;  padding: 1px 10px; border-radius: 15px; background: #ff0000; color: #ffffff; font-weight: bold; padding: 1px; cursor: pointer" id="close_msg_box">&nbsp;X&nbsp;</div>
    <div style="float: left" id="_msg_here">X: Message here...</div>
</div>
</div>
</div>

<div class="col-lg-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-sm-6" id="heading_TC_data">View Stduent Data for TC</div>
                <div class="col-sm-6" style="text-align: right; color: #0000ff">| <a href="#" id="reloadData"><b>reload</b></a> |</div>
            </div>
        </div>
        <div class="panel-body" id="view_tc_data" style="overflow: scroll; height: auto">

        </div>
    </div>
</div>