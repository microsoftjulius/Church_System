<!-- jQuery -->
<script src="{{ asset('bootstrap/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ asset('bootstrap/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset('bootstrap/vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{ asset('bootstrap/vendors/nprogress/nprogress.js')}}"></script>
<!-- Chart.js -->
<script src="{{ asset('bootstrap/vendors/Chart.js/dist/Chart.min.js')}}"></script>
<!-- gauge.js -->
<script src="{{ asset('bootstrap/vendors/gauge.js/dist/gauge.min.js')}}"></script>
<!-- bootstrap-progressbar -->
<script src="{{ asset('bootstrap/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
<!-- iCheck -->
<script src="{{ asset('bootstrap/vendors/iCheck/icheck.min.js')}}"></script>
<!-- Skycons -->
<script src="{{ asset('bootstrap/vendors/skycons/skycons.js')}}"></script>
<!-- Flot -->
<script src="{{ asset('bootstrap/vendors/Flot/jquery.flot.js')}}"></script>
<script src="{{ asset('bootstrap/vendors/Flot/jquery.flot.pie.js')}}"></script>
<script src="{{ asset('bootstrap/vendors/Flot/jquery.flot.time.js')}}"></script>
<script src="{{ asset('bootstrap/vendors/Flot/jquery.flot.stack.js')}}"></script>
<script src="{{ asset('bootstrap/vendors/Flot/jquery.flot.resize.js')}}"></script>
<!-- Flot plugins -->
<script src="{{ asset('bootstrap/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
<script src="{{ asset('bootstrap/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
<script src="{{ asset('bootstrap/vendors/flot.curvedlines/curvedLines.js')}}"></script>
<!-- DateJS -->
<script src="{{ asset('bootstrap/vendors/DateJS/build/date.js')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('bootstrap/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
<script src="{{ asset('bootstrap/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
<script src="{{ asset('bootstrap/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ asset('bootstrap/vendors/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('bootstrap/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!--For the Tables-->
<!-- Datatables -->
<script src="{{ asset('bootstrap/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('bootstrap/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('bootstrap/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('bootstrap/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{ asset('bootstrap/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{ asset('bootstrap/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('bootstrap/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('bootstrap/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{ asset('bootstrap/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{ asset('bootstrap/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('bootstrap/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{ asset('bootstrap/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
<script src="{{ asset('bootstrap/vendors/jszip/dist/jszip.min.js')}}"></script>
<script src="{{ asset('bootstrap/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{ asset('bootstrap/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
<!-- Custom Theme Scripts -->
<script src="{{ asset('bootstrap/build/js/custom.min.js')}}"></script>

<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{ asset('bootstrap/charts/js/mdb.min.js') }}"></script>

<script type="text/javascript">
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    var yyyy = today.getFullYear();

    today = mm + '/' + dd + '/' + yyyy + " " + today.getHours() + ":" + today.getMinutes();
    document.getElementById('dateshown').setAttribute("Value",today);

</script>

<script type="text/javascript">
function countChars(obj){
    document.getElementById("charNum").innerHTML = obj.value.length+' characters (1 Message is 160 characters but MTN includes:*196#, 2 Messages is 310 characters)';
}
</script>
