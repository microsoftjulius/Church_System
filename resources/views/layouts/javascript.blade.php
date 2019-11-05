<!-- jQuery -->
<script src="{{ asset('bootstrap/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ asset('bootstrap/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Chart.js -->
{{-- <script src="{{ asset('bootstrap/vendors/Chart.js/dist/Chart.min.js')}}"></script> --}}
<!-- DateJS -->
<script src="{{ asset('bootstrap/vendors/DateJS/build/date.js')}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ asset('bootstrap/vendors/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('bootstrap/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!--For the Tables-->
<!-- Datatables -->
<script src="{{ asset('bootstrap/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('bootstrap/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('bootstrap/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{ asset('bootstrap/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
<!-- Custom Theme Scripts -->
<script src="{{ asset('bootstrap/build/js/custom.min.js')}}"></script>

<!--Jquery code for date time picker-->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- MDB core JavaScript -->

<!--multiselect checkboxes-->


<script>
        $( function() {
          $( "#datepicker" ).datepicker();
        } );
        </script>

<script type="text/javascript">
function countChars(obj){
    var maxLength = 160;   
    var strLength = obj.value.length;
    var firstMessage = maxLength ;
    
    if(firstMessage == 160){
      document.getElementById("charNum").innerHTML = obj.value.length+'<span style="color:red;">(You have reached limit of 160 characters for 1 message)</span>';
  }else{
       document.getElementById("charNum").innerHTML = firstMessage+'characters [1message is 160 characters,2messages 310 characters]';
   }
 
   if (strLength === maxLength){
    document.getElementById("charNum").innerHTML = obj.value.length+'<span style="color:red;">(You have reached limit of 160 characters for 1 message)</span>';
   } 
   else{
    document.getElementById("charNum").innerHTML = strLength+'characters [1message is 160 characters,2messages 310 characters]';
   } 
   
}
</script>

<script type="text/javascript">
        $('text').maxlength({
              alwaysShow: true,
              threshold: 10,
              warningClass: "label label-success",
              limitReachedClass: "label label-danger",
              separator: ' out of ',
              preText: 'You write ',
              postText: ' chars.',
              validate: true,
              placement: 'bottom-left'
        });
    </script>

<script type="text/javascript">
$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
            $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
</script>




