                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Pelaporan</h1>
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
													<h1 class="h4 text-gray-900 mb-4">Pelaporan Pelanggaran Baru</h1>
												</div>
												<form class="user" action="<?= base_url('lapor/submit')?>" method="POST">
													<div class="row">
														<div class="col-lg-6">
															<div class="form-group">
																<label for="alkon" class="text-gray-900">Alkon Masuk</label>
																<select class="form-control form-control" id="alkon" name="alkon">
																	<option value="" selected>Pilih Alkon</option>
																</select>
															</div>	
															<div class="form-group">
																<label for="no_batch" class="text-gray-900">No Batch</label>
																<input type="text" class="form-control form-control"
																	id="no_batch" name="no_batch" placeholder="Enter Name...">
															</div>
															<div class="form-group">
																<label for="expired_date" class="text-gray-900">Tanggal Kadalursa</label>
																<input type="date" class="form-control form-control"
																	id="expired_date" name="expired_date">
															</div>
														</div>
														<div class="col-lg-6">
															<div class="form-group">
																<label for="supplier" class="text-gray-900">Supplier Pemasok</label>
																<select class="form-control form-control" id="supplier" name="supplier">
																	<option value="" selected>Pilih Supplier</option>
																</select>
															</div>
															<div class="form-group">
																<label for="stok" class="text-gray-900">Stok Awal</label>
																<div class="row">
																	<div class="col-lg-8">
																	<input type="text" class="form-control form-control"
																		id="stok" name="stok" placeholder="Enter Stok awal...">
																	</div>
																	<div class="col-lg-4 text-center">
																		<span class="input-group-text" id="satuan">Butir</span>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<button type="submit" class="btn btn-primary btn-user btn-block">
														Login
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
