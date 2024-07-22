                <!-- Begin Page Content -->
                <div class="container-fluid">

					<!-- Edit User Modal -->
					<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form id="editUserForm" action="<?= base_url('user/update')?>" method="POST">
								<div class="modal-body">
									<input type="hidden" id="edit_user_id" name="edit_id_user">
									
									<div class="form-group">
										<label for="edit_nama_user">Nama User</label>
										<input type="text" class="form-control" id="edit_nama_user" name="edit_nama_user">
									</div>
									
									<div class="form-group">
										<label for="edit_username">Username</label>
										<input type="text" class="form-control" id="edit_username" name="edit_username">
									</div>
									
									<div class="form-group">
										<label for="edit_role">Jenis User</label>
										<select class="form-control" id="edit_role" name="edit_role">
											<option value="1">Admin / Guru BK</option>
											<option value="2">Wali Kelas</option>
											<option value="3">Kepala Sekolah</option>
										</select>
									</div>
									
									<div class="form-group">
										<label for="edit_ruangan">Ruangan</label>
										<input type="text" class="form-control" id="edit_ruangan" name="edit_ruangan">
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
													<h1 class="h4 text-gray-900 mb-4">User Baru</h1>
												</div>
												<form class="user" action="<?= base_url('user/add')?>" method="POST">
													<div class="row">
														<div class="col-lg-6">
															<div class="form-group">
																<label for="nama_user" class="text-gray-900">Nama User</label>
																<input type="text" class="form-control form-control"
																	id="nama_user" name="nama_user" placeholder="Enter Name...">
															</div>
															<div class="form-group">
																<label for="username" class="text-gray-900">Username</label>
																<input type="text" class="form-control form-control"
																	id="username" name="username" placeholder="Enter Username...">
															</div>
															<div class="form-group">
																<label for="password" class="text-gray-900">Password</label>
																<input type="password" class="form-control form-control"
																	id="password" name="password" placeholder="Enter Password...">
															</div>
														</div>
														<div class="col-lg-6">
															<div class="form-group">
																<label for="role" class="text-gray-900">Jenis User</label>
																<select class="form-control form-control" id="role" name="role">
																	<option value="" selected>Pilih Jenis User</option>
																	<option value="1">Admin / Guru BK</option>
																	<option value="2">Wali Kelas</option>
																	<option value="3">Kepala Sekolah</option>
																</select>
															</div>
															<div class="form-group">
																<label for="ruangan" class="text-gray-900">Ruangan</label>
																<input type="text" class="form-control form-control"
																	id="ruangan" name="ruangan" placeholder="Enter Nama Ruangan...">
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
									<h6 class="m-0 font-weight-bold text-primary">Data User</h6>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
											<thead>
												<tr>
													<th style="width: 5%;">No</th>
													<th style="width: 20%;">Nama User</th>
													<th style="width: 20%;">Username</th>
													<th style="width: 25%;">Jenis User</th>
													<th style="width: 20%;">Ruangan</th>
													<th style="width: 35%;">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php $no = 1; foreach($user as $row) : ?>
												<tr>
													<td><?= $no++ ?></td>
													<td><?= $row->nama_user; ?></td>
													<td><?= $row->username; ?></td>
													<td>
														<?php if ($row->role == 1) {
															echo "Admin / Guru BK";
														} elseif ($row->role == 2) {
															echo "Wali Kelas";
														} else {
															echo "Kepala Sekolah";
														} ?>
													</td>
													<td><?= $row->nama_ruangan; ?></td>
													<td>
														<button class="btn btn-info btn-circle btn-sm btn-edit" data-id="<?= $row->id_user; ?>">
															<i class="fas fa-pen"></i>
														</button>
														<a href="<?= base_url('user/reset/').$row->id_user; ?>" class="btn btn-warning btn-circle btn-sm">
															<i class="fas fa-key"></i>
														</a>
														<a href="<?= base_url('user/delete/').$row->id_user; ?>" class="btn btn-danger btn-circle btn-sm">
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
							url: '<?= base_url('user') ?>/' + userId,
							method: 'GET',
							success: function(response) {
								console.log(response);
								
								$('#edit_user_id').val(response.id_user);
								$('#edit_nama_user').val(response.nama_user);
								$('#edit_username').val(response.username);
								$('#edit_role').val(response.role);
								$('#edit_ruangan').val(response.nama_ruangan);

								$('#editUserModal').modal('show');
							}
						});
					});
				</script>
