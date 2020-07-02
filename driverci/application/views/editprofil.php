<style>
.user-row {
    margin-bottom: 14px;
}

.user-row:last-child {
    margin-bottom: 0;
}

.dropdown-user {
    margin: 13px 0;
    padding: 5px;
    height: 100%;
}

.dropdown-user:hover {
    cursor: pointer;
}

.table-user-information > tbody > tr {
    border-top: 1px solid rgb(221, 221, 221);
}

.table-user-information > tbody > tr:first-child {
    border-top: 0;
}


.table-user-information > tbody > tr > td {
    border-top: 0;
}
.toppad
{margin-top:20px;
}
</style>

<div class="container">
<br>
<div align="center"><h2>EditProfil</h2></div>
     
    <?php echo form_open_multipart(''); ?>
      <div class="form-group">
      <label>Username:</label>
    <input type="text" class="form-control" name="username" value="<?php echo $getprofil[0]->username; ?>" >
    </div>
    <div class="form-group">
      <label>Nama:</label>
    <input type="text" class="form-control" name="nama" value="<?php echo $getprofil[0]->nama; ?>">
    </div>
         <div class="form-group">
      <label>Tanggal Lahir:</label>
    <input type="date" class="form-control" name="tgl_lahir" value="<?php echo $getprofil[0]->tgl_lahir; ?>">
    </div>
         <div class="form-group">
      <label>Alamat:</label>
    <input type="text" class="form-control" name="alamat" value="<?php echo $getprofil[0]->alamat; ?>">
    </div>
         <div class="form-group">
      <label>NIK:</label>
    <input type="text" class="form-control" name="nik" value="<?php echo $getprofil[0]->NIK; ?>">
    </div>
         <div class="form-group">
      <label>Telepon:</label>
    <input type="text" class="form-control" name="nomorhp" value="<?php echo $getprofil[0]->nomorhp; ?>">
    </div>
         <div class="form-group">
      <label>Jenis Kelamin:</label><br>
    <select name="jenis_kelamin" id="" >

    <?php if($getprofil[0]->jenis_kelamin == "wanita") {?>
      <option value="wanita">wanita</option><option value="pria">pria</option></select>
    <?php }else {?><option value="pria">pria</option><option value="wanita">wanita</option></select>
    <?php } ?>
    </div>

        <div class="form-group">
      <label>Foto:</label><br>
   <input type="file"  name="foto" value="<?php echo $getprofil[0]->foto; ?>">
    </div>
                    
                     
      
                
    <input type="submit" class="btn btn-primary" value="edit" >
      <?php form_close(); ?>
    </div>
<!-- <div class="container"> -->
<!-- <div align="center"><h2>Edit Password</h2></div>

                      <?php /*echo form_open('')*/; ?>
 <div class="form-group">
      <label>Password Baru:</label><br>
   <input type="password"  name="password" value="">
    </div>
 <input type="submit" class="btn btn-primary" value="edit" >
                  <?php /*form_close()*/; ?> -->


		