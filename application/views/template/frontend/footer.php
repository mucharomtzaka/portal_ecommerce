<footer class="box footer" id="kontak">
	 <div class="container" id="bottom">
		 <div class="pull-right hidden-xs">
        	<?php echo $title_footer ?>
      	  </div>
		
      <p class="footer text-center"> &copy; Copy Right All Reserved <?php echo date('Y');?>. <?php echo $credit;?><br>
      </p>
      </div>
  </footer>
<script>
  (function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/id_ID/all.js#xfbml=1&appId='<?php echo $app_id_fb;?>'";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<script src="<?php echo base_url('plugins/jQuery/jquery-2.2.3.min.js');?>"></script>
 <script src="<?php echo base_url('plugins/jQueryUI/jquery-ui.js');?>"></script> 
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('bootstrap/js/bootstrap.js');?>"></script>
<script src="<?php echo base_url('bootstrap/js/modernizr.js');?>"></script>
<script src="<?php echo base_url('bootstrap/js/custom.js');?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('plugins/slimScroll/jquery.slimscroll.min.js');?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('plugins/fastclick/fastclick.js');?>"></script>
<script src="<?php echo base_url('plugins/ckeditor/ckeditor.js');?>"></script>
<script src="<?php echo base_url('plugins/select2/select2.full.min.js');?>"></script>
<script src="<?php echo base_url('plugins/datepicker/bootstrap-datepicker.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('plugins/datatables/jquery.dataTables.min.js');?>"></script>
<script src="<?php echo base_url('plugins/datatables/dataTables.bootstrap.min.js');?>"></script>
 <script src="<?php echo base_url('dist/js/app.min.js');?>"></script>
<script src="<?php echo base_url('dist/js/etc.js');?>"></script> 
  <script src="<?php echo base_url();?>bootstrap/js/plugins.js"></script>
<script src="<?php echo base_url('plugins/pace/pace.min.js');?>"></script>
<script src="<?php echo base_url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js');?>"></script>
<?php echo $google_analyst;?>
</div>
</body>
</html>