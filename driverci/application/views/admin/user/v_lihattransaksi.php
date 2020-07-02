
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Transaksi</a></li>
                    <li class="active">Data</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Transaksi</strong>
                    </div>
                    <div class="card-body">
				<div class="table-responsive">
				<table class="table table-striped table-bordered" id="transaksi">
					<thead>
						<tr>			
							<th>Id Transaksi</th>
							<th>Id User</th>
							<th>Id Driver</th>
							<th>Start Time</th>
							<th>End Time</th>
							<th>Total Harga</th>
							<th>Lokasi Jemput</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($datatransaksi as $key) {?>
						<tr>				
							<td><?php echo $key['id_transaksi']; ?></td>
							<td><?php echo $key['id_user']; ?></td>
							<td><?php echo $key['id_driver']; ?></td>
							<td><?php echo $key['startTime']; ?></td>
							<td><?php echo $key['endTime']; ?></td>
							<td><?php echo $key['totalHarga']; ?></td>
							<td><?php echo $key['lokasi_jemput']; ?></td>
							<td><?php echo $key['status']; ?></td>
							<td>
								<?php if ($key['status']!='selesai') { ?>
									<a href="<?php echo base_url() ?>admin/Transaksi/editTransaksi/<?php echo $key['id_transaksi'] ?>" class="btn btn-primary">Selesai</a>
									<?php if ($key['id_driver']!=NULL) {?>
									<a href="<?php echo base_url() ?>admin/Transaksi/keUbahDriverTransaksi/<?php echo $key['id_transaksi'] ?>" class="btn btn-success">Ubah Driver</a>
									<?php } else { ?>
										<a href="<?php echo base_url() ?>admin/Transaksi/keAddDriverTransaksi/<?php echo $key['id_transaksi'] ?>" class="btn btn-warning">Pilih Driver</a>
									<?php } ?>
								<?php } ?>
								<a href="<?php echo base_url() ?>admin/Transaksi/deleteTransaksi/<?php echo $key['id_transaksi'] ?>" class="btn btn-danger">Hapus</a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>

				<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
			    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.0/js/dataTables.buttons.min.js"></script>
			    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.flash.min.js"></script>
			    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.html5.min.js"></script>
			    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.0/js/buttons.print.min.js"></script>
			    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.0/css/buttons.dataTables.min.css"></script>
			    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
			    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
			    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>

				<script type="text/javascript">
				$(document).ready(function(){
					$('#transaksi').DataTable( {
			        dom: 'Bfrtip',
			        buttons: [
			            'copy', 
			            {
							extend: 'pdfHtml5',
							exportOptions: {
							columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8 ]
                			}
            			}
			        ]
			    } );
				});
			</script>
			</div>
		</div>
	</div>
</div>
</body>
</html>