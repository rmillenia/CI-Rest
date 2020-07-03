<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<!-- OVERVIEW -->
			<div class="panel panel-headline">
				<h1 class="text-center">Riwayat Perjalanan</h1>
				<table class="table table-striped table-bordered data">
					<thead>
						<tr>			
							<th>ID</th>
							<th>Driver</th>
							<th>Lokasi Penjemputan</th>
							<th>Review</th>
							<th>Rating</th>
							<th>Tanggal</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($jalan as $key) {?>
						<tr>				
							<td><?php echo $key->id_transaksi; ?></td>
							<td><?php echo $key->nama; ?></td>
							<td><?php echo $key->lokasi_jemput; ?></td>
							<td><?php echo $key->review; ?></td>
							<td> <?php $j =  $key->rating;
								 for ($i = 0; $i < $j; $i++){ ?>
								<i class="fa fa-star" aria-hidden="true"></i>
								<?php }?>
							</td>
							<td><?php echo $key->startTime; ?></td>
								<?php } ?>
						</tr>
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