<div class="container-fluid">
<h3><i class="fas fa-edit">Edit Data Tiket</h3>
<?php foreach($tiket as $tkt) : ?>

<form method="post" action="<?= base_url().'Admin/update' ?>">

<div class="for-group">
<label>Nama Tiket</label>
<input type="text" name="nama_tkt" class="form-control" value="<?= $tkt->nama_tkt ?>">
</div>

<div class="for-group">
<label>Harga</label>
<input type="hidden" name="no" class="form-control" value="<?= $tkt->no ?>">
<input type="text" name="harga" class="form-control" value="<?= $tkt->harga ?>">
</div>

<div class="for-group">
<label>Stok</label>
<input type="text" name="stok" class="form-control" value="<?= $tkt->stok ?>">
</div>

<button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>

</form>
<?php endforeach; ?>
</div>