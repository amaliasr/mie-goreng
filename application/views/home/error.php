<?php $this->load->view('home/head'); ?>
<body>
  <header class="py-3 pr-5 bg-header">
    <?php $this->load->view('home/navbar'); ?>
  </header>
  <div class="bg-list">
    <div class="container pt-5 pb-5 text-center">
      <h1 style="font-size: 11em;" class="txt-orange">404</h1>
      <h1 class="text-oswald text-white">Page Not Found</h1>
    </div>
  </div>
<?php $this->load->view('home/footer'); ?>
</body>
<?php $this->load->view('home/js'); ?>
