<div class="container">
  <nav class="navbar navbar-expand-lg" style="z-index: 8">
    <?php foreach ($konten_detail as $row) {
      if ($row->id_konten == 3) { ?>
        <a class="navbar-brand" href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/img/konten/<?= $row->isi ?>" class="img-responsive mr-3" alt="Image" style="width: 150px"></a>
    <?php }
    } ?>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="border-color: white;border-width: 3px">
      <i class="fa fa-bars" style="color: white"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <?php foreach ($menu as $key) {
          if ($key->id_actor == 2) { ?>
            <li class="nav-item">
              <a class="p-2 nav-link white " href="<?= base_url() ?><?= $key->link ?>">
                <h6><?= $key->nama_menu ?></h6>
              </a>
            </li>
        <?php }
        } ?>
      </ul>
      <span class="navbar-text">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item mr-3 ml-3"><a class="text-white" href="#">Home</a></li>
          <li class="nav-item mr-3 ml-3"><a class="text-white" href="#">Buy</a></li>
          <li class="nav-item mr-3 ml-3"><a class="text-white" href="#">My Order</a></li>
        </ul>
        <!-- <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Menu List Game
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php foreach ($game_asc as $key) { ?>
              <a class="dropdown-item <?php if ($key->status != 'on') {
                                        echo 'disabled';
                                      } ?>" href="<?= site_url($key->link) ?>" ><?= $key->nama_game ?></a>
              <?php } ?>
            </div>
          </li>
        </ul> -->
        <!-- <form class="form-inline my-2 my-lg-0" action="" method="POST" role="form" enctype="multipart/form-data">
            <input class="form-control mr-sm-2 mr-1" type="search" placeholder="Search" aria-label="Search" style="width: auto;border-color: #5f6769" name="search">
            <button class="btn btn-dark my-2 my-sm-0" type="button"><i class="fa fa-search"></i></button>
        </form> -->
        <!-- <a class="p-2 nav-link white " href="<?= base_url() ?>logout"><h6><i class="fa fa-sign-out"></i> Log Out</h6></a> -->
      </span>
    </div>
  </nav>
</div>