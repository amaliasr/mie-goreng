<?php $this->load->view('admin/header'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $nama_menu ?></h1>
    <!-- <p class="mb-4">Unggah File Excel </p> -->
    <!-- DataTales Example -->

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <div class="row mt-2 align-items-center">
                <div class="col-auto">
                    <form class="inline" autocomplete="off">
                        <div class="mb-3">
                            <label for="inputParam" class="form-label">No. Transaksi</label>
                            <input type="text" class="form-control" id="inputParam" aria-describedby="input" placeholder="Masukkan No. Transaksi">
                            <!-- <div id="input" class="form-text">Masukkan No. Transaksi</div> -->
                        </div>
                        <!-- <button type="button" id="confirm" class="btn btn-primary mb-5">Cari</button> -->
                    </form>
                </div>
                <div class="col-auto">
                    <div class="mt-3">
                        <button type="button" id="confirm" class="btn btn-primary btn-sm">Cari</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="col-12">
                <div id="resultTable"></div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var kodeTrans = ''
        var checkData = ''
    });

    function number_format(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function toTitleCase(str) {
        return str.replace(/(?:^|\s)\w/g, function(match) {
            return match.toUpperCase();
        });
    }

    $(document).on('click', "#confirm", function() {
        var dataUser = $('#inputParam').val();
        console.log(dataUser);
        $.ajax({
            url: '<?php echo base_url(); ?>minmin/search_trans',
            type: 'POST',
            data: {
                param: dataUser
            },
            success: function(response) {
                // console.log(response)
                dataHistory(response)
            }
        });
    });

    function dataHistory(data) {
        var html = ""
        var dataParsed = JSON.parse(data)
        // console.log(dataParsed.length)

        html += '<div class="table-responsive">'
        html += '<table class="table table-bordered table-hover">'
        html += '<thead>'
        html += '<tr>'
        html += '<th>#</th>'
        html += '<th>Kode Transaksi</th>'
        html += '<th>Nama Item</th>'
        html += '<th>Tanggal</th>'
        html += '<th>Harga Item</th>'
        html += '<th>No. Telp</th>'
        html += '<th>Status</th>'
        html += '<th>Aksi</th>'
        html += '</tr>'
        html += '</thead>'
        html += '<tbody id="tbl_data">'
        if (dataParsed.length > 0) {
            $.each(dataParsed, function(key, value) {
                html += '<tr>'
                html += '<td>' + (key + 1) + '</td>'
                html += '<td>' + value['kode_transaksi'] + '</td>'
                html += '<td>' + value['nama_game_detail'] + '</td>'
                html += '<td>' + value['tanggal'] + '</td>'
                html += '<td>' + number_format(value['harga_item']) + '</td>'
                html += '<td>' + value['no_telp'] + '</td>'
                if (toTitleCase(value['status']) == "Complete") {
                    html += '<td class="text-success">' + toTitleCase(value['status']) + '</td>'
                    // html += '<td></td>'
                } else if (toTitleCase(value['status']) == "Reject") {
                    html += '<td class="text-danger">' + toTitleCase(value['status']) + '</td>'
                } else {
                    html += '<td>' + toTitleCase(value['status']) + '</td>'
                }
                html += '<td>'
                html += '<select class="form-select form-control" id="paramSelect" aria-label="Action">'
                html += '<option value="complete">Complete</option>'
                html += '<option value="reject">Reject</option>'
                html += '</select>'
                html += '</td>'
                html += '</tr>'
                kodeTrans = value['kode_transaksi']
                checkData = value['status']
            })
        } else {
            html += '<tr>'
            html += '<td colspan="6" class="text-center">Data Not Found</td>'
            html += '</tr>'
        }
        html += '</tbody>'
        html += '</table>'
        html += '</div>'
        html += '<button type="button" id="submitUpdate" class="btn btn-primary mb-3 mt-3 float-right">Simpan</button>'


        // console.log(checkData)

        $('#resultTable').html(html)
    }

    $(document).on('click', "#submitUpdate", function() {
        var valueInput = $("#paramSelect").val()

        $.ajax({
            url: '<?php echo base_url(); ?>minmin/update_trans',
            type: 'POST',
            data: {
                kode_trans: kodeTrans,
                param: valueInput
            },
            success: function(response) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Data Berhasil Diupdate',
                    icon: 'success',
                }).then((responses) => {
                    location.reload();
                });
            }
        });
    });
</script>

</div>
<!-- End of Main Content -->

<?php $this->load->view('admin/footer'); ?>