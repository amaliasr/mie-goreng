<footer class="mastfoot mt-auto color-footer">
   <div class="container">
      <div class="row">
      <div class="col-6 col-md-4">
        <?php foreach ($konten_detail as $row) { if($row->id_konten == 3){ ?>
          <a class="" href="<?=base_url()?>"><img src="<?=base_url()?>assets/img/konten/<?=$row->isi ?>" class="img-responsive mr-3" alt="Image" style="width: 100%"></a>
          <?php }} ?>
          <?php foreach ($konten_detail as $row) { if($row->id_konten == 2){ ?>
          <p class="mt-4"><?=$row->isi ?></p>
          <?php }} ?>
      </div>
      <div class="col-6 col-md-2">
        <h5 class="mb-4 text-oswald txt-orange">Social Media</h5>
        <nav class="nav flex-column">
          <?php foreach ($sosmed as $row){ ?>
          <a class="nav-link" href="<?=$row->isi ?>" style="color: white" target="_blank"><i class="<?=$row->icon ?>"></i> <?=$row->nama_konten ?></a>
          <?php } ?>
        </nav>
      </div>
      <div class="col-6 col-md-2">
        <h5 class="mb-4 text-oswald txt-orange">Quick Link</h5>
        <?php foreach ($game_asc as $key) { ?>
          <?php if($key->status == "on"){ ?>
            <a href="<?=site_url($key->link)?>"><p><?=$key->nama_game ?></p></a>
          <?php }else{ ?>
            <p style="color: grey;"><?=$key->nama_game ?> (Soon)</p>
          <?php } ?>
        <?php } ?>
      </div>
<!--       <div class="col-6 col-md-4">
        <h5 class="mb-4 text-oswald txt-orange">Contact Us</h5>
        <input type="text" name="email" class="form-control mb-2" value="" required="required" placeholder="Email" style="background-color: transparent;">
        <textarea name="pesan" class="form-control mb-2" rows="3" required="required" style="background-color: transparent;" placeholder="Pesan"></textarea>
        <button type="submit" class="btn btn-primary" style="width: 100%">Kirim</button>
      </div> -->
      <div class="col-12 col-md-12 mt-5" style="text-align: center;">
        © www.ADWGAMINGSTORE.com<br>
      </div>
    </div>
   </div>
</footer>