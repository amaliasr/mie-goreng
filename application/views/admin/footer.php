<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Job Fair 2020</span>

    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin keluar?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Tekan "keluar" untuk mengakhiri</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
        <a class="btn btn-primary" href="<?= site_url('minminlog/logout') ?>">Keluar</a>
      </div>
    </div>
  </div>
</div>
<!-- Bootstrap core JavaScript-->


<script>
  function myFunction() {
    document.getElementById("myForm").reset();
  }
</script>

<script src="<?= base_url() ?>assets/buat_admin/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>assets/buat_admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url() ?>assets/buat_admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url() ?>assets/buat_admin/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url() ?>assets/buat_admin/vendor/chart.js/Chart.min.js"></script>
<script src="<?= base_url() ?>assets/buat_admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/buat_admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url() ?>assets/buat_admin/js/demo/chart-area-demo.js"></script>
<script src="<?= base_url() ?>assets/buat_admin/js/demo/chart-pie-demo.js"></script>
<script src="<?= base_url() ?>assets/buat_admin/js/demo/datatables-demo.js"></script>

<!-- CKE Editor -->
<script src="<?= base_url(); ?>assets/summernote/summernote.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $("#pilihaja").change(function() {
      $(this).find("option:selected").each(function() {
        var optionValue = $(this).attr("class");
        if (optionValue == "perbulan") {
          $("#text_perbulan,#perbulans,#text_pertahun,#pertahun,#staff, #text_staff, #button_cari").show();
          $("#text_start,#start,#text_end,#end, #button_cari_tanggal").hide();
        } else if (optionValue == "pertanggal") {
          $("#text_start,#start,#text_end,#end,#staff, #text_staff, #button_cari_tanggal").show();
          $("#text_perbulan,#perbulans,#text_pertahun,#pertahun, #button_cari").hide();
        } else {
          $("#text_perbulan, #perbulans,#text_pertahun, #pertahun, #text_start, #start, #text_end, #end,#staff, #text_staff, #button_cari, #button_cari_tanggal").hide();
        }

      });
    }).change();
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    var max_fields = 10; //maximum input boxes allowed
    var wrapper = $(".input_fields_wrap"); //Fields wrapper
    var add_button = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e) { //on add input button click
      e.preventDefault();
      if (x < max_fields) { //max input box allowed
        x++; //text box increment
        $(wrapper).append('<div><div class="row"><div class="col"><input type="text" class="form-control mb-1" placeholder="Jumlah Item" name="qty[]"></div><div class="col"><input type="text" class="form-control mb-1" placeholder="Harga Non Pulsa" name="price_np[]"></div><div class="col"><input type="text" class="form-control mb-1" placeholder="Harga Pulsa" name="price_p[]"></div></div></div><a href="#" class="remove_field">Remove</a>'); //add input box
      }
    });

    $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
      e.preventDefault();
      $(this).parent('div').remove();
      x--;
    })
  });
  $(document).ready(function() {
    var max_fields = 10; //maximum input boxes allowed
    var wrapper = $(".input_fields_wrap_skin"); //Fields wrapper
    var add_button = $(".add_field_button_skin"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e) { //on add input button click
      e.preventDefault();
      if (x < max_fields) { //max input box allowed
        x++; //text box increment
        $(wrapper).append('<div><div class="row"><div class="col"><input type="text" class="form-control mb-1" placeholder="Jumlah Item" name="qty[]"></div><div class="col"><input type="text" class="form-control mb-1" placeholder="Harga Non Pulsa" name="price_np[]"></div><div class="col"><input type="text" class="form-control mb-1" placeholder="Harga Pulsa" name="price_p[]"></div></div></div><a href="#" class="remove_field">Remove</a>'); //add input box
      }
    });

    $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
      e.preventDefault();
      $(this).parent('div').remove();
      x--;
    })
  });
</script>
<script type="text/javascript">
  //edtor summernote
  $('#editordata').summernote({
    height: 200,
    toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'italic', 'underline', 'clear']],
      ['fontname', ['fontname']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
      ['height', ['height']],
      ['table', ['table']],
      ['insert', ['link', 'picture', 'hr']],
      ['view', ['fullscreen', 'codeview']],
      ['help', ['help']]
    ],
  });
  <?php foreach ($artikel as $key) : ?>
    $('#editordata<?= $key->id_artikel ?>').summernote({
      height: 200,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'clear']],
        ['fontname', ['fontname']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'hr']],
        ['view', ['fullscreen', 'codeview']],
        ['help', ['help']]
      ],
    });
  <?php endforeach ?>
  <?php foreach ($lowongan as $key) : ?>
    $('#editordatalowongan<?= $key->id_lowongan ?>').summernote({
      height: 200,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'clear']],
        ['fontname', ['fontname']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'hr']],
        ['view', ['fullscreen', 'codeview']],
        ['help', ['help']]
      ],
    });
  <?php endforeach ?>
</script>

</body>

</html>