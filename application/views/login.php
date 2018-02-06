<?php $style_ = ' style="overflow: auto"'; ?>
<div class="container">
    <div class="row">
        <div class="col-lg-12" style="padding: 20px; color: #ffffff; text-align: center;">
            <h5><b>dPanel</b><br /><?php echo _SCHOOL_; ?></h5>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <div class="panel panel-default"<?php echo $style_; ?>>
                <div class="panel-heading">
                    Login Please
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php echo form_open('login/sign_in_', array('name' => 'frmLogin', 'id' => 'frmLogin', 'role' => 'form')); ?>
                            <div class="form-group">
                                <label>Username</label>
                                <?php
                                $data = array(
                                    'type' => 'text',
                                    'autocomplete' => 'off',
                                    'required' => 'required',
                                    'placeholder' => 'Username please',
                                    'class' => 'required form-control',
                                    'name' => 'txtUsr',
                                    'id' => 'txtUsr',
                                    'value' => ''
                                );
                                echo form_input($data);
                                ?>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <?php
                                $data = array(
                                    'type' => 'password',
                                    'autocomplete' => 'off',
                                    'placeholder' => 'Password please',
                                    'required' => 'required',
                                    'class' => 'required form-control',
                                    'name' => 'txtPwd',
                                    'id' => 'txtPwd',
                                    'value' => ''
                                );
                                echo form_input($data);
                                ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Sign in</button>
                            <?php echo form_close(); ?>
                            <div style="color: #ff0000; font-weight: bold; font-style: italic; padding: 5px"><?php echo $this->session->flashdata('feed_msg_'); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4" style="padding: 20px; color: #ffffff; text-align: center;">
            <h4>Caution:</h4><h5><b>Please close [<?php echo __BACKTOSITE__;?>] from any tab of the current browser if you want to log-in to this dPanel.</b></h5>
        </div>
        <div class="col-lg-4"></div>
    </div>
</div>