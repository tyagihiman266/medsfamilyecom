<footer class="main-footer">
    <div class="pull-right hidden-xs">
    </div>
	<strong>Copyright &copy; 2018 
	<a href="<?php echo $adminlink;?>">Technobrix</a>.
	</strong> All rights reserved.
</footer>
	<!-- Control Sidebar -->
    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- DATA TABES SCRIPT -->
    <script src="plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
	<script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
	<script>
 function getpillprice(){
      var number=$("#no_pills").val();
     var price=$("#price").val();
      var discount=$("#discount").val();
    $.ajax({
    type: "post",
    url: "inc/ajax.php",
    data: {"number":number,"price":price,"discount":discount},
    success: function(result){
    //alert(result);
        $("#per_pill").val(result);
    }
    
    
    });
  }
	</script>