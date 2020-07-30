<footer class="main-footer">
    <strong>Copyright &copy; 2014-2020 <a href="#">HaiSanLongHoang</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.3-pre
  </div>
</footer>    
  <!-- Google Font: Source Sans Pro -->
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
      
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
          <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
      </div>
      <!-- ./wrapper -->
      <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>

      <!-- jQuery -->
      <script src="../public/admin/plugins/jquery/jquery.min.js"></script>
      <!-- jQuery UI 1.11.4 -->
      <script src="../public/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
      <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
      <script>
        $.widget.bridge('uibutton', $.ui.button)
      </script>
      <!-- Bootstrap 4 -->
      <script>    CKEDITOR.replace( 'mota' );</script>
      <script>    CKEDITOR.replace( 'chitiet' );</script>
      <script src="../public/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- ChartJS -->
      <script src="../public/admin/plugins/chart.js/Chart.min.js"></script>
      <!-- Sparkline -->
      <script src="../public/admin/plugins/sparklines/sparkline.js"></script>
      <!-- JQVMap -->
      <script src="../public/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
      <script src="../public/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
      <!-- jQuery Knob Chart -->
      <script src="../public/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
      <!-- daterangepicker -->
      <script src="../public/admin/plugins/moment/moment.min.js"></script>
      <script src="../public/admin/plugins/daterangepicker/daterangepicker.js"></script>
      <!-- Tempusdominus Bootstrap 4 -->
      <script src="../public/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
      <!-- Summernote -->
      <script src="../public/admin/plugins/summernote/summernote-bs4.min.js"></script>
      <!-- overlayScrollbars -->
      <script src="../public/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
      <!-- AdminLTE App -->
      <script src="../public/admin/dist/js/adminlte.js"></script>
      <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
      <script src="../public/admin/dist/js/pages/dashboard.js"></script>
      <!-- AdminLTE for demo purposes -->
      <script src="../public/admin/dist/js/demo.js"></script>
	  <script src="assets/tether/tether.min.js"></script>
	  <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
	  <script src="assets/bootstrap/bootstrap4-alpha3.min.js"></script>
	  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
      <script>
        var array_1 = <?php echo json_encode($array_total);?>;
		var array_2 = <?php echo json_encode($array_total1);?>;
			$(function () {
				var totalRevenue = 0;
				
				// CanvasJS column chart to show revenue from Jan 2015 - Dec 2015
				var revenueColumnChart = new CanvasJS.Chart("revenue-column-chart", {
					animationEnabled: true,
					backgroundColor: "transparent",
					theme: "theme2",
					axisX: {
						labelFontSize: 14,
						valueFormatString: "MMM YYYY"
					},
					axisY: {
						labelFontSize: 14,
						prefix: "vnđ "
					},
					toolTip: {
						borderThickness: 0,
						cornerRadius: 0
					},
					data: [
						{
							type: "column",
							yValueFormatString: "$###,###.##",
							dataPoints: [
								{ x: new Date("1 Jan 2020"), y: array_1[0]},
								{ x: new Date("1 Feb 2020"), y: array_1[1]},
								{ x: new Date("1 Mar 2020"), y: array_1[2]},
								{ x: new Date("1 Apr 2020"), y: array_1[3]},
								{ x: new Date("1 May 2020"), y: array_1[4]},
								{ x: new Date("1 Jun 2020"), y: array_1[5]},
								{ x: new Date("1 Jul 2020"), y: array_1[6]},
								{ x: new Date("1 Aug 2020"), y: array_1[7]},
								{ x: new Date("1 Sep 2020"), y: array_1[8]},
								{ x: new Date("1 Oct 2020"), y: array_1[9]},
								{ x: new Date("1 Nov 2020"), y: array_1[10]},
								{ x: new Date("1 Dec 2020"), y: array_1[11]}
							]
						}
					]
				});
				
				revenueColumnChart.render();
				
				//CanvasJS spline chart to show orders from Jan 2015 to Dec 2015
				var ordersSplineChart = new CanvasJS.Chart("orders-spline-chart", {
					animationEnabled: true,
					backgroundColor: "transparent",
					theme: "theme2",
					toolTip: {
						borderThickness: 0,
						cornerRadius: 0
					},
					axisX: {
						labelFontSize: 14,
						maximum: new Date("31 Dec 2020"),
						valueFormatString: "MMM YYYY"
					},
					axisY: {
						gridThickness: 0,
						labelFontSize: 14,
						lineThickness: 2
					},
					data: [
						{
							type: "spline",
							dataPoints: [
								{ x: new Date("1 Jan 2020"), y: array_2[0] },
								{ x: new Date("1 Feb 2020"), y: array_2[1] },
								{ x: new Date("1 Mar 2020"), y: array_2[2] },
								{ x: new Date("1 Apr 2020"), y: array_2[3] },
								{ x: new Date("1 May 2020"), y: array_2[4] },
								{ x: new Date("1 Jun 2020"), y: array_2[5] },
								{ x: new Date("1 Jul 2020"), y: array_2[6] },
								{ x: new Date("1 Aug 2020"), y: array_2[7] },
								{ x: new Date("1 Sep 2020"), y: array_2[8] },
								{ x: new Date("1 Oct 2020"), y: array_2[9] },
								{ x: new Date("1 Nov 2020"), y: array_2[10] },
								{ x: new Date("1 Dec 2020"), y: array_2[11] }
							]
						}
					]
				});

				ordersSplineChart.render();
				
			});
		</script>
      <script>
        $(document).ready(function() {
              $('#example').DataTable();
          } );
      </script>
        <script>
            // Thay thế <textarea id="post_content"> với CKEditor
            CKEDITOR.replace( 'post_content' );// tham số là biến name của textarea
        </script>
      <script>
    $(function(){
        //button select all or cancel
        $("#select-all").click(function () {
            var all = $("input.select-all")[0];
            all.checked = !all.checked
            var checked = all.checked;
            $("input.select-item").each(function (index,item) {
                item.checked = checked;
            });
        });
        //column checkbox select all or cancel
        $("input.select-all").click(function () {
            var checked = this.checked;
            $("input.select-item").each(function (index,item) {
                item.checked = checked;
            });
        });
        //check selected items
        $("input.select-item").click(function () {
            var checked = this.checked;
            var all = $("input.select-all")[0];
            var total = $("input.select-item").length;
            var len = $("input.select-item:checked:checked").length;
            all.checked = len===total;
        });
        
    });
     
        
</script>
</body>
</html>