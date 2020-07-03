<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<!-- OVERVIEW -->
			<div class="panel panel-headline container">
					<legend><i><b><h1>UBAH DRIVER TRANSAKSI</h1></b></i></legend>
					<div style="margin-left: 50px; margin-right: 50px;">
						<!-- <?php //foreach ($transaksi as $value): ?> -->
							Transaksi dengan id <?php echo $transaksi->id_user;?>, Memesan pada tanggal <?php echo date('d-M-Y', strtotime($transaksi->startTime))?> dan Kembali pada Tanggal <?php echo date('d-M-Y', strtotime($transaksi->endTime)); ?><br><br>
						<!-- <?php //endforeach ?> -->

						<!-- <?php //foreach ($user as $key) { ?> -->
							Transaksi Dilakukan atas nama <?php echo $user->nama?>, dengan user id <?php echo $user->id?>.<br><br>
						<!-- <?php// } ?> -->

						<!-- <?php //foreach ($selectedDriver as $key) { ?> -->
							Transaksi Dilakukan oleh Driver atas nama <?php echo $selectedDriver->nama?>, dengan Driver id <?php echo $selectedDriver->id_driver?>.<br><br>
						<!-- <?php //} ?> -->

						<?php echo form_open('Transaksi/ubahDriverKeTransaksi');?>
						<legend><i><b><h2>Silahkan Pilih Driver: </h2></b></i></legend>
						
						<!-- <?php //foreach ($transaksi as $key) { ?> -->
						<input type="hidden" name="idTransaksi" value="<?php echo $transaksi->id_transaksi?>">
						<!-- <?php // } ?> -->

						<?php foreach ($selectedDriver as $key) { ?>
						<input type="hidden" name="selectedDriverId" value="<?php echo $transaksi->id_driver?>">
						<?php } ?>

						<label>Pilih Driver</label>
						<select name="newDriverId">
							<?php foreach ($driver as $key) { ?>
							<option value="<?php echo $key->id_driver;?>">id: <?php echo $key->id_driver;?> - <?php echo $key->nama;?></option>
							<?php } ?>
						</select><br><br>

						<button type="submit" class="btn btn-primary">Ubah Driver</button><br><br>
						<?php form_close();?>
				</div>
			</div>
		</div>
	</div>