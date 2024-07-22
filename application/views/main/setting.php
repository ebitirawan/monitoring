                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Setting</h1>
                    </div>

                    <!-- Content Row -->
					<div class="row">
						<div class="col-md-12">
							<div class="card o-hidden border-0 shadow-lg">
								<div class="card-body">
									<!-- Nested Row within Card Body -->
									<div class="row">
										<div class="col-lg-12">
											<div class="p-5">
												<div class="text-left">
													<h1 class="h4 text-gray-900 mb-4">Setting app</h1>
												</div>
												<form class="user" action="<?= base_url('setting/update/').$setting->id_user_system ?>" method="POST">
													<div class="row">
														<div class="col-lg-6">
															<div class="form-group">
																<label for="nama_sekolah" class="text-gray-900">Nama Sekolah</label>
																<input type="text" class="form-control form-control"
																	id="nama_sekolah" name="nama_sekolah" value="<?= $setting->nama_sekolah ?>">
															</div>
															<div class="form-group">
																<label for="alamat_sekolah" class="text-gray-900">Alamat</label>
																<textarea class="form-control form-control"
																	id="alamat_sekolah" name="alamat_sekolah"><?= $setting->alamat_sekolah ?></textarea>
															</div>
														</div>
														<div class="col-lg-6">
															<div class="form-group">
																<label for="wa_hook" class="text-gray-900">Hook WhatsApp</label>
																<input type="text" class="form-control form-control"
																	id="wa_hook" name="wa_hook" value="<?= $setting->hook_api_wa ?>">
															</div>
														</div>
													</div>
													<button type="submit" class="btn btn-primary btn-user btn-block">
														Update
													</button>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                </div>
                <!-- /.container-fluid -->

				<script src="<?= base_url('public/'); ?>vendor/jquery/jquery.min.js"></script>
