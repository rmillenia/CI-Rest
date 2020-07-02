<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<!-- OVERVIEW -->
			<div class="panel panel-headline">
				<h1 class="text-center">Riwayat Transaksi</h1>
				<table class="table table-striped table-bordered data">
					<thead>
						<tr>			
							<th>ID</th>
							<th>Nama Driver</th>
							<th>Jam</th>
							<th>Lokasi Jemput</th>
							<th>Lokasi Tujuan</th>
							<th>Total Harga</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($trans as $key) {?>
						<tr>				
							<td><?php echo $key['id_transaksi']; ?> </td>
							<td><?php echo $key['nama']; ?></td>
							<td><?php echo $key['startTime']; ?></td>
							<td><?php echo $key['lokasi_jemput']; ?></td>
							<td><?php echo $key['tujuan']; ?></td>
							<td>Rp <?php echo $key['totalHarga']; ?></td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
			</body>
			<script type="text/javascript">
				$(document).ready(function(){
					$('.data').DataTable();
				});
			</script>
			</html>