        <!-- DATA TIKET -->
        <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
        <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_tiket"><i class="fas fa-plus fa-sm"></i>
        Tambah Tiket</button>

<table class="table table-bordered">
  <tr>
  <th>No.</th>
<th>Nama Tiket</th>
<th>Harga</th>
<th>Stok</th>
<th colspan="2">Aksi</th>
<th>Gambar</th>
      </tr>
  <!--memasukkan data di database kedalam halaman data tiket-->
  <?php
  $no = 1;
  foreach($tiket as $tkt) : ?>
  <tr>
    <td><? echo $no++ ?></td>
    <td><?php echo $tkt->nama_tkt ?></td>
    <td>Rp<?php echo $tkt->harga ?></td>
    <td><?php echo $tkt->stok ?></td> 
      <td><?= anchor('Admin/edit/' .$tkt->no, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
      <td><?= anchor('Admin/hapus/' .$tkt->no, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td>
      <td><?php echo $tkt->gambar ?></td>
      </tr>
  <?php endforeach; ?>
      </table>
<!--modal tambah tiket-->
<div class="modal fade" id="tambah_tiket" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Input Tiket</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url(). 'Admin/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
        <div class="div form-group">
        <label>
        Nama tiket </label>
        <input type="text" name="nama_tkt" class="form-control">
        </div>
        <div class="div form-group">
        <label>
        Harga </label>
        <input type="text" name="harga" class="form-control">
        </div>
        <div class="div form-group">
        <label>
        Stok </label>
        <input type="text" name="stok" class="form-control">
        </div>
        <div class="div form-group">
        <label>
        Aksi </label>
        <input type="text" name="aksi" class="form-control">
        </div>
        <div class="div form-group">
        <label>
        Gambar </label>
        <input type="file" name="gambar" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>



        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

     