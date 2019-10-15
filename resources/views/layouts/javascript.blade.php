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

<!-- MDB core JavaScript -->

<!--multiselect checkboxes-->


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


<script type="text/javascript">
        $(document).ready(function(){

        var date = new Date();

        $('.input-daterange').datepicker({
        todayBtn: 'linked',
        format: 'yyyy-mm-dd',
        autoclose: true
        });

        var _token = $('input[name="_token"]').val();

        fetch_data();

        function fetch_data(from_date = '', to_date = '')
        {
        $.ajax({
        url:"{{ route('after_login.incoming-messages') }}",
        method:"POST",
        data:{from_date:from_date, to_date:to_date, _token:_token},
        dataType:"json",
        success:function(data)
        {
            var output = '';
            $('#total_records').text(data.length);
            for(var count = 0; count < data.length; count++)
            {
            output += '<tr>';
            output += '<td>' + data[count].id + '</td>';
            output += '<td>' + data[count].message + '</td>';
            output += '<td>' + data[count].cateory + '</td>';
            output += '<td>' + data[count].date + '</td></tr>';
            }
            $('tbody').html(output);
        }
        })
        }

        $('#filter').click(function(){
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        if(from_date != '' &&  to_date != '')
        {
        fetch_data(from_date, to_date);
        }
        else
        {
        alert('Both Date is required');
        }
        });

        $('#refresh').click(function(){
        $('#from_date').val('');
        $('#to_date').val('');
        fetch_data();
        });


        });
</script>


