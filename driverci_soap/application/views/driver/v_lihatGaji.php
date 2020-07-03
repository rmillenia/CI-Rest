<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<!-- OVERVIEW -->
			<div class="panel panel-headline">
				<h1 class="text-center">Riwayat Gaji</h1>
		<br>
		<br>
		<center><h2><b>Gaji Bulan ini : </b><?php foreach ($gajiNow as $key) { echo $key['gaji']; } ?>  </h2></center>
		<center><h2><b>Status : </b><?php foreach ($gajiNow as $key) { echo $key['status'];} ?>  </h2></center>
				<table class="table table-striped table-bordered data">
					<thead>
						<tr>			
							<th>No.</th>
							<th>Gaji</th>
							<th>Tanggal Gajian</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>

						<?php $no = 1;
						foreach ($gaji as $key) {?>
						<tr>				
							<td><?php echo $no++;?></td>
							<td><?php echo $key['gaji']; ?></td>
							<td><?php echo $key['tgl_gajian']; ?></td>
							<td><?php echo $key['status']; ?></td>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</body>
			<script type="text/javascript">
				$(document).ready(function(){
					$('.data').DataTable();
				});
			</script>
			</html>