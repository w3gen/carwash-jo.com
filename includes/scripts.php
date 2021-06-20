	<!--   Core JS Files   -->
	<script src="./assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="./assets/js/core/popper.min.js"></script>
	<script src="./assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="./assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="./assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="./assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="./assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="./assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="./assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="./assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="./assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="./assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="./assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="./assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="./assets/js/atlantis.min.js"></script>
	
	<script>
	    function isDay() {
          const hours = (new Date()).getHours();
          return (hours >= 9 && hours < 15);
        }
        if(!isDay()){
            document.getElementsByTagName("body")[0].setAttribute("data-background-color", "dark");
        }
	</script>
	
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
    
	<script>
        function loadNews(){
            var id = 1;
            $('#new_ticker').html('<div><li><span>Loading....</span></li></div>');
            $.ajax({
              url: "includes/newTicker.php"
            }).done(function(data) {
              $('#new_ticker').html(data); 
            });
        }
        
        loadNews(); 
        setInterval(function(){
            loadNews();
        }, 600000);
    </script>
    
    <script src="./assets/js/ticker.js"></script>