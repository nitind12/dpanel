<div class="col-lg-6">
    <div class="panel panel-default"<?php echo $style_; ?>>
        <div class="panel-heading" style="background: #fdc9d6">
            De-Active Offers
        </div>
        <!-- .panel-heading -->
        <div class="panel-body">
            <?php $cnt_ = count($offers_d); ?>
            <?php if ($cnt_ != 0) { ?>
                <div class="panel-group" id="accordion1">
                    <?php $loop1 = 1; ?>
                    <?php foreach ($offers_d as $item) { ?>
                        <div class="panel panel-default">
                            <div class="panel-heading" style="overflow: hidden">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapse<?php echo $item->ID; ?>_"><?php echo $loop1; ?>. <?php echo $item->SUBJECT; ?></a>
                                </h4>

                            </div>
                            <div id="collapse<?php echo $item->ID; ?>_" class="panel-collapse collapse<?php
                            if ($loop1 == 1) {
                                echo " in";
                            }
                            ?>">
                                <div class="panel-body">
                                    <div style="clear: both"></div>
                                    <div style="float: right; padding: 0px 1px;">
                                        <?php echo anchor('offers/delete_offers/' . $item->ID, '<span style="border: #900000 solid 1px; border-radius:5px;font-size: 11px; color: #ff0000; font-weight: bold; background: #ffffff; padding: 2px">Delete</span>', array('style' => 'float: right')); ?>
                                    </div>
                                    <div style="float: right; padding: 0px 1px;">
                                        <?php echo anchor('offers/active_deactive_offers/' . $item->ID . '/1', '<span style="border-radius:5px; font-size: 11px; color: #ffffff; background: #909090; padding: 2px">Activate</span>', array('style' => 'float: right')); ?>
                                    </div>
                                    <div style="float: right; padding: 0px 1px;">
                                        <?php echo anchor('offers/edit_offers/' . $item->ID, '<span style="border-radius:5px;font-size: 11px; color: #ffffff; background: #009000; padding: 2px">Edit</span>', array('style' => 'float: right')); ?>
                                    </div>
                                    <div style="clear: both; padding: 5px"></div>
                                    <?php echo $item->OFFERS; ?>
                                    <br />
                                    <?php if($item->PATH_ATTACH != 'x'){ ?>
                                    <a style="font-size: 10px; color: #0000ff" href="<?php echo base_url('_assets_/offers/'.$item->PATH_ATTACH);?>" target="_blank">[ Attachment ]</a>
                                    <a style="float:right; font-size: 10px; color: #ff0000" href="<?php echo site_url('offers/delete_attachment/'.$item->ID);?>">Delete Attachment?</a>
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