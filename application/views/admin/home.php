 <?php $this->load->view('admin/header'); ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total User</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php $a=0;foreach ($user as $key) {
                          $a++;
                        }echo $a ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">User Today</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php $a=0;foreach ($user as $key) {
                          if (date('Y-m-d',strtotime($key->date_order)) == date('Y-m-d')) {
                            $a++;
                          }
                        }echo $a ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-building fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Slot</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">2<button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-pencil" style="color: blue"></i></button></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Coming Soon</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">
          
            <!-- Area Chart -->

            <div class="col-xl-6 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <!-- <h6 class="m-0 font-weight-bold text-primary">Add Game</h6> -->
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus"></i> Add Game</button>
                </div>
                <div class="card-body">
                  <table class="table table-bordered table-hover">
                     <thead>
                       <tr>
                         <th>Nama Game</th>
                         <th>Status</th>
                         <th>Image</th>
                         <th>Action</th>
                       </tr>
                     </thead>
                     <tbody>
                      <?php foreach ($game as $key) { ?>
                       <tr>
                         <td><?=$key->nama_game ?></td>
                         <td><?=$key->status ?></td>
                         <td><img src="<?=base_url()?>assets/img/game/<?=$key->image ?>" class="img-responsive mb-2" alt="Image" style="width: 100%;"></td>
                         <td>
                            <button type="button" class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i></button>
                         </td>
                       </tr>
                       
                <!-- Modaldelete -->
                <div class="modal fade" id="modalhapus<?=$key->id_game?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <a href="<?=site_url('minmin/hapus_game/'.$key->id_game)?>"><button type="button" class="btn btn-primary">Ya, Saya Yakin</button></a>
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

            <div class="col-xl-6 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Daily Count</h6>
                </div>
                <div class="card-body">
                  <h1><b>3 / 3</b></h1>           
                </div>
              </div>
            </div>
                
            </div>
          <!-- Content Row -->

        </div>
        </div>
        <!-- /.container-fluid -->

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
       <form action="<?=site_url('minmin/tambah_game')?>" method="POST" role="form" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputCity">Nama Game</label>
              <input type="text" class="form-control" id="inputCity" name="nama_game">
            </div>
            <div class="form-group col-md-6">
              <label for="inputCity">Status</label>
              <select name="status" id="inputStatus" class="form-control" required="required">
                <option value="on">On</option>
                <option value="off">Of (coming soon)</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="inputvariable">Upload Image</label>
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