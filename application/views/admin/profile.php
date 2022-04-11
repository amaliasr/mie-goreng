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
                  <th>Username</th>
                  <th>Direct</th>
                  <th>Dev</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Visible</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="show_data">
                <?php
                $a = 1;
                foreach ($admin as $key) {?>
                <tr>
                  <td><?=$a++ ?></td>
                  <td><?=$key->username ?></td>
                  <td>
                    <?php foreach ($developer as $row) {
                      if ($row->id_developer == $key->id_developer) {
                        echo $row->nama_developer;
                      }
                    } ?>
                  </td>
                  <td>
                    <?php foreach ($actor as $row) {
                      if ($row->id_actor == $key->id_actor) {
                        echo $row->nama_actor;
                      }
                    } ?>
                  </td>
                  <td><?=$key->email ?></td>
                  <td><?=$key->status ?></td>
                  <td>
                    <?php if ($key->visible != '') {?>
                      <span class="badge badge-danger"><?=$key->visible ?></span>
                    <?php } ?>
                  </td>
                  <td>
                    <a href="<?=site_url('minmin/visible_akun_admin/'.$key->id_admin)?>"><button type="button" class="btn btn-light btn-sm">
                      <?php if ($key->visible == '') {?>
                        <i class="fa fa-eye"></i>
                      <?php }else{ ?>
                        <i class="fa fa-eye-slash"></i>
                      <?php } ?>
                    </button></a>
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modaledit<?=$key->id_admin?>"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalhapus<?=$key->id_admin?>" <?php if($key->status == 'master'){ echo "disabled";} ?>><i class="fa fa-trash"></i></button>
                  </td>
                </tr>
                <!-- Modaledit -->
                <div class="modal fade bd-example-modal-lg" id="modaledit<?=$key->id_admin?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="<?=site_url('minmin/ubah_akun_admin/'.$key->id_admin)?>" method="POST" role="form" enctype="multipart/form-data">
                          
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputPassword4">Expo</label>
                              <select name="id_actor" id="inputId_actor" class="form-control" required="required">
                                <?php foreach ($actor as $row) {?>
                                <option value="<?=$row->id_actor ?>" <?php if($row->id_actor == $key->id_actor){ echo "selected";} ?>><?=$row->nama_actor ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputPassword4">Dev</label>
                              <select name="id_developer" id="inputId_developer" class="form-control" required="required">
                                <?php foreach ($developer as $row) {?>
                                <option value="<?=$row->id_developer ?>" <?php if($row->id_developer == $key->id_developer){ echo "selected";} ?>><?=$row->nama_developer ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-4">
                              <label for="inputCity">Username</label>
                              <input type="text" class="form-control" id="inputCity" name="username" value="<?=$key->username ?>">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="inputvariable">Email</label>
                              <input type="text" class="form-control" id="inputvariable" name="email" value="<?=$key->email ?>">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="inputvariable">Status</label>
                              <input type="text" class="form-control" id="inputvariable" name="status" value="<?=$key->status ?>">
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
                <div class="modal fade" id="modalhapus<?=$key->id_admin?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <a href="<?=site_url('minmin/hapus_akun_admin/'.$key->id_admin)?>"><button type="button" class="btn btn-primary">Ya, Saya Yakin</button></a>
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
                  <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                       <form action="<?=site_url('minmin/tambah_akun_admin')?>" method="POST" role="form" enctype="multipart/form-data">
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputPassword4">Expo</label>
                              <select name="id_actor" id="inputId_actor" class="form-control" required="required">
                                <?php foreach ($actor as $row) {?>
                                <option value="<?=$row->id_actor ?>"><?=$row->nama_actor ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputPassword4">Dev</label>
                              <select name="id_developer" id="inputId_developer" class="form-control" required="required">
                                <?php foreach ($developer as $row) {?>
                                <option value="<?=$row->id_developer ?>"><?=$row->nama_developer ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputCity">Username</label>
                              <input type="text" class="form-control" id="inputCity" name="username">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputvariable">Status</label>
                              <input type="text" class="form-control" id="inputvariable" name="status">
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputvariable">Email</label>
                              <input type="text" class="form-control" id="inputvariable" name="email">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputvariable">Password</label>
                              <input type="text" class="form-control" id="inputvariable" name="password">
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
