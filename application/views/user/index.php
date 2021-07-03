      <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800 text-center"><?= $title; ?></h1>
          <div class="container-fluid">
         <div class="row text-center">
          <?php foreach($tiket as $tkt)  : ?>

          <div class="card m-auto" style="width: 18rem;">
  <img src="<?= base_url(). '/Wahana1/imgs/' .$tkt->gambar ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title mb-1"><?= $tkt->nama_tkt ?></h5>
    <span class="badge badge-pill badge-success mb-3">Rp. <?= $tkt->harga ?></span>
    <p class="card-text"></p>
    <a href="https:wa.me/085755981854" class="btn-btn-sm btn-primary">Pesan Sekarang</a>
  </div>
</div>

      <?php endforeach; ?>
  
</div>
</div>
 
        