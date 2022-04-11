<?php $this->load->view('home/head'); ?>

<body>
	<header class="bg-header">
		<?php $this->load->view('home/navbar'); ?>
	</header>
	<div class="bg-list">
		<div class="container pt-5 pb-5">
			<h1 class="text-oswald txt-orange text-center">Detail Transaction</h1>
			<hr style="background-color: white;width: 30%" class="mb-3">
			<div class="row justify-content-md-center">
				<div class="col-12 col-md-6">
					<?php if ($status_pay == 'online') { ?>
						<div class="panel panel-default">
							<div class="panel-body py-3 px-3">
								<div class="row justify-content-md-center">
									<div class="col-md-12 col-12 text-center text-white mb-2">
										<p>Untuk yang punya aplikasi Gopay, Ovo, Dana, Link aja, Shopee Pay
											Silahkan Scan Kode berikut
											Bayar sesuai harga yang tertera di bawah.
											Jangan lupa simpan bukti transfer</p>
									</div>
									<div class="col-md-6 col-12 align-items-center"><img src="<?= base_url() ?>assets/img/barcode.png" class="mb-2" style="width: 100%;">
										<p class="text-center text-white">Tolong TRANSFER nominalnya sesuaikan dengan Format WA jangan DITAMBAH / DIKURANGIN</p>
									</div>
								</div>

							</div>
						</div>
					<?php } ?>
					<div class="panel panel-default" style="background-color: white; border-radius: 10px;">
						<div class="panel-body py-3 px-3">
							<div class="row">
								<div class="col-6">Username</div>
								<div class="col-6"><?= $this->session->userdata('nama_di_game') ?></div>
								<div class="col-6">User id (Zone id)</div>
								<div class="col-6"><?= $this->session->userdata('user_id') ?>(<?= $this->session->userdata('zone_id') ?>)</div>
								<div class="col-6">Order</div>
								<div class="col-6"><?= $qty ?> <?= $var_icon ?></div>
								<div class="col-6">Pembayaran</div>
								<div class="col-6"><?= $this->session->userdata('nama_payment') ?></div>
								<hr>
								<div class="col-6"><b>Harga</b></div>
								<?php if ($status_pay == 'bank' or $status_pay == 'online' or $status_pay == 'retail') { ?>
									<div class="col-6"><b>Rp <?= number_format($this->session->userdata('price') + $code_harga) ?>,00</b></div>
								<?php } else { ?>
									<div class="col-6"><b>Rp <?= number_format($this->session->userdata('price')) ?>,00</b></div>
								<?php } ?>
							</div>

						</div>
					</div>
					<div class="row mt-3">
						<?php if ($status_pay == 'retail') { ?>
							<div class="col-12 text-white mb-2">
								<small>*) Harga belum termasuk biaya Admin</small>
							</div>
						<?php } ?>
						<div class="col-6">
							<a href="<?= site_url('top_up/' . $link) ?>"><button type="button" class="btn bg-blacky" style="width: 100%;border-color: white;border-radius: 10px;"><b>
										< Kembali</b></button></a>
						</div>
						<div class="col-6">
							<a href="<?= site_url('send/' . $this->session->userdata('code_transaction')) ?>" target="_blank"><button type="button" class="btn bg-orange" style="width: 100%;border-radius: 10px;"><b><?php if ($status_pay == 'retail') {
																																																							echo "Minta Kode";
																																																						} else {
																																																							echo "Kirim Transaksi";
																																																						} ?></b></button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view('home/footer'); ?>
</body>
<?php $this->load->view('home/js'); ?>