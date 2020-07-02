
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
							<th>Id Saldo</th>
							<th>Nama User</th>
							<th>Saldo</th>
							<th>Rekening</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($saldo as $key) {?>
						<tr>				
							<td><?php echo $key['idSaldo']; ?></td>
							<td><?php echo $key['nama']; ?></td>
							<td><?php echo $key['saldoEpay']; ?></td>
							<td><?php echo $key['rekening']; ?></td>
							<td><?php echo $key['status']; ?></td>
							<td>
								<?php if ($key['status']!='sudah dikonfirmasi') { ?>
									<a href="<?php echo base_url() ?>admin/Saldo/update/<?php echo $key['idSaldo'] ?>/<?php echo $key['id_user'] ?>/<?php echo $key['saldoEpay']; ?>" class="btn btn-primary">Konfirmasi</a>
								<?php } ?>
								<a href="<?php echo base_url() ?>admin/Saldo/updateTolak/<?php echo $key['idSaldo'] ?>/<?php echo $key['id_user'] ?>" class="btn btn-danger">Tolak</a>
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