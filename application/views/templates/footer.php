<!-- jQuery -->
<script src="<?php echo base_url('_assets_/admin_sources/bower_components/jquery/dist/jquery.min.js'); ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('_assets_/admin_sources/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url('_assets_/admin_sources/bower_components/metisMenu/dist/metisMenu.min.js'); ?>"></script>

<!-- Morris Charts JavaScript -->
<script src="<?php echo base_url('_assets_/admin_sources/bower_components/raphael/raphael-min.js'); ?>"></script>
<script src="<?php echo base_url('_assets_/admin_sources/bower_components/morrisjs/morris.min.js'); ?>"></script>
<script src="<?php echo base_url('_assets_/admin_sources/js/morris-data.js'); ?>"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url('_assets_/admin_sources/dist/js/sb-admin-2.js'); ?>"></script>
<script src="<?php echo base_url('_assets_/admin_sources/bower_components/jquery/dist/jquery-2.1.1.min.js'); ?>"></script>        
<script src="<?php echo base_url('_assets_/admin_sources/bower_components/jquery/dist/jquery.form.min.js'); ?>"></script>
<script src="<?php echo base_url('_assets_/admin_sources/js/adminJS.js'); ?>"></script>  
<script type="text/javascript" src="<?php echo base_url('_assets_/js/agijs.js');?>?ver=1.0"></script>  
<script>
    var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);

    if (!isChrome){
        document.getElementById("doc__").innerHTML = "<div style='padding: 25px; text-align: center; font-size: 25px; color: #900000; font-weight: bold'>- Please switch to <span style='color: #ff0000'>google { chrome } browser</span> to use this application. -</div>"; 
    } 
</script>
</body>
</html>