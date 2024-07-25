                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
					<div class="row">
						<div class="col-md-12">
							<!-- DataTales Example -->
							<div class="card shadow mb-4">
								<div class="card-header py-3">
									<h6 class="m-0 font-weight-bold text-primary">Data Pelanggaran</h6>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<thead>
												<tr>
													<th style="width: 5%;">NISN</th>
													<th style="width: 10%;">Nama Siswa</th>
													<th style="width: 20%;">Tanggal Pelanggaran</th>
													<th style="width: 20%;">Penanganan</th>
													<th style="width: 20%;">Perihal</th>
													<th style="width: 25%;">Detail Pelanggaran</th>
													<th style="width: 25%;">Pemanggilan Orang Tua</th>
													<th style="width: 20%;">Tindak Lanjut</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($selesai as $key => $value) : ?>
													<tr>
														<td><?= $value->nip_nisn ?></td>
														<td><?= $value->nama_siswa ?></td>
														<td><?= date('d-m-Y', strtotime($value->tgl_pelanggaran)) ?></td>
														<td>					
															<?php
															if ($value->status_pelaporan == 2) {
																echo "Di tangani wali kelas";
															} elseif ($value->status_pelaporan == 3) {
																echo "Di tangani BK";
															}
															?>
														</td>
														<td><?= $value->judul_pelaporan ?></td>
														<td><?= $value->ket_pelaporan ?></td>
														<td>					
															<?php
															if ($value->pemanggilan == 1) {
																echo "YA";
															} elseif ($value->pemanggilan == 0) {
																echo "TIDAK";
															}
															?>
														</td>
														<td><?= $value->tindak_lanjut ?></td>
													</tr>		
												<?php endforeach; ?>										
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>

                </div>
                <!-- /.container-fluid -->

				<script src="<?= base_url('public/'); ?>vendor/jquery/jquery.min.js"></script>

				<script>
					$(document).ready(function() {
						$('#dataTable').DataTable();
					});
				</script>
