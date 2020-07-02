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
                    <li class="active">Ubah Driver</li>
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
                        <strong class="card-title">Ubah Driver Transaksi</strong>
                    </div>
                    <div class="card-body">
					<div style="margin-left: 50px; margin-right: 50px;">
						<?php foreach ($transaksi as $key) { ?>
							Transaksi dengan id <?php echo $key["id_user"]?>, Memesan pada tanggal <?php echo date('d-M-Y', strtotime($key['startTime']))?> dan Kembali pada Tanggal <?php echo date('d-M-Y', strtotime($key['endTime'])); ?><br><br>
						<?php } ?>

						<?php foreach ($user as $key) { ?>
							Transaksi Dilakukan atas nama <?php echo $key["nama"]?>, dengan user id <?php echo $key['id']?>.<br><br>
						<?php } ?>

						<?php foreach ($selectedDriver as $key) { ?>
							Transaksi Dilakukan oleh Driver atas nama <?php echo $key['nama'];?>, dengan Driver id <?php echo $key['id_driver']?>.<br><br>
						<?php } ?>

						<?php echo form_open('admin/Transaksi/ubahDriverKeTransaksi');?>
						<legend><i><b><h2>Silahkan Pilih Driver: </h2></b></i></legend>
						
						<?php foreach ($transaksi as $key) { ?>
						<input type="hidden" name="idTransaksi" value="<?php echo $key['id_transaksi']?>">
						<?php } ?>
						<?php foreach ($selectedDriver as $key) { ?>
						<input type="hidden" name="selectedDriverId" value="<?php echo $key['id_driver']?>">
						<?php } ?>

						<label>Pilih Driver</label>
						<select name="newDriverId">
							<?php foreach ($driver as $key) { ?>
							<option value="<?php echo $key['id_driver']?>">id: <?php echo $key['id_driver']?> - <?php echo $key['nama'];?></option>
							<?php } ?>
						</select><br><br>

						<button type="submit" class="btn btn-primary">Ubah Driver</button><br><br>
						<?php form_close();?>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
