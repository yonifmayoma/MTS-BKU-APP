 <!--   Core JS Files   -->
 <script src={{ asset('assets/js/core/jquery-3.7.1.min.js') }}></script>
 <script src={{ asset('assets/js/core/popper.min.js') }}></script>
 <script src={{ asset('assets/js/core/bootstrap.min.js') }}></script>

 <!-- jQuery Scrollbar -->
 <script src={{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}></script>

 <!-- Chart JS -->
 <script src={{ asset('assets/js/plugin/chart.js/chart.min.js') }}></script>

 <!-- jQuery Sparkline -->
 <script src={{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}></script>

 <!-- Chart Circle -->
 <script src={{ asset('assets/js/plugin/chart-circle/circles.min.js') }}></script>

 <!-- Datatables -->
 <script src={{ asset('assets/js/plugin/datatables/datatables.min.js') }}></script>

 <!-- Bootstrap Notify -->
 <script src={{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}></script>

 <!-- jQuery Vector Maps -->
 <script src={{ asset('assets/js/plugin/jsvectormap/jsvectormap.min.js') }}></script>
 <script src={{ asset('assets/js/plugin/jsvectormap/world.js') }}></script>

 <!-- Sweet Alert -->
 <script src={{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}></script>

 <!-- Kaiadmin JS -->
 <script src={{ asset('assets/js/kaiadmin.min.js') }}></script>

 <!-- Kaiadmin DEMO methods, don't include it in your project! -->
 <script src={{ asset('assets/js/setting-demo.js') }}></script>
 <script src={{ asset('assets/js/demo.js') }}></script>
 <script src={{ asset('assets/js/setting-demo2.js') }}></script>

 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>



 <script>
     $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
         type: "line",
         height: "70",
         width: "100%",
         lineWidth: "2",
         lineColor: "#177dff",
         fillColor: "rgba(23, 125, 255, 0.14)",
     });

     $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
         type: "line",
         height: "70",
         width: "100%",
         lineWidth: "2",
         lineColor: "#f3545d",
         fillColor: "rgba(243, 84, 93, .14)",
     });

     $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
         type: "line",
         height: "70",
         width: "100%",
         lineWidth: "2",
         lineColor: "#ffa534",
         fillColor: "rgba(255, 165, 52, .14)",
     });
 </script>

 <script>
     document.addEventListener('DOMContentLoaded', function() {
         const navItems = document.querySelectorAll('.nav-item');
         navItems.forEach(item => {
             item.addEventListener('click', function() {
                 // Remove 'active' class from all nav-items
                 navItems.forEach(i => i.classList.remove('active'));

                 // Add 'active' class to the clicked nav-item
                 this.classList.add('active');
             });
         });
     });
 </script>
