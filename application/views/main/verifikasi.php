<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-md-12">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Belum terverifikasi</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 10%;">Tanggal Pelanggaran</th>
                                    <th style="width: 5%;">Nama Siswa</th>
                                    <th style="width: 10%;">Perihal</th>
                                    <th style="width: 10%;">Detail Pelanggaran</th>
									 <th style="width: 10%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($pelaporans as $pelaporan): ?>
                                <tr>
                                    <td><?= date('d-m-Y', strtotime($pelaporan->tgl_pelanggaran)) ?></td>
                                    <td><?= $pelaporan->nama_siswa ?></td>
                                    <td><?= $pelaporan->judul_pelaporan ?></td>
                                    <td><?= $pelaporan->ket_pelaporan ?></td>
									<td><a href="<?= site_url('verifikasi/detail/' . $pelaporan->id_pelaporan) ?>" class="btn btn-info">Verifikasi</a></td>

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
