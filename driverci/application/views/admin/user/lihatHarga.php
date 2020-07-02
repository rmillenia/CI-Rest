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
                        <strong class="card-title">Data Harga</strong>
                    </div>
                    <div class="card-body">
                    <a href="<?php echo base_url("Admin/Harga/insert") ?>" class="btn btn-sm btn-primary mb-3 ml-3">Tambah</a>
                    <div class="table-responsive">
                      <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Harga</th>
                            <th>Wilayah</th>
                            <th>Jam</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data as $value): ?>
                          <tr>
                            <td><?php echo $value->idHarga ?></td>
                            <td><?php echo $value->harga ?></td>
                            <td><?php echo $value->wilayah ?></td>
                            <td><?php echo $value->jam ?></td>
                            <td>
                                <a href="<?php echo base_url("Admin/Harga/update/".$value->idHarga) ?>" class="btn btn-sm btn-success">Edit</a>
                                <a href="<?php echo base_url("Admin/Harga/delete/".$value->idHarga) ?>" class="btn btn-sm btn-danger">Hapus</a>
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