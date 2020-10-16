<footer class="border-top">
        <div class="row">
            <div class="col-12 col-sm-6">This template is designed by <b>maxartkiller</b> with <span class="text-danger">❤</span></div>
            <div class="col-12 col-sm-6 text-right"><a href="#" class="content-color-secondary">Privacy Policy</a> | <a href="#" class="content-color-secondary">Terms of use</a></div>
        </div>
    </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url() . "templates/"; ?>js//jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url() . "templates/"; ?>js//popper.min.js"></script>
    <script src="<?php echo base_url() . "templates/"; ?>vendor/bootstrap-4.1.3/js/bootstrap.min.js"></script>

    <!-- Cookie jquery file -->
    <script src="<?php echo base_url() . "templates/"; ?>vendor/cookie/jquery.cookie.js"></script>

    <!-- sparklines chart jquery file -->
    <script src="<?php echo base_url() . "templates/"; ?>vendor/sparklines/jquery.sparkline.min.js"></script>

    <!-- Circular progress gauge jquery file -->
    <script src="<?php echo base_url() . "templates/"; ?>vendor/circle-progress/circle-progress.min.js"></script>

    <!-- Swiper carousel jquery file -->
    <script src="<?php echo base_url() . "templates/"; ?>vendor/swiper/js/swiper.min.js"></script>

    <!-- Chart js jquery file -->
    <script src="<?php echo base_url() . "templates/"; ?>vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?php echo base_url() . "templates/"; ?>vendor/chartjs/utils.js"></script>

    <!-- Footable jquery file -->
    <script src="<?php echo base_url() . "templates/"; ?>vendor/footable-bootstrap/js/footable.min.js"></script>

    <!-- datepicker jquery file -->
    <script src="<?php echo base_url() . "templates/"; ?>vendor/bootstrap-daterangepicker-master/moment.js"></script>
    <script src="<?php echo base_url() . "templates/"; ?>vendor/bootstrap-daterangepicker-master/daterangepicker.js"></script>

    <!-- jVector map jquery file -->
    <script src="<?php echo base_url() . "templates/"; ?>vendor/jquery-jvectormap/jquery-jvectormap.js"></script>
    <script src="<?php echo base_url() . "templates/"; ?>vendor/jquery-jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- Bootstrap tour jquery file -->
    <script src="<?php echo base_url() . "templates/"; ?>vendor/bootstrap_tour/js/bootstrap-tour-standalone.min.js"></script>

    <!-- jquery toast message file -->
    <script src="<?php echo base_url() . "templates/"; ?>vendor/jquery-toast-plugin-master/dist/jquery.toast.min.js"></script>

    <!-- Application main common jquery file -->
    <script src="<?php echo base_url() . "templates/"; ?>js//main.js"></script>

    <!-- page specific script -->
    <script src="<?php echo base_url() . "templates/"; ?>js//dashboard.js"></script>

    
    <!-- DataTable jquery file -->
    <script src="<?php echo base_url() . "templates/"; ?>vendor/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() . "templates/"; ?>vendor/DataTables-1.10.18/js/dataTables.bootstrap4.min.js"></script>
   <!-- <script src="sweetalert2.all.min.js"></script> -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>


    <!-- page specific script -->
    <script>
        "use script";
        $(window).on('load', function() {
            var tour = new Tour({
                steps: [{
                    element: "#left-menu",
                    title: "Main Menu",
                    content: "Access the demo pages from sidebar",
                    smartPlacement: true,
                    storage:false
                }, {
                    element: "button[data-target='#createOrder']",
                    title: "Creative Form",
                    content: "See beautifully designed form in modal",
                    smartPlacement: true,
                    placement: "left",
                    storage:false

                }, {
                    element: ".close-sidebar",
                    title: "Customizaton Menu",
                    content: "Customize your Layout style",
                    smartPlacement: true,
                    placement: "left",
                    storage:false

                }]

            });

            // Initialize the tour
            tour.init();

            // Start the tour
            tour.start();
        });

    </script>

</body>


<!-- Mirrored from maxartkiller.com/website/gotri-admin/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Oct 2020 12:38:53 GMT -->
</html>
