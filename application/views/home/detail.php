<?php $this->load->view('home/head'); ?>

<body>
  <header class="bg-header">
    <?php $this->load->view('home/navbar'); ?>
  </header>
  <?php foreach ($konten_detail as $row) {
    if ($row->id_konten == 4) { ?>
      <div class="bg-list">
        <!-- <img src="<?= base_url() ?>assets/img/konten/<?= $row->isi ?>" style="width: 100%"> -->
      </div>
  <?php }
  } ?>
  <div class="bg-list">
    <div class="container pt-4 pb-5 ">
      <h1 class="text-oswald txt-orange text-center"><?= $nama_game ?></h1>
      <hr style="background-color: white;width: 30%" class="mb-5">

      <div class="row justify-content-md-center">

        <div class="col-12 col-md-4 mb-3">
          <img src="<?= base_url() ?>assets/img/game/<?= $image_info ?>" style="width: 100%" class='mb-2 imgdetail'>
          <div class="text-dark"><?= $text_info ?></div>
        </div>
        <div class="col-12 col-md-8">
          <div class="pt-4 pb-4 pr-4 pl-4">
            <form action="<?= site_url('review/' . $code_transaction) ?>" method="POST" role="form" enctype="multipart/form-data">
              <!-- step -->
              <div class="step">
                <div>
                  <div class="circle">1</div>
                </div>
                <div>
                  <div class="title mb-3 text-dark">Masukkan ID</div>
                  <div class="row">
                    <?php foreach ($input as $row) {
                      if (!empty($inputan[$row->id_input])) { ?>
                        <div class="col-6 col-md-6 my-1">
                          <input type="<?= $row->type ?>" id="<?= $row->variable_input ?>" class="form-control form-width mb-2" placeholder="<?= $inputan[$row->id_input] ?>" name="<?= $row->variable_input ?>" value="<?= $this->session->userdata($row->variable_input) ?>" required>
                          <small id="<?= $row->variable_input ?>-txt" class="form-text text-danger text-dark"></small>

                        </div>
                    <?php }
                    } ?>
                    <div class="col-12 col-md-2 align-self-center">
                      <?php foreach ($hint_id as $row) { ?>
                        <a href="" data-toggle="modal" data-target="#modalhint"><i class="fa fa-question bg-unicorn" style="color: white;height: 30px;width: 30px;border-radius: 30px;text-align: center;font-size: 30px;"></i></a>
                        <!-- Modal -->
                        <div class="modal fade" id="modalhint" tabindex="-1" role="dialog" aria-labelledby="exampleModalhint" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-body">
                                <img src="<?= base_url() ?>assets/img/hint/<?= $row->image ?>" class="img-responsive mb-2" style="width: 100%;">
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php } ?>
                    </div>
                  </div>
                  <input type="hidden" name="available" value="<?= $available ?>">
                  <!-- <p>Name in Game : <b class="text-warning" id="name_in_game">-</b> -->
                  <div class="spinner-border" id="spinner"></div>
                  </p>
                  <?php foreach ($hint_id as $row) { ?>
                    <small class="text-dark">Hint : <?= $row->isi_hint ?></small>
                  <?php } ?>
                </div>
              </div>
              <div class="step">
                <div>
                  <div class="circle">2</div>
                </div>
                <div>
                  <div class="title mb-3 text-dark">Pilih Item</div>
                  <div class="row">
                    <?php if ($available == 'game') { ?>
                      <input type="hidden" name="id_game" value="<?= $id_game ?>">
                      <?php foreach ($item_price_id as $row) {
                        if ($row->visible == "") { ?>
                          <div class="col-4 col-md-4">
                            <input class="checkbox-tools" type="radio" name="id_item_price" id="tool-<?= $row->id_item_price ?>" value="<?= $row->id_item_price ?>" required <?php if ($row->id_item_price == $this->session->userdata('id_item_price')) {
                                                                                                                                                                                echo "checked";
                                                                                                                                                                              } ?>>
                            <label class="for-checkbox-tools" for="tool-<?= $row->id_item_price ?>">
                              <div class="d-flex">
                                <div class="p-2" style="font-size: 12px;vertical-align: middle"><?= $row->qty; ?> <img src="<?= base_url() ?>assets/img/game/<?= $icon ?>" class="img-responsive mb-2" style="width: 20px;"></div>
                              </div>
                            </label>
                          </div>
                      <?php }
                      } ?>
                    <?php } else { ?>
                      <input type="hidden" name="id_game" value="<?= $id_game ?>">
                      <input type="hidden" name="id_game_detail" value="<?= $id_game_detail ?>">
                      <?php foreach ($item_price_id_detail as $row) {
                        if ($row->visible == "") { ?>
                          <div class="col-4 col-md-4">
                            <input class="checkbox-tools" type="radio" name="id_item_price" id="tooldetail-<?= $row->id_item_price_detail ?>" value="<?= $row->id_item_price_detail ?>" required <?php if ($row->id_item_price_detail == $this->session->userdata('id_item_price')) {
                                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                                  } ?>>
                            <label class="for-checkbox-tools" for="tooldetail-<?= $row->id_item_price_detail ?>">
                              <div class="d-flex">
                                <div class="p-2" style="font-size: 12px;vertical-align: middle"><?= $row->qty; ?> <img src="<?= base_url() ?>assets/img/game/<?= $icon ?>" class="img-responsive mb-2" style="width: 20px;"></div>
                              </div>
                            </label>
                          </div>
                      <?php }
                      } ?>
                    <?php } ?>

                  </div>
                </div>
              </div>
              <div class="step">
                <div>
                  <div class="circle">3</div>
                </div>
                <div>
                  <div class="title mb-3 text-dark">Pilih Pembayaran</div>
                  <!-- <div class="row"> -->

                  <div class="row">
                    <?php foreach ($payment_asc as $row) {
                      if ($row->visible_pay == "") { ?>
                        <!-- <div class="col-12 col-md-12"> -->
                        <div class="col-12 col-md-6">
                          <input class="checkbox-tools" type="radio" name="id_payment" id="bayar-<?= $row->id_payment ?>" value="<?= $row->id_payment ?>" required>
                          <label class="for-checkbox-tools" for="bayar-<?= $row->id_payment ?>">
                            <div class="d-flex">
                              <div class="p-2"><img src="<?= base_url() ?>assets/img/payment/<?= $row->image ?>" style="height: 30px;"></div>
                              <div class="ml-auto p-2" id="showtext<?= $row->id_payment ?>">Rp. 0</div>
                            </div>
                          </label>
                        </div>
                        <!-- </div> -->
                    <?php }
                    } ?>
                  </div>

                  <!-- </div> -->
                </div>
              </div>
              <!-- step -->
              <button type="submit" class="btn btn-primary mt-5" name="payment" style="height: 50px;width: 100%;background-color: #222831;color: white;border-color: white;">Next to Payment ></button>
            </form>
          </div>

        </div>

      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="callbackUser" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog bg-dark" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Perhatian</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div id="bodyCallUser" class="modal-body">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <?php $this->load->view('home/footer'); ?>
  <?php $this->load->view('home/js'); ?>
  <script type="text/javascript">
    <?php if ($available == 'game') { ?>
      <?php foreach ($item_price_id as $key) { ?>
        $('#tool-<?= $key->id_item_price ?>').click(function() {

          <?php
          foreach ($item_price as $row) {
            if ($row->qty == $key->qty and $row->id_game == $id_game and $row->visible == "") {
              $pay[$row->kategori] = $row->price;
            }
          }
          ?>
          <?php foreach ($payment_asc as $row) {
            if (!empty($pay[$row->kategori]) and $row->visible_pay == "") { ?>
              $('#showtext<?= $row->id_payment ?>').text('Rp. <?= number_format($pay[$row->kategori]) ?>');
            <?php } else if (empty($pay[$row->kategori])) { ?>
              $('#showtext<?= $row->id_payment ?>').text('-');
          <?php }
          } ?>
        });
      <?php } ?>
    <?php } else { ?>
      <?php foreach ($item_price_id_detail as $key) { ?>
        $('#tooldetail-<?= $key->id_item_price_detail ?>').click(function() {
          <?php
          foreach ($item_price_detail as $row) {
            if ($row->qty == $key->qty and $row->id_game_detail == $id_game_detail and $row->visible == "") {
              $pay[$row->kategori] = $row->price;
            }
          }
          ?>
          <?php foreach ($payment_asc as $row) {
            if (!empty($pay[$row->kategori]) and $row->visible_pay == "") { ?>
              $('#showtext<?= $row->id_payment ?>').text('Rp. <?= number_format($pay[$row->kategori]) ?>');
            <?php } else if (empty($pay[$row->kategori])) { ?>
              $('#showtext<?= $row->id_payment ?>').text('-');
          <?php }
          } ?>
        });
      <?php } ?>
    <?php } ?>
  </script>
  <script type="text/javascript">
    $(document).ready(() => {
      $('#spinner').hide();
      const userIDElement = document.getElementById("user_id");
      const zoneIDElement = document.getElementById("zone_id");
      const namaIDElement = document.getElementById("nama_di_game");
      const txtUserIDEl = document.getElementById('user_id-txt');
      const txtZoneIDEl = document.getElementById('zone_id-txt');

      const handlerElement = (event, id) => {
        namaIDElement.value = null;
        document.getElementById('nama_di_game-txt').innerHTML = null;
        const val = event.target.value;
        if (!checkCond(val, id)) {
          if (id == 'user_id') {
            txtUserIDEl.innerHTML = "Pastikan user id yang anda masukkan sudah sesuai";
          } else if (id == 'zone_id') {
            txtZoneIDEl.innerHTML = "Pastikan zone id yang anda masukkan sudah sesuai";
          }
        } else {
          if (id == 'user_id') {
            txtUserIDEl.innerHTML = null;
          } else if (id == 'zone_id') {
            txtZoneIDEl.innerHTML = null;
          }
        }
      }

      [userIDElement, zoneIDElement].map(element => {
        element.addEventListener("change", (event) => handlerElement(event, element.id));
      });
      $("#user_id, #zone_id").change((event) => {
        const usCont = userIDElement.value;
        const zoCont = zoneIDElement.value;
        if (usCont.length == 0) {
          document.getElementById('user_id-txt').innerHTML = "Pastikan anda memasukkan user id";
        } else if (zoCont.length == 0) {
          document.getElementById('zone_id-txt').innerHTML = "Pastikan anda memasukkan zone id";
        }
        if ((usCont.length >= 8 && usCont.length <= 10) && (zoCont.length >= 4 && zoCont.length <= 6)) {
          getAccountInfo(usCont, zoCont, namaIDElement);
        }
      })

    });
    const checkCond = (value, type) => {
      const valLen = value.length;
      let conX, conY;
      if (type == "user_id") {
        conX = valLen == 9 && valLen != 0;
        conY = valLen >= 1 && valLen <= 7;
      } else if (type == "zone_id") {
        conX = valLen >= 4 && valLen >= 6;
        conY = valLen >= 1 && valLen <= 3;
      }
      if (!conY) {
        return true;
      } else {
        return false;
      }
    }

    const bytesOnConvert = (hex) => {
      hex = hex.match(/[0-9A-Fa-f]*/g).filter(function(el) {
        return el != "";
      });
      var len = hex.length;
      if (len == 0) return;
      var txt = '';
      var encoding = "utf-8";
      hex = hex.map(function(item) {
        return parseInt(item, 16);
      });
      var bytes = new Uint8Array(hex);
      //txt = new TextDecoder(encoding, { NONSTANDARD_allowLegacyEncoding: true }).decode(bytes);
      txt = new TextDecoder(encoding).decode(bytes);
      return txt;
    }
    const getAccountInfo = (userid, zoneid, element) => {
      const name_in_game = document.getElementById("name_in_game");
      element.value = "";
      $.ajax({
        url: "<?= base_url('api/mlaccount/fetch') ?>",
        method: "POST",
        data: {
          user_id: userid,
          zone_id: zoneid
        },
        success: (data) => {
          $('#spinner').show();
          const dataParse = JSON.parse(data);
          const callbackUser = document.getElementById("bodyCallUser");
          callbackUser.innerHTML = null;
          if (dataParse.success) {
            const usernameJson = dataParse.confirmationFields.username;
            element.value = usernameJson.match(/[%]/) ? bytesOnConvert(usernameJson) : usernameJson;
            // name_in_game = html(usernameJson.match(/[%]/) ? bytesOnConvert(usernameJson) : usernameJson);
            $('#name_in_game').html(usernameJson.match(/[%]/) ? bytesOnConvert(usernameJson) : usernameJson);
          } else {
            document.getElementById('nama_di_game-txt').innerHTML = "Akun yang anda cari tidak ditemukan";
            // $("#bodyCallUser").append("<p>Akun yang anda cari tidak ditemukan. Pastikan user id dan zone id sesuai dengan account mobile legend anda.</p>");
            callbackUser.innerHTML = "<p>Akun yang anda cari tidak ditemukan. Pastikan user id dan zone id sesuai dengan account mobile legend anda.</p>";
            $("#callbackUser").modal('toggle');
          }
        }
      });
    }
  </script>
</body>