<div class="row">
						<div class="col-12 col-lg-12 col-xxl-12 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0" id="lastupdate"></h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>Vehicle</th>
											<th class="d-none d-xl-table-cell">Started</th>
											<th class="d-none d-xl-table-cell">Estimation</th>
											<th>Status</th>
											<th class="d-none d-md-table-cell">Owner</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Honda i8 Classic</td>
											<td class="d-none d-xl-table-cell">10 Minutes ago</td>
											<td class="d-none d-xl-table-cell">1 Hour</td>
											<td><span class="badge badge-success">Done</span></td>
											<td class="d-none d-md-table-cell">Vanessa Tucker</td>
										</tr>
										<tr>
											<td>Honda i8 Lite</td>
											<td class="d-none d-xl-table-cell">10 Minutes ago</td>
											<td class="d-none d-xl-table-cell">1 Hour</td>
											<td><span class="badge badge-danger">Cancelled</span></td>
											<td class="d-none d-md-table-cell">William Harris</td>
										</tr>
										<tr>
											<td>Honda i8 Classic</td>
											<td class="d-none d-xl-table-cell">10 Minutes ago</td>
											<td class="d-none d-xl-table-cell">1 Hour</td>
											<td><span class="badge badge-success">Done</span></td>
											<td class="d-none d-md-table-cell">Sharon Lessman</td>
										</tr>
										<tr>
											<td>Honda i8 Classic</td>
											<td class="d-none d-xl-table-cell">10 Minutes ago</td>
											<td class="d-none d-xl-table-cell">1 Hour</td>
											<td><span class="badge badge-warning">In progress</span></td>
											<td class="d-none d-md-table-cell">Vanessa Tucker</td>
										</tr>
										<tr>
											<td>Honda civic</td>
											<td class="d-none d-xl-table-cell">10 Minutes ago</td>
											<td class="d-none d-xl-table-cell">1 Hour</td>
											<td><span class="badge badge-success">Done</span></td>
											<td class="d-none d-md-table-cell">William Harris</td>
										</tr>
										<tr>
											<td>KWID</td>
											<td class="d-none d-xl-table-cell">10 Minutes ago</td>
											<td class="d-none d-xl-table-cell">1 Hour</td>
											<td><span class="badge badge-success">Done</span></td>
											<td class="d-none d-md-table-cell">Sharon Lessman</td>
										</tr>
										<tr>
											<td>Susuki Selerio</td>
											<td class="d-none d-xl-table-cell">10 Minutes ago</td>
											<td class="d-none d-xl-table-cell">1 Hour</td>
											<td><span class="badge badge-success">Done</span></td>
											<td class="d-none d-md-table-cell">Christina Mason</td>
										</tr>
										<tr>
											<td>Nissan</td>
											<td class="d-none d-xl-table-cell">10 Minutes ago</td>
											<td class="d-none d-xl-table-cell">1 Hour</td>
											<td><span class="badge badge-warning">In progress</span></td>
											<td class="d-none d-md-table-cell">William Harris</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
<script>
    function formatAMPM(date) {
      var hours = date.getHours();
      var minutes = date.getMinutes();
      var ampm = hours >= 12 ? 'pm' : 'am';
      hours = hours % 12;
      hours = hours ? hours : 12; // the hour '0' should be '12'
      minutes = minutes < 10 ? '0'+minutes : minutes;
      var strTime = hours + ':' + minutes + ' ' + ampm;
      return strTime;
    }
    
    document.getElementById("lastupdate").innerHTML = "Last Update: " + formatAMPM(new Date);
</script>