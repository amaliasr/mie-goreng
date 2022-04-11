 <?php $this->load->view('admin/header'); ?>
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?=$nama_menu ?></h1>
          <!-- <p class="mb-4">Unggah File Excel </p> -->
          <!-- DataTales Example -->
          
          <?php echo $this->session->flashdata('notif'); ?>
          <?php $active = $this->session->userdata('active'); ?>
          <div class="row mb-5">
            <div class="col-12" style="font-size: 11px;">
              <div class="row">
                <div class="col-4">
                  <div class="list-group" id="list-tab" role="tablist">
                    <?php foreach ($konten as $key) { ?>
                      <a class="list-group-item list-group-item-action <?php if($key->variable == $active){ echo 'active';} ?>" id="list-<?=$key->variable ?>-list" data-toggle="list" href="#list-<?=$key->variable ?>" role="tab" aria-controls="home"><?=$key->nama_konten ?></a>
                    <?php } ?>
                  </div>
                </div>
                <div class="col-8">
                  <div class="tab-content" id="nav-tabContent" style="background-color: white;height: 100%;padding: 20px;">
                    <?php foreach ($konten as $key) { ?>
                      <div class="tab-pane fade <?php if($key->variable == $active){ echo 'show active';} ?>" id="list-<?=$key->variable ?>" role="tabpanel" aria-labelledby="list-<?=$key->variable ?>-list">
                        <?php if ($key->element == 'txt') {?>
                          <form action="<?=site_url('minmin/tambah_konten_txt/'.$key->id_konten)?>" method="POST" role="form" enctype="multipart/form-data">
                        <?php }else{ ?>
                          <form action="<?=site_url('minmin/tambah_konten_file/'.$key->id_konten)?>" method="POST" role="form" enctype="multipart/form-data">
                        <?php } ?>
                          <div class="form-row">
                            <?php if ($key->element == 'txt') {?>
                              <div class="col">
                                <input type="text" class="form-control" name="isi" style="font-size: 11px;">
                              </div>
                            <?php }else{ ?>
                              <div class="col">
                                <input type="file" class="form-control-file" name="isi" style="font-size: 11px;">
                              </div>
                            <?php } ?>
                            <input type="hidden" class="form-control" name="variable" value="<?=$key->variable?>" style="font-size: 11px;">
                          <button type="submit" class="btn btn-primary mb-2" style="font-size: 11px;">Add <?=$key->nama_konten ?></button>
                          </div>
                        </form>
                        <table class="table">
                          <thead>
                            <?php $a=1;foreach ($konten_detail as $row) { if($row->id_konten == $key->id_konten){?>
                            <tr>
                              <th><?=$a++; ?></th>
                              <?php if ($key->element == 'txt') {?>
                              <th><?=$row->isi; ?></th>
                              <?php }else{ ?>
                                <td><img class="" style="width: 100%; background-color: black;" src="<?=base_url()?>assets/img/konten/<?=$row->isi ?>"></td>
                              <?php } ?>
                              <th>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalhapus<?=$row->id_konten_detail?>" style="font-size: 11px;" ><i class="fa fa-trash"></i></button>
                              </th>
                            </tr>
                            <!-- Modaldelete -->
                            <div class="modal fade" id="modalhapus<?=$row->id_konten_detail?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                    <form action="<?=site_url('minmin/hapus_isi_konten/'.$row->id_konten_detail)?>" method="POST" role="form" enctype="multipart/form-data">
                                      <input type="hidden" class="form-control" name="variable" value="<?=$key->variable?>" style="font-size: 11px;">
                                      <button type="submit" class="btn btn-primary">Ya, Saya Yakin</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <?php }} ?>
                          </thead>
                        </table>
                      </div>
                      
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        <!-- /.container-fluid -->

      </div>
      </div>
      <!-- End of Main Content -->
<?php $this->load->view('admin/footer'); ?>
