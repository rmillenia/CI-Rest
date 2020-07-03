<?php $this->load->view('admin/header'); ?>


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
                    <li><a href="#"><?php echo $level ?></a></li>
                    <li class="active">Data table</li>
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
                        <strong class="card-title">Tambah Data</strong>
                    </div>
                    <div class="card-body">
                        <?php echo form_open(''); ?>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="input-nik" class=" form-control-label">nik</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="input-nik" name="nik" placeholder="Masukan nik" class="form-control" value="<?php echo set_value("nik") ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="input-nama" class=" form-control-label">nama</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="input-nama" name="nama" placeholder="Masukan nama" class="form-control" value="<?php echo set_value("nama") ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="input-alamat" class=" form-control-label">Alamat</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea name="alamat" id="input-alamat" rows="4" placeholder="Masukan Alamat" class="form-control"><?php echo set_value("alamat") ?></textarea>
                            </div>
                        </div>
                         <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="input-ttl" class=" form-control-label">ttl</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="date" id="input-ttl" name="ttl" placeholder="Masukan ttl" class="form-control" value="<?php echo set_value("ttl") ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="input-noHp" class=" form-control-label">noHp</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="input-noHp" name="noHp" placeholder="Masukan noHp" class="form-control" value="<?php echo set_value("noHp") ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="input-email" class=" form-control-label">Email</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="email" id="input-email" name="email" placeholder="Masukan Email" class="form-control" value="<?php echo set_value("email") ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="input-nama" class=" form-control-label">Username</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="input-username" name="username" placeholder="Masukan Username" class="form-control" value="<?php echo set_value("username") ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="input-password" class=" form-control-label">Password</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="password" id="input-password" name="password" placeholder="Masukan Password" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="input-submit" class=" form-control-label"></label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="submit" class="btn btn-primary">
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->




<?php $this->load->view('admin/footer'); ?>