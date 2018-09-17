<div class="col-lg-12">
    <div class="panel panel-default"<?php //echo $style_; ?>>
        <div class="panel-heading">
            Feed Activity here...
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-5">
                    <?php echo form_open_multipart('activity/feedactivityCategory', array('name' => 'frmActivitiesCategories', 'id' => 'frmActivitiesCategories', 'role' => 'form')); ?>
                        <div class="form-group" style="background: #f0f0f0">
                            <label>&nbsp; Feed Category<sup>*</sup></label>
                            <?php
                            $data = array(
                                'type' => 'text',
                                'maxlength' => '28',
                                'autocomplete' => 'off',
                                'required' => 'required',
                                'placeholder' => 'Activity Category',
                                'class' => 'required form-control colorme',
                                'name' => 'txtActivityCategory',
                                'id' => 'txtActivityCategory',
                                'value' => ''
                            );
                            echo form_input($data);
                            ?>
                            <input type="hidden" value='' name="id" id="actcategid">
                        </div>
                        <div class="form-group" style="text-align: right; background: #f0f0f0">
                            <button type="submit" id="actcategdates_update" name="actcateg_submit" class="btn btn-danger" value="update" style="display: none"> Update </button>
                            <button type="submit" id="actcategdates_submit" name="actcateg_submit" class="btn btn-primary" value="submit"> Submit </button>
                            <button type="reset" class="btn btn-flickr"> Reset </button>
                        </div>
                    <?php echo form_close(); ?>
                        <div class="col-sm-12">
                            <div class="form-group" style="height: 200px; border: #808080 solid 1px; overflow: auto;">
                                <table class="col-sm-12 table table-striped">
                                    <tr>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php foreach ($Act_categ as $categ_item) { ?>
                                        <tr>
                                            <td><?php echo $categ_item->CATEGORY;?></td>
                                            <?php if($categ_item->STATUS_ == 1){?>
                                            <td><a href="#" id="active_<?php echo $categ_item->ACT_CATEG_ID;?>" class="active_deactive_category" style="border-radius: 4px; padding: 0px 3px;color: #ffffff; background: #009000">Active</a></td>
                                            <?php } else { ?>
                                            <td><a href="#" id="deactive_<?php echo $categ_item->ACT_CATEG_ID;?>" class="active_deactive_category" style="border-radius: 4px; padding: 0px 3px;color: #ffffff; background: #FE7B7B">DE-Active</a></td>
                                            <?php } ?>
                                            <td data-title="Modification">
                                                <i class="fa fa-pencil-square-o categ_edit_del" id="edit_<?php echo $categ_item->ACT_CATEG_ID;?>" alt="Edit" style="color:#0066cc; font-size: 20px; cursor: pointer"></i> | 
                                                <i class="fa fa-times categ_edit_del"  id="del_<?php echo $categ_item->ACT_CATEG_ID;?>" alt="Delete" style="color:#E13300; font-size: 20px; cursor: pointer"></i>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                </div>
                <div class="col-sm-7">
                    <div class="col-sm-6">
                        <?php echo form_open_multipart('activity/feedactivity', array('name' => 'frmActivities', 'id' => 'frmActivities', 'role' => 'form')); ?>
                        <div class="form-group">
                            <label>Category<sup>*</sup></label>
                            <?php
                            $data = array(
                                'type' => 'text',
                                'maxlength' => '28',
                                'autocomplete' => 'off',
                                'required' => 'required',
                                'placeholder' => 'Activity Category',
                                'class' => 'required form-control',
                                'name' => 'cmbActivityCategory',
                                'id' => 'cmbActivityCategory',
                                'value' => ''
                            );
                            $options = array();
                            $options[''] = "Select";
                            foreach ($active_category as $categ_active_item) {
                                $options[$categ_active_item->ACT_CATEG_ID] = $categ_active_item->CATEGORY;
                            }
                            echo form_dropdown($data, $options, '');
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Title<sup>*</sup></label>
                            <?php
                            $data = array(
                                'type' => 'text',
                                'maxlength' => '28',
                                'autocomplete' => 'off',
                                'required' => 'required',
                                'placeholder' => 'Title of Activity',
                                'class' => 'required form-control',
                                'name' => 'txtTitle',
                                'id' => 'txtTitle',
                                'value' => ''
                            );
                            echo form_input($data);
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Brief Description of the Activity<sup>*</sup></label>
                            <?php
                            $data = array(
                                'rows' => '5',
                                'autocomplete' => 'off',
                                'required' => 'required',
                                'placeholder' => 'Brief Description of the Activity held...',
                                'class' => 'required form-control',
                                'name' => 'txtBriefDesc',
                                'id' => 'txtBriefDesc',
                                'value' => ''
                            );
                            echo form_textarea($data);
                            ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Date of Activity<sup>*</sup></label>
                            <?php
                            $data = array(
                                'type' => 'date',
                                'autocomplete' => 'off',
                                'required' => 'required',
                                'placeholder' => 'Title of Activity',
                                'class' => 'required form-control',
                                'name' => 'txtDateofActivity',
                                'id' => 'txtDateofActivity',
                                'value' => ''
                            );
                            echo form_input($data);
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Detailed description (if any) <span style="font-size: 11px; color: #808080; font-weight: normal; font-style: italic">Only <b>[ .jpg| .gif| .png| .pdf| .doc| .docx ]</b> are allowed</span></label>
                            <?php
                            $data = array(
                                'type' => 'file',
                                'autocomplete' => 'off',
                                'class' => 'required form-control',
                                'name' => 'txtInputFileDescription',
                                'id' => 'txtInputFileDescription',
                                'value' => ''
                            );
                            echo form_input($data);
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Picture/ Photo of the activity<sup>*</sup> <span style="font-size: 11px; color: #808080; font-weight: normal; font-style: italic">Only <b>[ .jpg| .gif| .png| ]</b> are allowed</span></label>
                            <?php
                            $data = array(
                                'type' => 'file',
                                'required' => 'required',
                                'autocomplete' => 'off',
                                'class' => 'required form-control',
                                'name' => 'txtInputFilePicture',
                                'id' => 'txtInputFilePicture',
                                'value' => ''
                            );
                            echo form_input($data);
                            ?>
                        </div>
                        <div class="form-group" style="text-align: right">
                            <button type="submit" class="btn btn-primary"> Submit </button>
                            <button type="reset" class="btn btn-flickr"> Reset </button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div style="color: #ff0000; font-weight: bold; font-style: italic; padding: 5px"><?php echo $this->session->flashdata('feed_msg_'); ?></div>
            </div>
        </div>
    </div>
</div>