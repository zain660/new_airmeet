 @php
     $setting = App\Models\Setting::find(1);
 @endphp

 <!-- footer start-->
 <footer class="footer">
     <div class="container-fluid">
         <div class="row">
             <div class="col-md-3 footer-copyright">
                 <p class="mb-0">Copyright {{ date('Y') }} © {{ $setting->app_name }} All rights reserved.
                 </p>
             </div>
             <div class="col-md-4">
                 <p class="pull-right mb-0">Designed & Developed with <i class="fa fa-heart" style="color: red"></i> By
                     <strong>Deevloopers</strong></p>
             </div>
         </div>
     </div>
 </footer>

 <!-- latest jquery-->
 <script src="{{ asset('/front/assets/js/editor/ckeditor/ckeditor.custom.js') }}"></script>
 <script src="{{ asset('/front/assets/js/editor/ckeditor/adapters/jquery.js') }}"></script>
 <script src="{{ asset('/front/assets/js/editor/ckeditor/styles.js') }}"></script>
 <script src="{{ asset('/front/assets/js/editor/ckeditor/ckeditor.js') }}"></script>

 <script src="{{ asset('/front/assets/js/jquery-3.5.1.min.js') }}"></script>
 <!-- feather icon js-->
 <script src="{{ asset('/front/assets/js/icons/feather-icon/feather.min.js') }}"></script>
 <script src="{{ asset('/front/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
 <!-- Sidebar jquery-->
 <script src="{{ asset('/front/assets/js/sidebar-menu.js') }}"></script>
 <script src="{{ asset('/front/assets/js/config.js') }}"></script>
 <!-- Bootstrap js-->
 <script src="{{ asset('/front/assets/js/bootstrap/popper.min.js') }}"></script>
 <script src="{{ asset('/front/assets/js/bootstrap/bootstrap.min.js') }}"></script>
 <!-- Plugins JS start-->
 <script src="{{ asset('/front/assets/js/chart/chartist/chartist.js') }}"></script>
 <script src="{{ asset('/front/assets/js/chart/chartist/chartist-plugin-tooltip.js') }}"></script>
 <script src="{{ asset('/front/assets/js/chart/knob/knob.min.js') }}"></script>
 <script src="{{ asset('/front/assets/js/chart/knob/knob-chart.js') }}"></script>
 <script src="{{ asset('/front/assets/js/chart/apex-chart/apex-chart.js') }}"></script>
 <script src="{{ asset('/front/assets/js/chart/apex-chart/stock-prices.js') }}"></script>
 <script src="{{ asset('/front/assets/js/prism/prism.min.js') }}"></script>
 <script src="{{ asset('/front/assets/js/clipboard/clipboard.min.js') }}"></script>
 <script src="{{ asset('/front/assets/js/counter/jquery.waypoints.min.js') }}"></script>
 <script src="{{ asset('/front/assets/js/counter/jquery.counterup.min.js') }}"></script>
 <script src="{{ asset('/front/assets/js/counter/counter-custom.js') }}"></script>
 <script src="{{ asset('/front/assets/js/custom-card/custom-card.js') }}"></script>
 <script src="{{ asset('/front/assets/js/notify/bootstrap-notify.min.js') }}"></script>
 <script src="{{ asset('/front/assets/js/vector-map/jquery-jvectormap-2.0.2.min.js') }}"></script>
 <script src="{{ asset('/front/assets/js/vector-map/map/jquery-jvectormap-world-mill-en.js') }}"></script>
 <script src="{{ asset('/front/assets/js/vector-map/map/jquery-jvectormap-us-aea-en.js') }}"></script>
 <script src="{{ asset('/front/assets/js/vector-map/map/jquery-jvectormap-uk-mill-en.js') }}"></script>
 <script src="{{ asset('/front/assets/js/vector-map/map/jquery-jvectormap-au-mill.js') }}"></script>
 <script src="{{ asset('/front/assets/js/vector-map/map/jquery-jvectormap-chicago-mill-en.js') }}"></script>
 <script src="{{ asset('/front/assets/js/vector-map/map/jquery-jvectormap-in-mill.js') }}"></script>
 <script src="{{ asset('/front/assets/js/vector-map/map/jquery-jvectormap-asia-mill.js') }}"></script>
 <script src="{{ asset('/front/assets/js/dashboard/default.js') }}"></script>
 <script src="{{ asset('/front/assets/js/notify/index.js') }}"></script>
 <script src="{{ asset('/front/assets/js/datepicker/date-picker/datepicker.js') }}"></script>
 <script src="{{ asset('/front/assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
 <script src="{{ asset('/front/assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
 <!-- Plugins JS Ends-->
 <!-- Theme js-->
 <script src="{{ asset('/front/assets/js/script.js') }}"></script>
 <script src="{{ asset('/front/assets/js/theme-customizer/customizer.js') }}"></script>

 <!-- login js-->
 <!-- Plugin used-->
 </body>

 </html>
