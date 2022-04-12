<?php foreach ($game_asc as $key) {
    if ($key->status != "disable") { ?>
        <div class="col-6 col-md-4 mb-4">
            <?php if ($key->status == "on") { ?>
                <?php if (empty($detail[$key->id_game])) { ?>
                    <a href="<?= site_url('top_up/' . $key->link) ?>">
                    <?php } else { ?>
                        <a href="<?= site_url($key->link) ?>">
                        <?php } ?>

                    <?php } ?>
                    <div class="card text-white border-0 hover-item">
                        <img class="card-img imgshape-list" src="<?= base_url() ?>assets/img/game/<?= $key->image ?>" alt="Card image">
                        <div class="overlay-list">
                            <!-- <h4 class="text-oswald text-center">Mobile Legend</h4> -->
                        </div>
                        <div class="card-img-overlay d-flex align-items-end">
                            <?php if ($key->status == "on") { ?>
                                <h5 class="card-title"><?= $key->nama_game ?></h5>
                            <?php } else { ?>
                                <h5 class="card-title" style="color: grey;"><?= $key->nama_game ?> (Soon)</h5>
                            <?php } ?>
                        </div>
                    </div>
                    <?php if ($key->status == "on") { ?>
                        </a>
                    <?php } ?>
        </div>
<?php }
} ?>