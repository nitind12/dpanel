<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <?php foreach($menu as $item){ ?>
                        <li>
                            <a href="<?php echo site_url($item->PATH_); ?>"><i class="<?php echo $item->PRE_ICON; ?>"></i> <?php echo $item->MENU; ?></a>
                        </li>
                        <?php }?>
                    </ul>
                </div>
            </div>