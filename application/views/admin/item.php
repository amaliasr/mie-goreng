 <?php $this->load->view('admin/header'); ?>
 <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?=$nama_menu ?></h1>
          <!-- <p class="mb-4">Unggah File Excel </p> -->
          <!-- DataTales Example -->
          
          <?php echo $this->session->flashdata('notif'); ?>
          <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">View Data</h6>
                  <div class="dropdown no-arrow">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus"></i> Add Data</button>
                  </div>
                </div>
            <div class="card-body">
            <table class="table table-bordered" id="dataTable" style="font-size: 12px">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Item</th>
                  <th>Link</th>
                  <th>Icon</th>
                  <th>Structure</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="show_data">
                <?php
                $a = 1;
                foreach ($item as $key) {?>
                <tr>
                  <td><?=$a++ ?></td>
                  <td><?=$key->nama_item ?></td>
                  <td><?=$key->link ?></td>
                  <td><?=$key->icon ?></td>
                  <td><?=$key->structure ?></td>
                  <td>
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modaledit<?=$key->id_item?>"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalhapus<?=$key->id_item?>"><i class="fa fa-trash"></i></button>
                  </td>
                </tr>
                <!-- Modaledit -->
                <div class="modal fade bd-example-modal-lg" id="modaledit<?=$key->id_item?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="<?=site_url('minmin/ubah_item/'.$key->id_item)?>" method="POST" role="form" enctype="multipart/form-data">
                          <div class="form-row">
                            <div class="form-group col-md-3">
                              <label for="inputCity">Nama item</label>
                              <input type="text" class="form-control" id="inputCity" name="nama_item" value="<?=$key->nama_item ?>">
                            </div>
                            <div class="form-group col-md-3">
                              <label for="inputCity">Icon</label>
                              <input type="text" class="form-control" id="inputCity" name="icon" value="<?=$key->icon ?>">
                            </div>
                            <div class="form-group col-md-3">
                              <label for="inputvariable">Link</label>
                              <input type="text" class="form-control" id="inputvariable" name="link" value="<?=$key->link ?>">
                            </div>
                            <div class="form-group col-md-3">
                              <label for="inputZip">Structure</label>
                              <input type="text" class="form-control" id="inputZip" name="structure" value="<?=$key->structure ?>">
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
                <div class="modal fade" id="modalhapus<?=$key->id_item?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <a href="<?=site_url('minmin/hapus_item/'.$key->id_item)?>"><button type="button" class="btn btn-primary">Ya, Saya Yakin</button></a>
                      </div>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </tbody>
            </table> 
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
<!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                       <form action="<?=site_url('minmin/tambah_item')?>" method="POST" role="form" enctype="multipart/form-data">
                          <div class="form-row">
                            <div class="form-group col-md-3">
                              <label for="inputCity">Nama item</label>
                              <input type="text" class="form-control" id="inputCity" name="nama_item" required="required">
                            </div>
                            <div class="form-group col-md-3">
                              <label for="inputCity">Icon</label>
                              <input type="text" class="form-control" id="inputCity" name="icon" >
                            </div>
                            <div class="form-group col-md-3">
                              <label for="inputvariable">Link</label>
                              <input type="text" class="form-control" id="inputvariable" name="link" required="required">
                            </div>
                            <div class="form-group col-md-3">
                              <label for="inputZip">Structure</label>
                              <input type="text" class="form-control" id="inputZip" name="structure" required="required">
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
<?php $this->load->view('admin/footer'); ?>
