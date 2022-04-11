<?php $this->load->view('home/head'); ?>

<body>
    <header class="bg-header">
        <?php $this->load->view('home/navbar'); ?>
    </header>
    <div class="container mt-5 mb-5">

        <div class="row">
            <div class="col-12">
                <form class="inline">
                    <div class="mb-3">
                        <label for="inputParam" class="form-label">No. Transaksi / No. HP</label>
                        <input type="text" class="form-control" id="inputParam" aria-describedby="input">
                        <div id="input" class="form-text">Masukkan No. Transaksi / No. Hp.</div>
                    </div>
                    <button type="button" id="confirm" class="btn btn-primary mb-5">Cari</button>
                </form>
            </div>
            <div class="col-12 d-flex justify-content-center loading" id="loading">
                <div class="snippet" data-title=".dot-elastic">
                    <div class="stage">
                        <div class="dot-elastic"></div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div id="resultTable"></div>
            </div>
        </div>
    </div>

    <?php $this->load->view('home/footer'); ?>
</body>
<?php $this->load->view('home/js'); ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#loading').css("visibility", "hidden")
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
            url: '<?php echo base_url(); ?>home/history',
            type: 'POST',
            data: {
                param: dataUser
            },
            beforeSend: function() {
                $('#loading').css("visibility", "")
            },
            success: function(response) {
                // console.log(response)
                dataHistory(response)
                $('#loading').css("visibility", "hidden")

            }
        });
    });

    function dataHistory(data) {
        var html = ""
        var dataParsed = JSON.parse(data)
        console.log(dataParsed.length)

        html += '<div class="table-responsive">'
        html += '<table class="table table-bordered table-hover">'
        html += '<thead>'
        html += '<tr>'
        html += '<th>#</th>'
        html += '<th>Kode Transaksi</th>'
        html += '<th>Nama Item</th>'
        html += '<th>Harga Item</th>'
        html += '<th>No. Telp</th>'
        html += '<th>Status</th>'
        html += '</tr>'
        html += '</thead>'
        html += '<tbody id="tbl_data">'
        if (dataParsed.length > 0) {
            $.each(dataParsed, function(key, value) {
                html += '<tr>'
                html += '<td>' + (key + 1) + '</td>'
                html += '<td>' + value['kode_transaksi'] + '</td>'
                html += '<td>' + value['nama_game_detail'] + '</td>'
                html += '<td>' + number_format(value['harga_item']) + '</td>'
                html += '<td>' + value['no_telp'] + '</td>'
                if (toTitleCase(value['status']) == "Complete") {
                    html += '<td class="text-success">' + toTitleCase(value['status']) + '</td>'
                } else {
                    html += '<td>' + toTitleCase(value['status']) + '</td>'
                }
                html += '</tr>'
            })
        } else {
            html += '<tr>'
            html += '<td colspan="6" class="text-center">Data Not Found</td>'
            html += '</tr>'
        }
        html += '</tbody>'
        html += '</table>'
        html += '</div>'


        // console.log(html)

        $('#resultTable').html(html)
    }
</script>