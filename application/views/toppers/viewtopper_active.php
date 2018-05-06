<style>
	.toppers_label{
		color: #808080; 
		min-width: 120px !important;
		float: left;
		clear: both;
	}
	.toppers_content{

	}
</style>
<div class="col-lg-6">
    <div class="panel panel-default"<?php echo $style_; ?>>
        <div class="panel-heading" style="background: #c3f9cb">
            Active Toppers
        </div>
        <!-- .panel-heading -->
        <div class="panel-body">
            <?php $cnt_ = count($toppers); ?>
            <?php if ($cnt_ != 0) { ?>
            <div class="panel-group" id="accordion">
                <?php $loop1 = 1; ?>
                <?php foreach ($toppers as $item) { ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $item->SNO; ?>"><?php echo $loop1; ?>. <?php echo $item->SNAME; ?></a>
                            </h4>
                            
                        </div>
                        <div id="collapse<?php echo $item->SNO; ?>" class="panel-collapse collapse<?php if($loop1 == 1){ echo " in"; } ?>">
                            <div class="panel-body">
                                <?php if($item->PHOTO_ != 'x'){ ?>
                                <div style="float: left; padding: 0px 1px;">
                                    <img src="<?php echo base_url('_assets_/toppers/'.$item->PHOTO_);?>" style="width: 90px">
                                </div>
                                <?php }?>
                                <div style="float: right; padding: 0px 1px;">
                                <?php echo anchor('topper/active_deactive_toppers/'.$item->SNO.'/0', '<span style="border-radius: 5px;font-size: 11px; color: #ffffff; background: #904444; padding: 2px">Deactivate</span>', array('style'=>'float: right')); ?>
                                </div>
                                <div style="clear: both; padding: 5px"></div>
                                <div class="toppers_label">Achievement: </div><div class="toppers_content"><?php echo $item->MERIT_NAME;?></div>
                                <div class="toppers_label">Achievment Year: </div><div class="toppers_content"><?php echo $item->YOP;?></div>
                                <br />
                                <?php if($item->PHOTO_ != 'x'){ ?>
                                <a style="font-size: 10px; color: #0000ff" href="<?php echo base_url('_assets_/toppers/'.$item->PHOTO_);?>" target="_blank">[ Attachment ]</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php $loop1 += 1; ?>
                <?php } ?>
            </div>
            <?php } else { ?>
                <div style="padding: 5px; float: left; color: #0000FF;">No Data Found !</div>
            <?php } ?>
        </div>
    </div>
</div>