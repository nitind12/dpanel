<style>
    @media only screen and (max-width: 800px) {
    /* Force table to not be like tables anymore */
    #no-more-tables table,
    #no-more-tables thead,
    #no-more-tables tbody,
    #no-more-tables th,
    #no-more-tables td,
    #no-more-tables tr {
    display: block;
    }
     
    /* Hide table headers (but not display: none;, for accessibility) */
    #no-more-tables thead tr {
    position: absolute;
    top: -9999px;
    left: -9999px;
    }
     
    #no-more-tables tr { border: 1px solid #ccc; }
      
    #no-more-tables td {
    /* Behave like a "row" */
    border: none;
    border-bottom: 1px solid #eee;
    position: relative;
    padding-left: 50%;
    white-space: normal;
    text-align:left;
    }
     
    #no-more-tables td:before {
    /* Now like a table header */
    position: absolute;
    /* Top/left values mimic padding */
    top: 6px;
    left: 6px;
    width: 45%;
    padding-right: 10px;
    white-space: nowrap;
    text-align:left;
    font-weight: bold;
    }
     
    /*
    Label the data
    */
    #no-more-tables td:before { content: attr(data-title); }
    }
</style>
<div class="col-lg-12">
    <div id="no-more-tables">
        <table class="col-sm-12 table-bordered table-striped table-condensed cf">
            <thead>
                <tr>
                    <th colspan="7" bgcolor="#f0f0f0">
                        <div class="col-sm-12">
                            <h4>All Downloads</h4>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>File</th>
                    <th>Title</th>
                    <th>File</th>
                    <th>Modification</th>
                </tr>
            </thead>
            <tbody>
                <?php $no_=1;?>
                <?php foreach($dwnldsData as $item){ ?>
                <?php 
                    $title = $item->TITLE;
                ?>
                <tr>
                    <td data-title="Downloads"><?php echo $no_;?></a></td>
                    <td data-title="Name"><a href="<?php echo base_url('_assets_/downloads/'.$item->PATH_);?>" target="_blank"><?php echo $title;?></a></td>
                    <td data-title="TC No."><?php echo $item->DESCRIPTION;?></td>
                    <td data-title="Modification">
                        <a href="<?php echo site_url('downloads/edit_Downloads/'.$item->DWNLD_ID); ?>"><i class="fa fa-pencil-square-o" style="color:#0066cc; font-size: 20px;"></i></a> | 
                        <a href="<?php echo site_url('downloads/delete_downloads/'.$item->DWNLD_ID); ?>"><i class="fa fa-times" style="color:#E13300; font-size: 20px;"></i></a>
                    </td>
                </tr>
                <?php $no_++;?>
                <?php } ?>
            </tbody>
        </table>
    </div>  
</div>
<div class="col-lg-12">&nbsp;</div>