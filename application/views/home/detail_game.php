<?php $this->load->view('home/head'); ?>

<body>
  <header class="bg-header">
    <?php $this->load->view('home/navbar'); ?>
  </header>
  <?php foreach ($konten_detail as $row) {
    if ($row->id_konten == 4) { ?>
      <div class="bg-list">
        <img src="<?= base_url() ?>assets/img/konten/<?= $row->isi ?>" style="width: 100%">
      </div>
  <?php }
  } ?>
  <div class="bg-list">
    <div class="container pt-5 pb-5 ">
      <h1 class="text-oswald txt-orange text-center"><?= $nama_game ?></h1>

      <h4 class="text-center text-white">Pilih Paket yang Anda Inginkan</h4>
      <hr style="background-color: white;width: 30%" class="mb-5">
      <div class="row justify-content-md-center">
        <?php foreach ($game_detail_asc as $key) {
          if ($key->status_detail != "disable" and $key->id_game == $id_game) { ?>
            <div class="col-6 col-md-3 mb-4">
              <?php if ($key->status_detail == "on") { ?>
                <a href="<?= site_url('top_up/' . $key->link_detail) ?>">
                <?php } ?>
                <div class="card text-white border-0 hover-item">
                  <img class="card-img imgshape-list" src="<?= base_url() ?>assets/img/game/<?= $key->image_detail ?>" alt="Card image">
                  <div class="overlay-list">
                    <!-- <h4 class="text-oswald text-center">Mobile Legend</h4> -->
                  </div>
                  <div class="card-img-overlay d-flex align-items-end">
                    <?php if ($key->status_detail == "on") { ?>
                      <div class="card-title">
                        <h5 class="mb-0"><?= $key->nama_game_detail ?></h5>
                        <small class="card-text mb-0"><?= $key->process ?></small>
                      </div>

                    <?php } else { ?>
                      <h5 class="card-title" style="color: grey;"><?= $key->nama_game_detail ?> (Soon)</h5>
                    <?php } ?>
                  </div>
                </div>
                <?php if ($key->status_detail == "on") { ?>
                </a>
              <?php } ?>
            </div>
        <?php }
        } ?>
      </div>
    </div>
  </div>
  <?php $this->load->view('home/footer'); ?>
</body>
<?php $this->load->view('home/js'); ?>