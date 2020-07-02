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
                        <strong class="card-title">Data <?php echo $level ?></strong>
                    </div>
                    <div class="card-body">
                    <a href="<?php echo base_url("Admin/".$level."/insert") ?>" class="btn btn-sm btn-primary mb-3 ml-3">Tambah</a>
                    <div class="table-responsive">
                      <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data as $value): ?>
                          <tr>
                            <td><?php echo $value->nik ?></td>
                            <td><?php echo $value->nama ?></td>
                            <td><?php echo $value->noHp ?></td>
                            <td><?php echo $value->email ?></td>
                            <td><?php echo $value->username ?></td>
                            <td>
                                <a href="<?php echo base_url("Admin/".$level."/update/".$value->id) ?>" class="btn btn-sm btn-success">Edit</a>
                                <a href="<?php echo base_url("Admin/".$level."/delete/".$value->id) ?>" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach ?>

                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>


</div>
</div><!-- .animated -->
</div><!-- .content -->




<?php $this->load->view('admin/footer'); ?>