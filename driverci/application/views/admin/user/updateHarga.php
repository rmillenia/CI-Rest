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
                    <li><a href="#">Table</a></li>
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
                        <strong class="card-title">Edit Data</strong>
                    </div>
                    <div class="card-body">
                        <?php echo form_open(''); ?>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="input-nik" class=" form-control-label">Harga</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="input-nik" name="harga" placeholder="Masukan harga" class="form-control" value="<?php echo $hargalist->harga ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="input-nama" class=" form-control-label">Wilayah</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="input-nama" name="wilayah" placeholder="Masukan Wilayah" class="form-control" value="<?php echo $hargalist->wilayah ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="input-noHp" class=" form-control-label">Jam</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="input-noHp" name="jam" placeholder="Masukan jam" class="form-control" value="<?php echo $hargalist->jam ?>">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="input-submit" class=" form-control-label"></label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="submit" class="btn btn-success" value="Edit">
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