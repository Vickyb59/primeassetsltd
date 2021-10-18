<!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metismenu.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/feather.min.js"></script>
        <script src="assets/js/simplebar.min.js"></script>
        <script src="assets/js/moment.js"></script>
        <script src="plugins/daterangepicker/daterangepicker.js"></script>

        <script src="plugins/apex-charts/apexcharts.min.js"></script>
        <script src="plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>
        <?php 
			if ($page_name == 'Dashboard') {
				include('inc/chartscript.php');
			}else{
				echo "";
			}
        ?>

        <!-- Plugins js -->

        <script src="plugins/select2/select2.min.js"></script>
        <script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="plugins/timepicker/bootstrap-material-datetimepicker.js"></script>
        <script src="plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <script src="plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>

        <script src="assets/pages/jquery.forms-advanced.js"></script>

        <script src="plugins/leaflet/leaflet.js"></script> 
        <script src="plugins/lightpick/lightpick.js"></script>
        <script src="assets/pages/jquery.profile.init.js"></script> 
        

        <!-- App js -->
        <script src="assets/js/app.js"></script>


        <script src="assets/js/forbit/bitcoinTracker.js"></script>
        <script src="assets/js/forbit/bitcoinTrackerTheme.js"></script>
        <script src="assets/js/forbit/bitcoinPrice.js"></script>
        <script src="assets/js/forbit/bitcoinPriceWidgets.js"></script>
        <script src="assets/js/forbit/bitcoinChart.js"></script>
        <script src="assets/js/forbit/bitcoinCalculators.js"></script>