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
                  <th>Nama Pay</th>
                  <th>Image</th>
                  <th>Kategori</th>
                  <th>Code Pay</th>
                  <th>Initial</th>
                  <th>Status Pay</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="show_data">
                <?php
                $a = 1;
                foreach ($payment as $key) { if($key->visible_pay == ""){?>
                <tr>
                  <td><?=$a++ ?></td>
                  <td><?=$key->nama_payment ?></td>
                  <td><img src="<?=base_url()?>assets/img/payment/<?=$key->image ?>" class="img-responsive mb-2" style="width: 20px;"></td>
                  <td><?=$key->kategori ?></td>
                  <td><?=$key->code_pay ?></td>
                  <td><?=$key->an ?></td>
                  <td><?=$key->status_pay ?></td>
                  <td>
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modaledit<?=$key->id_payment?>"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalhapus<?=$key->id_payment?>"><i class="fa fa-trash"></i></button>
                  </td>
                </tr>
                <!-- Modaledit -->
                <div class="modal fade bd-example-modal-lg" id="modaledit<?=$key->id_payment?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="<?=site_url('minmin/ubah_payment/'.$key->id_payment)?>" method="POST" role="form" enctype="multipart/form-data">
                          <div class="form-row">
                            <div class="form-group col-md-4">
                              <label for="inputCity">Nama Payment</label>
                              <input type="text" class="form-control" id="inputCity" name="nama_payment" value="<?=$key->nama_payment ?>">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="inputvariable">Code Pay</label>
                              <input type="text" class="form-control" id="inputvariable" name="code_pay" value="<?=$key->code_pay ?>">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="inputvariable">Kategori</label>
                              <select name="kategori" id="inputKategori" class="form-control">
                                <option value="" <?php if($key->kategori == ""){echo "selected";} ?>>-- Pilih Kategori --</option>
                                <option value="pulsa" <?php if($key->kategori == "pulsa"){echo "selected";} ?>>Pulsa</option>
                                <option value="npulsa" <?php if($key->kategori == "npulsa"){echo "selected";} ?>>Non Pulsa</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputCity">Initial</label>
                              <input type="text" class="form-control" id="inputCity" name="an" value="<?=$key->an ?>">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputvariable">Status Pay</label>
                              <select name="status_pay" id="inputKategori" class="form-control">
                                <option value="" <?php if($key->status_pay == ""){echo "selected";} ?>>-- Pilih Status --</option>
                                <option value="pulsa" <?php if($key->status_pay == "pulsa"){echo "selected";} ?>>Pulsa</option>
                                <option value="bank" <?php if($key->status_pay == "bank"){echo "selected";} ?>>Bank</option>
                                <option value="retail" <?php if($key->status_pay == "retail"){echo "selected";} ?>>Retail</option>
                                <option value="online" <?php if($key->status_pay == "online"){echo "selected";} ?>>Online Pay</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <img src="<?=base_url()?>assets/img/payment/<?=$key->image ?>" class="img-responsive mb-2" style="height: 40px;background-color: black;">
                            </div>
                            <div class="form-group col-md-6">
                              <label>Upload Image</label>
                              <input type="file" class="form-control" name="foto">
                              <input type="hidden" class="form-control" name="file_lama" value="<?=$key->image ?>">
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
                <div class="modal fade" id="modalhapus<?=$key->id_payment?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <a href="<?=site_url('minmin/hapus_payment/'.$key->id_payment)?>"><button type="button" class="btn btn-primary">Ya, Saya Yakin</button></a>
                      </div>
                    </div>
                  </div>
                </div>
                <?php }} ?>
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
                       <form action="<?=site_url('minmin/tambah_payment')?>" method="POST" role="form" enctype="multipart/form-data">
                          <div class="form-row">
                            <div class="form-group col-md-4">
                              <label for="inputCity">Nama Payment</label>
                              <input type="text" class="form-control" id="inputCity" name="nama_payment">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="inputvariable">Code Pay</label>
                              <input type="text" class="form-control" id="inputvariable" name="code_pay">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="inputvariable">Kategori</label>
                              <select name="kategori" id="inputKategori" class="form-control">
                                <option value="" >-- Pilih Kategori --</option>
                                <option value="pulsa" >Pulsa</option>
                                <option value="npulsa" >Non Pulsa</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputCity">Initial</label>
                              <input type="text" class="form-control" id="inputCity" name="an">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputvariable">Status Pay</label>
                              <select name="status_pay" id="inputKategori" class="form-control">
                                <option value="" >-- Pilih Status --</option>
                                <option value="pulsa" >Pulsa</option>
                                <option value="bank" >Bank</option>
                                <option value="retail" >Retail</option>
                                <option value="online" >Online Pay</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label>Upload Image</label>
                              <input type="file" class="form-control" name="foto">
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
