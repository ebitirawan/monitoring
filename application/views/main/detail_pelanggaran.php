<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Pelanggaran</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Tanggal Pelanggaran:</h5>
                            <p><?= date('d-m-Y', strtotime($pelaporan->tgl_pelanggaran)) ?></p>

                            <h5>Nama Siswa:</h5>
                            <p><?= $pelaporan->nama_siswa ?></p>

                            <h5>Perihal:</h5>
                            <p><?= $pelaporan->judul_pelaporan ?></p>

                            <h5>Detail Pelanggaran:</h5>
                            <p><?= $pelaporan->ket_pelaporan ?></p>
                        </div>
                        
                        <div class="col-md-12">
                            
                            <h5>Serahkan Kepada:</h5>
                            <form action="<?= site_url('verifikasi/update/' . $pelaporan->id_pelaporan) ?>" method="post">
                                <div class="form-group">
                                    <label for="target">Pilih:</label>
                                    <select id="target" name="target" class="form-control" required>
                                        <option value="2">Wali Kelas</option>
                                        <option value="3">Guru BK</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Serahkan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
