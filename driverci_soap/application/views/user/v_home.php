<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<!-- OVERVIEW -->
			<div class="panel panel-headline">
				<h1>Hello!</h1>
				<p>Selamat Datang!.</p>
				<br>
			<center><h2>Berikut nama-nama Driver yang telah bekerja sama dengan Kami:</h2><br><br><br>
				<center>
						<?php
						foreach ($records as $key) {?>
							<?php $dirImageDriver = '/foto/';
								$imgName = $key["fotoSim"];
								$imgLoader = $dirImageDriver . $imgName;
								?>
								<img src="<?php echo base_url($imgLoader);?>" style='width:160px; height: 180px'><br>
								<?php echo $key['nama'];?>
						<?php } ?>
				<br><br>
				<?php echo $this->pagination->create_links(); ?>
	        </center></center>
		</div>
	</div>
</div>
</div>
