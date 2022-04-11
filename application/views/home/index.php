<?php $this->load->view('home/head'); ?>

<body>
  <header class="bg-header">
    <?php $this->load->view('home/navbar'); ?>
  </header>
  <!-- <div class="container mt-5">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <?php $a = 0;
        foreach ($konten_detail as $row) {
          if ($row->id_konten == 7) { ?>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $a ?>" class="<?php if ($a == 0) {
                                                                                                                    echo 'active';
                                                                                                                  } ?>" aria-label="Slide <?= $a ?>"></button>
        <?php $a++;
          }
        } ?>
      </div>
      <div class="carousel-inner">
        <?php $a = 0;
        foreach ($konten_detail as $row) {
          if ($row->id_konten == 7) { ?>
            <div class="carousel-item <?php if ($a == 0) {
                                        echo 'active';
                                      } ?>">
              <div class="overlay"></div>
              <img class="d-block w-100 imgshape" src="<?= base_url() ?>assets/img/konten/<?= $row->isi ?>" alt="First slide">
            </div>
        <?php $a++;
          }
        } ?>
      </div>
      <div class="sticky_count">
        <h2 class="ml10">
          <span class="text-wrapper">
            <?php foreach ($konten_detail as $row) {
              if ($row->id_konten == 1) { ?>
                <span class="letters text-white">Welcome to <?= $row->isi ?></span>
            <?php }
            } ?>
          </span>
        </h2>
        <div class="font-display" style="background-color: white;">Simple and Easy Way to Buy!</div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div> -->
  <div class="bg-list mb-5">
    <div class="container pt-5 pb-5 text-center">
      <div class="row justify-content-md-center align-items-center">
        <!-- <div class="col-2" style="border-color: black;height:20px;border-width: 1px;">kk</div> -->
        <?php foreach ($game_list as $key) {
          if ($key->status_detail != "disable") { ?>
            <div class="col-6 col-md-3 mt-3">
              <?php if ($key->status_detail == "on") { ?>
                <a href="<?= site_url('top_up/' . $key->link_detail) ?>">
                <?php } else { ?>
                  <a>
                  <?php } ?>
                  <div class="row border border-list mr-2 p-2 mt-2 justify-content-center align-self-center hover-item">
                    <div class="col-4">
                      <img src="<?= base_url() ?>assets/img/game/<?= $key->image_detail ?>" class="imgshape-list" alt="...">
                    </div>
                    <div class="col-8">
                      <p class="figure-caption m-1"><b><?= $key->nama_game ?></b></p>
                      <p class="figure-caption m-1"><?= $key->nama_game_detail ?></p>
                    </div>
                  </div>
                  </a>
            </div>
        <?php }
        } ?>

      </div>
    </div>
  </div>
  <div class="bg-informasi">

  </div>

  <?php $this->load->view('home/footer'); ?>
</body>
<?php $this->load->view('home/js'); ?>