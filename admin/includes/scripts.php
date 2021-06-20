<script src="js/vendor.js"></script>
<script src="js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.min.js" integrity="sha512-VCHVc5miKoln972iJPvkQrUYYq7XpxXzvqNfiul1H4aZDwGBGC0lq373KNleaB2LpnC2a/iNfE5zoRYmB4TRDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    function loadlink(){
        var id = 1;
        $('#dashboard').html('<p class="text-center">Syncning...</p>');
        $.ajax({
          url: "includes/dashboardSync.php"
        }).done(function(data) {
          $('#dashboard').html(data); 
        });
    }
    
    loadlink(); 
    setInterval(function(){
        loadlink();
    }, 60000);
</script>
<script type="text/javascript" src="js/datatables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
        "order": [[ 5, "asc" ]],
        stateSave: true,
        "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "Nothing found - sorry",
            "info": "Showing page _PAGE_ of _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)"
        }
    } );
    } );
</script>	


<script>
    function loadData(id){
        $('#formData').html('<p class="text-center">Loading...</p>');
        $.ajax({
          url: "includes/loadVehicleData.php?info="+ id + ""
        }).done(function(data) {
          $('#formData').html(data); 
        });
    }
</script>