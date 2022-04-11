 <?php $this->load->view('admin/header'); ?>
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?=$nama_game ?> <img src="<?=base_url()?>assets/img/game/<?=$icon ?>" class="img-responsive mb-2" alt="" style="width: 30px;"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaltambahicon"><i class="fa fa-plus"></i> Icon</button> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaltambahform"><i class="fa fa-list"></i> Form</button> <?php if($status_detail == 'detail'){ ?><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaltambahinfopaket<?=$id_game_detail?>"><i class="fa fa-list"></i> Info Paket</button><?php } ?></h1>

          <!-- Modal info paket -->
          <div class="modal fade" id="modaltambahinfopaket<?=$id_game_detail?>" tabindex="-1" role="dialog" aria-labelledby="exampleinfopake" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Info Paket</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="<?=site_url('minmin/ubah_game_detail_info/'.$id_game_detail)?>" method="POST" role="form" enctype="multipart/form-data">
                <div class="modal-body">
                  
                    <div class="form-row">
                      <?php foreach ($game_detail_id as $key) { ?>
                        <input type="hidden" class="form-control" name="link_game" value="<?=$link_game ?>">
                  <input type="hidden" class="form-control" name="link_detail" value="<?=$link_detail ?>">
                      <div class="form-group col-md-6">
                        <label>Image Info</label>
                        <input type="file" name="foto">
                        <input type="hidden" class="form-control" name="file_lama_info" value="<?=$key->image_info_detail ?>">
                        <img src="<?=base_url()?>assets/img/game/<?=$key->image_info_detail ?>" class="img-responsive mb-2 mt-2" alt="" style="width: 100%;">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Text Info</label>
                        <textarea name="text_info_detail" id="inputText_info_detail" class="form-control mb-3" rows="3" required="required"><?=$key->text_info_detail ?></textarea>
                      </div>
                      <?php } ?>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
              </div>
            </div>
          </div>
          <!-- Modal icon -->
          <div class="modal fade" id="modaltambahicon" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Tambah Icon</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="<?=site_url('minmin/ubah_icon/'.$id_game)?>" method="POST" role="form" enctype="multipart/form-data">
                <input type="hidden" class="form-control" name="link_url" value="<?=$link_game ?>">
                <input type="hidden" class="form-control" name="file_lama" value="<?=$icon ?>">
                <div class="modal-body">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputvariable">Input Gambar/Icon format SVG</label>
                      <input type="file" class="form-control" name="foto" >
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
              </div>
            </div>
          </div>
          
          <!-- Modal form -->
          <div class="modal fade" id="modaltambahform" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Tambah Form</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                
                <div class="modal-body">
                  <div class="form-row">
                    <form action="<?=site_url('minmin/tambah_form/'.$id_game)?>" method="POST" role="form" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="link_url" value="<?=$link_game ?>">
                    <div class="form-group col-md-6">
                      <label for="inputvariable">Jenis Input</label>
                      <select name="id_input" id="inputId_input" class="form-control" required="required">
                        <?php foreach ($input as $key) {?>
                        <option value="<?=$key->id_input ?>"><?=$key->variable_input ?> - <?=$key->type ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputvariable">Nama Input</label>
                      <input type="text" class="form-control" name="nama_form"required="required" placeholder="Isi Nama Form">
                    </div>
                    <button type="submit" class="btn btn-primary mb-3">Simpan</button>
                    </form>
                    <div class="form-group col-md-12">
                      <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Form</th>
                            <th>Act</th>
                          </tr>
                        </thead>
                        <?php $a=1;foreach ($form as $row) { if($row->id_game == $id_game){?>
                            <form action="<?=site_url('minmin/ubah_form/'.$row->id_form)?>" method="POST" role="form" enctype="multipart/form-data">
                        <tbody>
                          
                              <input type="hidden" class="form-control" name="link_url" value="<?=$link_game ?>">
                            <tr>
                            <td><?=$a++; ?></td>
                            <td><input type="text" name="nama_form" id="input" class="form-control" value="<?=$row->nama_form ?>" required="required"></td>
                            <td>
                              <button type="submit" class="btn btn-primary btn-sm" style="font-size: 11px;"><i class="fa fa-save"></i></button>
                              <a href="<?=site_url('minmin/hapus_form/'.$row->id_form)?>"><button type="button" class="btn btn-danger btn-sm" style="font-size: 11px;"><i class="fa fa-trash"></i></button></a>
                            </td>
                          </tr>
                          
                        </tbody>
                        </form>
                          <?php }} ?>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                
              </div>
            </div>
          </div>

          <!-- end modal -->
          <hr>
          <!-- <p class="mb-4">Unggah File Excel </p> -->
          <!-- DataTales Example -->
          
          <?php echo $this->session->flashdata('notif'); ?>
          <?php $active_game = $this->session->userdata('active_game'); ?>
          <div class="row mb-5">
            <div class="col-12" style="font-size: 11px;">
              <div class="row">
                <div class="col-12 col-md-3">
                  <?php foreach ($game_id as $key) { ?>
                  
                  <form action="<?=site_url('minmin/ubah_game/'.$key->id_game)?>" method="POST" role="form" enctype="multipart/form-data">
                    <img src="<?=base_url()?>assets/img/game/<?=$key->image ?>" class="img-responsive mb-2" alt="Image" style="width: 100%;">
                    <input type="file" name="foto"><br>
                    <label>Title</label>
                    <input type="text" name="nama_game" class="form-control mb-2" value="<?=$key->nama_game ?>" required="required">
                    <input type="hidden" class="form-control" name="file_lama" value="<?=$key->image ?>">
                    <input type="hidden" class="form-control" name="link_url" value="<?=$key->link ?>">
                    <label>Header Whatsapp</label>
                    <input type="text" name="title" class="form-control mb-2" value="<?=$key->title ?>">
                    <label>Nama Icon</label>
                      <input type="text" name="var_icon" class="form-control mb-2" value="<?=$key->var_icon ?>">
                    <label>Variable</label>
                    <input type="text" name="variable" class="form-control mb-2" value="<?=$key->variable ?>">
                    <label>Link</label>
                    <input type="text" name="link" class="form-control mb-2" value="<?=$key->link ?>">
                    <label>Status</label>
                    <div class="radio">
                      <label>
                        <input type="radio" name="status" id="input" value="on" <?php if($key->status == "on"){ echo "checked";} ?>>
                        On
                      </label>
                       <label>
                        <input type="radio" name="status" id="input" value="off" <?php if($key->status == "off"){ echo "checked";} ?>>
                        Off (Soon)
                      </label>
                      <label>
                        <input type="radio" name="status" id="input" value="disable" <?php if($key->status == "disable"){ echo "checked";} ?>>
                        Disable
                      </label>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Simpan</button>
                  </form>
                  <?php } ?>
                </div>
                <!-- <div class="col-6 col-md-4">
                </div> -->
                <div class="col-6 col-md-5">
                  <button type="button" class="btn btn-primary btn-sm mb-1" data-toggle="modal" data-target="#modaltambahpaket"><i class="fa fa-plus"></i> Tambah Paket</button>
                  <!-- Modal -->
                  <div class="modal fade" id="modaltambahpaket" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Tambah Paket</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="<?=site_url('minmin/tambah_paket/'.$id_game)?>" method="POST" role="form" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" name="link_url" value="<?=$link_game ?>">
                        <div class="modal-body">
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputCity">Nama Game Detail</label>
                              <input type="text" class="form-control" name="nama_game_detail">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputvariable">Gambar</label>
                              <input type="file" class="form-control" name="foto" >
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputvariable">Title Whatsapp</label>
                              <input type="text" class="form-control" name="title_detail" >
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="list-group">
                    <?php foreach ($game_detail as $row) {if($row->id_game == $id_game){ ?>
                      <a href="<?=site_url('minmin/produk/'.$link_game.'/'.$row->link_detail)?>" class="list-group-item list-group-item-action <?php if($id_game_detail == $row->id_game_detail){echo 'active';} ?>"><?=$row->nama_game_detail?></a>
                    <?php }} ?>
                  </div>
                  <!-- isi apa aja -->
                  <!-- edit game detail -->
                  <?php if($status_detail == ''){ ?>
                  <h5 class="mt-3">Konten Informasi Game</h5>
                  <hr>
                  <?php foreach ($game_id as $key) { ?>
                    <form action="<?=site_url('minmin/ubah_game_info/'.$key->id_game)?>" method="POST" role="form" enctype="multipart/form-data">
                      <label>Gambar Info</label>
                      <br>
                      <img src="<?=base_url()?>assets/img/game/<?=$key->image_info ?>" class="img-responsive mb-2" alt="Image" style="width: 100%;">
                      <input type="file" name="foto">
                      <input type="hidden" class="form-control" name="file_lama" value="<?=$key->image_info ?>">
                      <input type="hidden" class="form-control" name="link_url" value="<?=$link_game ?>"><br>
                      <label>Text Info</label>
                      <textarea name="text_info" id="inputText_info" class="form-control" rows="3" required="required"><?=$key->text_info ?></textarea>
                      <button type="submit" class="btn btn-primary mt-3" style="width: 100%;">Simpan</button>
                    </form>
                  <?php } ?>
                  <?php }else{ ?>
                  <h5 class="mt-3">Konten Detail <?=$nama_game_detail ?></h5>
                  <hr>
                  <?php foreach ($game_detail_id as $key) { ?>
                    <form action="<?=site_url('minmin/ubah_game_detail/'.$key->id_game_detail)?>" method="POST" role="form" enctype="multipart/form-data">
                      <img src="<?=base_url()?>assets/img/game/<?=$key->image_detail ?>" class="img-responsive mb-2" alt="Image" style="width: 100%;">
                      <input type="file" name="foto"><br>
                      <label>Title</label>
                      <input type="text" name="nama_game_detail" class="form-control mb-2" value="<?=$key->nama_game_detail ?>" required="required">
                      <input type="hidden" class="form-control" name="file_lama" value="<?=$key->image_detail ?>">
                      <input type="hidden" class="form-control" name="link_game" value="<?=$link_game ?>">
                      <label>Header Whatsapp</label>
                      <input type="text" name="title_detail" class="form-control mb-2" value="<?=$key->title_detail ?>">
                      <label>Fill Process Time</label>
                      <input type="text" name="process" class="form-control mb-2" value="<?=$key->process ?>">
                      
                      <label>Variable</label>
                      <input type="text" name="variable_detail" class="form-control mb-2" value="<?=$key->variable_detail ?>">
                      <label>Link</label>
                      <input type="text" name="link_detail" class="form-control mb-2" value="<?=$key->link_detail ?>">
                      <label>Status</label>
                      <div class="radio">
                        <label>
                          <input type="radio" name="status_detail" id="input" value="on" <?php if($key->status_detail == "on"){ echo "checked";} ?>>
                          On
                        </label>
                        <label>
                          <input type="radio" name="status_detail" id="input" value="disable" <?php if($key->status_detail == "disable"){ echo "checked";} ?>>
                          Disable
                        </label>
                      </div>
                      
                      <button type="submit" class="btn btn-primary" style="width: 100%;">Simpan</button>
                    </form>
                    <?php } ?>
                  <?php } ?>
                </div>
                <div class="col-6 col-md-4">
                  <h5>Data Panel</h5>
                  <hr>
                  <!-- input -->
                  <a href="" class="button button-info" data-toggle="modal" data-target="#modaltambahitem"><i class="fa fa-plus mb-3"></i> Tambah <?=$var_icon ?></a>
                        <!-- Modal -->
                        <div class="modal fade" id="modaltambahitem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <?php if($status_detail == ''){ ?>
                                  <h5 class="modal-title" id="exampleModalLongTitle">Add <?=$nama_game ?></h5>
                                <?php }else{ ?>
                                  <h5 class="modal-title" id="exampleModalLongTitle">Add <?=$nama_game_detail ?></h5>
                                <?php } ?>
                                
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <?php if($status_detail == ''){ ?>
                              <form action="<?=site_url('minmin/tambah_item_list/'.$id_game)?>" method="POST" role="form" enctype="multipart/form-data">
                              <input type="hidden" class="form-control" placeholder="Jumlah Item" name="link_game" value="<?=$link_game ?>">
                              <div class="modal-body">
                                <div class="input_fields_wrap">
                                  <button class="btn btn-primary add_field_button mb-2"><i class="fa fa-plus"></i></button>
                                  <div>
                                      <div class="row">
                                        <div class="col">
                                          <input type="text" class="form-control mb-1" placeholder="Item" name="qty[]">
                                        </div>
                                        <div class="col">
                                          <input type="text" class="form-control mb-1" placeholder="Harga Non Pulsa" name="price_np[]">
                                        </div>
                                        <div class="col">
                                          <input type="text" class="form-control mb-1" placeholder="Harga Pulsa" name="price_p[]">
                                        </div>
                                      </div>
                                  </div>
                                </div>
                              <?php }else{ ?>
                                <form action="<?=site_url('minmin/tambah_item_list_detail/'.$id_game_detail)?>" method="POST" role="form" enctype="multipart/form-data">
                              <input type="hidden" class="form-control" placeholder="Jumlah Item" name="link_game" value="<?=$link_game ?>">
                              <input type="hidden" class="form-control" placeholder="Jumlah Item" name="link_detail" value="<?=$link_detail ?>">
                              <div class="modal-body">
                                <div class="input_fields_wrap">
                                  <button class="btn btn-primary add_field_button mb-2"><i class="fa fa-plus"></i></button>
                                  <div>
                                      <div class="row">
                                        <div class="col">
                                          <input type="text" class="form-control mb-1" placeholder="Item" name="qty[]">
                                        </div>
                                        <div class="col">
                                          <input type="text" class="form-control mb-1" placeholder="Harga Non Pulsa" name="price_np[]">
                                        </div>
                                        <div class="col">
                                          <input type="text" class="form-control mb-1" placeholder="Harga Pulsa" name="price_p[]">
                                        </div>
                                      </div>
                                  </div>
                                </div>
                              <?php } ?>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>
                  <!-- end modal -->
                  <?php if($available == 'yes'){ ?>
                        <table class="table mt-3">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>QTY</th>
                              <th>Price</th>
                              <th>Kategori</th>
                              <th>Act</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php if($status_detail == ''){ ?>
                            <?php $a=1;foreach ($item_price_sort as $row) { if($row->id_game == $id_game AND $row->visible == ""){?>
                              <tr>
                              <td><?=$a++; ?></td>
                              <td><?=$row->qty; ?></td>
                              <td><?=$row->price; ?></td>
                              <td><?=$row->kategori; ?></td>
                              <td>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modaledit<?=$row->id_item_price?>" style="font-size: 11px;"><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalhapus<?=$row->id_item_price?>" style="font-size: 11px;" <?php if($row->kategori == 'npulsa'){echo 'disabled';} ?> ><i class="fa fa-trash"></i></button>
                              </td>
                            </tr>
                            <!-- Modaledit -->
                            <div class="modal fade bd-example-modal-lg" id="modaledit<?=$row->id_item_price?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="<?=site_url('minmin/ubah_item_price/'.$row->id_item_price)?>" method="POST" role="form" enctype="multipart/form-data">
                                      <input type="hidden" class="form-control" name="link_game" value="<?=$link_game?>" style="font-size: 11px;">
                                      <div class="form-row">
                                        <div class="form-group col-md-4">
                                          <label for="inputCity">Qty</label>
                                          <input type="text" class="form-control" id="inputCity" name="qty" value="<?=$row->qty ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                          <label for="inputvariable">Price</label>
                                          <input type="number" class="form-control" id="inputvariable" name="price" value="<?=$row->price ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                          <label for="inputvariable">Kategori</label>
                                          <select name="kategori" id="inputKategori" class="form-control">
                                            <option value="" <?php if($row->kategori == ""){echo "selected";} ?>>-- Pilih Kategori --</option>
                                            <option value="pulsa" <?php if($row->kategori == "pulsa"){echo "selected";} ?>>Pulsa</option>
                                            <option value="npulsa" <?php if($row->kategori == "npulsa"){echo "selected";} ?>>Non Pulsa</option>
                                          </select>
                                        </div>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                  </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <!-- Modaldelete -->
                            <div class="modal fade" id="modalhapus<?=$row->id_item_price?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    Anda yakin ingin hapus data ini? Data yang hilang tidak bisa kembali. Untuk menonaktifkan sementara bisa menggunakan visible/divisible button [ <i class="fa fa-eye"></i> ].
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <form action="<?=site_url('minmin/hapus_item_price/'.$row->id_item_price)?>" method="POST" role="form" enctype="multipart/form-data">
                                      <input type="hidden" class="form-control" name="link_game" value="<?=$link_game?>" style="font-size: 11px;">
                                      <button type="submit" class="btn btn-primary">Ya, Saya Yakin</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <?php }} ?>
                            <?php }else{ ?>
                            <?php $a=1;foreach ($item_price_detail_sort as $row) { if($row->id_game_detail == $id_game_detail AND $row->visible == ""){?>
                              <tr>
                              <td><?=$a++; ?></td>
                              <td><?=$row->qty; ?></td>
                              <td><?=$row->price; ?></td>
                              <td><?=$row->kategori; ?></td>
                              <td>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modaledit<?=$row->id_item_price_detail?>" style="font-size: 11px;"><i class="fa fa-edit"></i></button>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalhapus<?=$row->id_item_price_detail?>" style="font-size: 11px;" <?php if($row->kategori == 'npulsa'){echo 'disabled';} ?> ><i class="fa fa-trash"></i></button>
                              </td>
                            </tr>
                            <!-- Modaledit -->
                            <div class="modal fade bd-example-modal-lg" id="modaledit<?=$row->id_item_price_detail?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <form action="<?=site_url('minmin/ubah_item_price_detail/'.$row->id_item_price_detail)?>" method="POST" role="form" enctype="multipart/form-data">
                                      <input type="hidden" class="form-control" name="link_game" value="<?=$link_game?>" style="font-size: 11px;">
                                      <input type="hidden" class="form-control" name="link_detail" value="<?=$link_detail?>" style="font-size: 11px;">
                                      <div class="form-row">
                                        <div class="form-group col-md-4">
                                          <label for="inputCity">Qty</label>
                                          <input type="text" class="form-control" id="inputCity" name="qty" value="<?=$row->qty ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                          <label for="inputvariable">Price</label>
                                          <input type="number" class="form-control" id="inputvariable" name="price" value="<?=$row->price ?>">
                                        </div>
                                        <div class="form-group col-md-4">
                                          <label for="inputvariable">Kategori</label>
                                          <select name="kategori" id="inputKategori" class="form-control">
                                            <option value="" <?php if($row->kategori == ""){echo "selected";} ?>>-- Pilih Kategori --</option>
                                            <option value="pulsa" <?php if($row->kategori == "pulsa"){echo "selected";} ?>>Pulsa</option>
                                            <option value="npulsa" <?php if($row->kategori == "npulsa"){echo "selected";} ?>>Non Pulsa</option>
                                          </select>
                                        </div>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                  </div>
                                  </form>
                                </div>
                              </div>
                            </div>
                            <!-- Modaldelete -->
                            <div class="modal fade" id="modalhapus<?=$row->id_item_price_detail?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Hapus Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    Anda yakin ingin hapus data ini? Data yang hilang tidak bisa kembali. Untuk menonaktifkan sementara bisa menggunakan visible/divisible button [ <i class="fa fa-eye"></i> ].
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <form action="<?=site_url('minmin/hapus_item_price/'.$row->id_item_price_detail)?>" method="POST" role="form" enctype="multipart/form-data">
                                      <input type="hidden" class="form-control" name="link_game" value="<?=$link_game?>" style="font-size: 11px;">
                                      <button type="submit" class="btn btn-primary">Ya, Saya Yakin</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <?php }} ?>
                            <?php } ?>
                            
                          </tbody>
                        </table>
                      <?php } ?>
                </div>
              </div>
            </div>
            
          </div>
        <!-- /.container-fluid -->

      </div>
      </div>
      <!-- End of Main Content -->
<?php $this->load->view('admin/footer'); ?>
