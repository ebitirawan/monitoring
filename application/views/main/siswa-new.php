                <!-- Begin Page Content -->
                <div class="container-fluid">

					<!-- Edit User Modal -->
					<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="editUserModalLabel">Edit Siswa</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form id="editUserForm" action="<?= base_url('siswa-update')?>" method="POST">
								<div class="modal-body">
									<input type="hidden" id="edit_siswa_id" name="edit_siswa_id">
									
									<div class="form-group">
										<label for="edit_nisn">NISN</label>
										<input type="text" class="form-control" id="edit_nisn" name="edit_nisn">
									</div>
									
									<div class="form-group">
										<label for="edit_nama_siswa">Nama Siswa</label>
										<input type="text" class="form-control" id="edit_nama_siswa" name="edit_nama_siswa">
									</div>
									
									<div class="form-group">
										<label for="edit_nama_siswa">Tanggal Lahir</label>
										<input type="date" class="form-control" id="edit_tgl_lahir" name="edit_tgl_lahir">
									</div>

									<div class="form-group">
										<label for="edit_jk" class="text-gray-900">Jenis Kelamin</label>
										<select class="form-control form-control" id="edit_jk" name="edit_jk">
											<option value="" selected>Pilih Jenis Kelamin</option>
											<option value="1">Laki - Laki</option>
											<option value="2">Perempuan</option>
										</select>
									</div>
									
									<div class="form-group">
										<label for="edit_nama_ortu">Nama Orang Tua</label>
										<input type="text" class="form-control" id="edit_nama_ortu" name="edit_nama_ortu">
									</div>
									
									<div class="form-group">
										<label for="edit_no_ortu">No Telfon Orang Tua</label>
										<input type="text" class="form-control" id="edit_no_ortu" name="edit_no_ortu">
									</div>

									<div class="form-group">
										<label for="edit_alamat" class="text-gray-900">Alamat</label>
										<input class="form-control form-control" id="edit_alamat" name="edit_alamat">
									</div>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
							</form>
						</div>
					</div>
					</div>

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">User</h1>
                    </div>
					<div class="row">
						<div class="col-md-12">
							<div class="card o-hidden border-0 shadow-lg">
								<div class="card-body">
									<!-- Nested Row within Card Body -->
									<div class="row">
										<div class="col-lg-12">
											<div class="p-5">
												<div class="text-left">
													<h1 class="h4 text-gray-900 mb-4">Siswa Baru</h1>
												</div>
												<form class="user" action="<?= base_url('siswa/add')?>" method="POST">
													<div class="row">
														<div class="col-lg-6">
															<div class="form-group">
																<label for="nip_nisn" class="text-gray-900">NISN</label>
																<input type="text" class="form-control form-control"
																	id="nip_nisn" name="nip_nisn" placeholder="Enter NISN...">
															</div>
															<div class="form-group">
																<label for="nama_siswa" class="text-gray-900">Nama Siswa</label>
																<input type="text" class="form-control form-control"
																	id="nama_siswa" name="nama_siswa" placeholder="Enter Nama Siswa...">
															</div>
															<div class="form-group">
																<label for="tgl_lahir" class="text-gray-900">Tanggal Lahir</label>
																<input type="date" class="form-control form-control"
																	id="tgl_lahir" name="tgl_lahir" placeholder="Enter Password...">
															</div>
															<div class="form-group">
																<label for="jk" class="text-gray-900">Jenis Kelamin</label>
																<select class="form-control form-control" id="jk" name="jk">
																	<option value="" selected>Pilih Jenis Kelamin</option>
																	<option value="1">Laki - Laki</option>
																	<option value="2">Perempuan</option>
																</select>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="form-group">
																<label for="nama_ortu" class="text-gray-900">Nama Orang Tua</label>
																<input type="text" class="form-control form-control"
																	id="nama_ortu" name="nama_ortu" placeholder="Enter Nama Orang Tua...">
															</div>
															<div class="form-group">
																<label for="no_ortu" class="text-gray-900">No Telfon Orang Tua</label>
																<input type="text" class="form-control form-control"
																	id="no_ortu" name="no_ortu" placeholder="Enter Telfon Orang Tua...">
															</div>
															<div class="form-group">
																<label for="alamat" class="text-gray-900">Alamat</label>
																<textarea class="form-control form-control"
																	id="alamat" name="alamat"></textarea>
															</div>
														</div>
													</div>
													<button type="submit" class="btn btn-primary btn-user btn-block">
														Tambah
													</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-12">
							<!-- DataTales Example -->
							<div class="card shadow mb-4">
								<div class="card-header py-3">
									<h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<thead>
												<tr>
													<th style="width: 5%;">NISN</th>
													<th style="width: 20%;">Nama Siswa</th>
													<th style="width: 20%;">Tanggal Lahir</th>
													<th style="width: 25%;">Jenis Kelamin</th>
													<th style="width: 20%;">Alamat</th>
													<th style="width: 20%;">Nama Orang Tua</th>
													<th style="width: 35%;">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php $no = 1; foreach($siswa as $row) : ?>
												<tr>
													<td><?= $row->nip_nisn; ?></td>
													<td><?= $row->nama_siswa; ?></td>
													<td><?= date('d-m-Y', strtotime($row->tgl_lahir)); ?></td>
													<td>
														<?php if ($row->jk == 1) {
															echo "Laki - Laki";
														} else {
															echo "Perempuan";
														} ?>
													</td>
													<td><?= $row->alamat; ?></td>
													<td><?= $row->nama_ortu; ?></td>
													<td>
														<button class="btn btn-info btn-circle btn-sm btn-edit" data-id="<?= $row->id_siswa; ?>">
															<i class="fas fa-pen"></i>
														</button>
														<a href="<?= base_url('siswa/delete/').$row->id_siswa; ?>" class="btn btn-danger btn-circle btn-sm">
															<i class="fas fa-trash"></i>
														</a>
													</td>
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

					$('.btn-edit').click(function() {
						var userId = $(this).data('id');
						
						$.ajax({
							url: '<?= base_url('siswa') ?>/' + userId,
							method: 'GET',
							success: function(response) {
								console.log(response);
								
								$('#edit_siswa_id').val(response.id_siswa);
								$('#edit_nisn').val(response.nip_nisn);
								$('#edit_nama_siswa').val(response.nama_siswa);
								$('#edit_tgl_lahir').val(response.tgl_lahir);
								$('#edit_jk').val(response.jk);
								$('#edit_nama_ortu').val(response.nama_ortu);
								$('#edit_no_ortu').val(response.no_ortu);
								$('#edit_alamat').val(response.alamat);

								$('#editUserModal').modal('show');
							}
						});
					});
				</script>
