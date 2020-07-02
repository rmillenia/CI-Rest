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
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $getprofil[0]->nama; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?php echo base_url()?>foto/user/<?php echo $getprofil[0]->foto?>" class="img-circle img-responsive"> </div>
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Username:</td>
                        <td> <?php echo $getprofil[0]->username; ?></td>
                      </tr>
                      <tr>
                        <td>Jenis Kelamin:</td>
                        <td><?php echo $getprofil[0]->jenis_kelamin; ?></td>
                      </tr>
                      <tr>
                        <td>Tanggal Lahir</td>
                        <td><?php echo $getprofil[0]->tgl_lahir; ?></td>
                      </tr>
                   
                         <tr>
                             <tr>
                        <td>Alamat</td>
                        <td><?php echo $getprofil[0]->alamat; ?></td>
                      </tr>
                        <tr>
                        <td>Telepon</td>
                        <td><?php echo $getprofil[0]->nomorhp; ?></td>
                      </tr>
                      <tr>
                        <td>NIK</td>
                        <td><?php echo $getprofil[0]->NIK; ?></td>
                      </tr>     
                           
                      </tr>
                     
                    </tbody>
                  </table>
                
                  <a href="<?php echo site_url()?>user/C_User/editProfil/<?php echo $getprofil[0]->id; ?>" class="btn btn-primary">Edit profil</a>
                </div>
              </div>
            </div>  
          </div>
        </div>
      </div>
    </div>