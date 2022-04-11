<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin | ADWMLSTORE</title>

  <!-- Custom fonts for this template-->
  <link href="<?=base_url()?>assets/buat_admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?=base_url()?>assets/buat_admin/font-awesome/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=base_url()?>assets/buat_admin/css/sb-admin-2.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link rel="stylesheet" href="<?=base_url();?>assets/summernote/summernote.css" />
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=site_url('minmin')?>">
        <div class="sidebar-brand-icon">
          <!-- <i class="fas fa-laugh-wink"></i> -->
          <?php foreach ($konten_detail as $row) { if($row->id_konten == 3){ ?>
<img src="<?=base_url()?>assets/img/konten/<?=$row->isi ?>" class="img-responsive mr-3" alt="Image" style="width: 150px">
          <?php }} ?>
        </div>
        <!-- <div class="sidebar-brand-text mx-3">Administrator</div> -->
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <?php if($sidebar=="home"){?> <li class="nav-item active "> <?php }else{ ?> <li class="nav-item"> <?php } ?>
        <a class="nav-link" href="<?=site_url('minmin')?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Beranda</span></a>

      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu
      </div>

      <?php 
        foreach ($menu as $key) {
          if($key->id_actor == 1 AND $key->visible == ''){
      ?>
      <!-- staff -->
      <?php if($sidebar==$key->variable){?> <li class="nav-item active "> <?php }else{ ?> <li class="nav-item"> <?php } ?>
      <?php if ($key->variable == 'produk') {?>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="<?=$key->icon  ?>"></i>
          <span><?=$key->nama_menu ?></span>
        </a>
        <div id="collapsePages" class="collapse <?php if($side_game != ""){ echo 'show';} ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded" >
            <h6 class="collapse-header">List Game</h6>
            <?php foreach ($game_asc as $row) { ?>
              <a  class="collapse-item <?php if($side_game == $row->link){ echo 'active';} ?>" href="<?=site_url('minmin/'.$key->link.'/'.$row->link)?>"><?=wordwrap($row->nama_game,15,"<br>\n"); ?></a>
            <?php } ?>
          </div>
        </div>
      <?php }else{ ?>
        <a class="nav-link" href="<?=site_url('minmin/'.$key->link)?>">
          <i class="<?=$key->icon  ?>"></i>
          <span><?=$key->nama_menu ?></span></a>
      <?php } ?>
      </li>
      <?php }} ?>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

     <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- <a href="" target="_blank"><button type="button" class="btn btn-success" style="height: 40px;margin-top: 15px"><i class="fa fa-eye"></i> Preview</button></a> -->
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->

            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <!-- <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$username; ?></span> -->
                <img class="img-profile rounded-circle" src="https://img.freepik.com/free-vector/admin-concept-illustration_114360-2248.jpg?size=338&ext=jpg">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small ml-2"><i class="fa fa-sort-down"></i></span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
        