<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<!-- OVERVIEW -->
			<div class="panel panel-headline">
				<?php
	echo validation_errors('<div class = "alert alert-danger">', '</div>');
	echo form_open_multipart('transaksi/addTransaksi', array('class' => 'needs_validation' , 'novalidate' => '' )); ?>
	<center><legend>Tambah Transaksi Baru</legend></center>
	<tbody>

		<div class="form-group">
			<label>Tanggal dan Waktu Sewa </label>
			<input type="datetime-local" class="form-control" name="startTime" value="<?php echo set_value('startTime');?>" onclick="getdate()">
		</div>

		<div class="form-group">
			<label>Tanggal dan Waktu Berakhir Sewa </label>
			<input type="datetime-local" class="form-control" name="endTime" value="<?php echo set_value('endTime');?>" onclick="getdate()">
		</div>

		<div class="form-group">
			<label>Paket</label><br>
			<select name="paket">
				<?php foreach ($daftarHarga as $harga) { ?>
					<option value="<?php echo $harga->id_harga; ?>"><?php echo $harga->waktu_jam;?></option>
				<?php } ?>
			</select>
		</div>

		<div class="form-group">
			<label>Denda</label><br>
			<input type="text" class="form-control" name="denda" value="<?php echo set_value('denda');?>">
		</div>

		<div class="form-group">
			<label>Lokasi Jemput</label><br>
			<input type="text" class="form-control" name="lokasi_jemput" value="<?php echo set_value('lokasi_jemput');?>">
		</div>
		
		<button type="submit" class="btn btn-primary">Buat Transaksi</button>
</tbody>
</div>
<?php echo form_close();?>
</div>
</div>
</div>