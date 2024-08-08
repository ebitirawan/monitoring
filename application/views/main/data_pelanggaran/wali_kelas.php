<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('public/'); ?>vendor/datatables/dataTables.bootstrap4.min.css">
    <style>
        .btn-container {
            display: flex;
            gap: 10px; /* Adjust the gap between buttons as needed */
        }
    </style>
</head>
<body>
    <div class="container-fluid">

        <!-- Edit User Modal -->
        <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editUserModalLabel">Tindak Lanjuti Siswa</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="editUserForm" action="<?= base_url('data-pelanggaran-update')?>" method="POST">
                        <div class="modal-body">
                            <input type="hidden" id="edit_pelanggaran_id" name="edit_pelanggaran_id">

                            <div class="form-group">
                                <label for="edit_nisn">NISN</label>
                                <input type="text" class="form-control" id="edit_nisn" name="edit_nisn" readonly>
                            </div>

                            <div class="form-group">
                                <label for="edit_nama_siswa">Nama Siswa</label>
                                <input type="text" class="form-control" id="edit_nama_siswa" name="edit_nama_siswa" readonly>
                            </div>

                            <div class="form-group">
                                <label for="edit_perihal">Perihal</label>
                                <input type="text" class="form-control" id="edit_perihal" name="edit_perihal" readonly>
                            </div>

                            <div class="form-group">
                                <label for="edit_detail_pelanggaran">Detail Pelanggaran</label>
                                <textarea class="form-control" id="edit_detail_pelanggaran" name="edit_detail_pelanggaran" readonly></textarea>
                            </div>

                            <div class="form-group">
                                <label for="edit_no_ortu">Tindak Lanjut</label>
                                <textarea class="form-control" id="edit_tindak_lanjut" name="edit_tindak_lanjut"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan & Selesaikan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <div class="btn-container">
                    <button id="btnBelumSelesai" onclick="tblBelumSelesai()" class="btn btn-info">Dalam Penanganan <?= $this->session['role'] == 1 ? "BK" : "Wali Kelas"; ?></button>
                    <button id="btnSelesai" onclick="tblSelesai()" class="btn btn-secondary">Penanganan Laporan Selesai</button>
                </div>
            </div>
        </div>
        <hr>
        <!-- Page Heading -->
        <!-- belum selesai  -->
        <div class="row" id="belum_selesai">
            <div class="col-md-12">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Penanganan Wali Kelas</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th style="width: 5%;">NISN</th>
                                        <th style="width: 10%;">Nama Siswa</th>
                                        <th style="width: 20%;">Tanggal Pelanggaran</th>
                                        <th style="width: 20%;">Perihal</th>
                                        <th style="width: 25%;">Detail Pelanggaran</th>
                                        <th style="width: 25%;">Pemanggilan Ortu</th>
                                        <th style="width: 35%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($walikelas as $key => $value) : ?>
                                        <tr>
                                            <td><?= $value->nip_nisn ?></td>
                                            <td><?= $value->nama_siswa ?></td>
                                            <td><?= date('d-m-Y', strtotime($value->tgl_pelanggaran)) ?></td>
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
                                            <td>
                                                <button class="btn btn-primary btn-edit" data-id="<?= $value->id_pelaporan ?>">Beri Tindak Lanjut</button>
                                                <a class="btn btn-danger" href="<?= base_url('panggil_ortu/').$value->id_pelaporan ?>">Panggil Orang Tua</a>
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

        <!-- sudah selesai  -->
        <div class="row" id="selesai">
            <div class="col-md-12">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Pelaporan Selesai</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
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
    <script src="<?= base_url('public/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('public/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <script>
        $('#selesai').hide();

        $(document).ready(function() {
            $('#dataTable1').DataTable();
        });

        $(document).ready(function() {
            $('#dataTable2').DataTable();
        });

        function tblBelumSelesai() {
            $('#belum_selesai').show();
            $('#selesai').hide();
            $('#btnBelumSelesai').addClass('btn-info').removeClass('btn-secondary');
            $('#btnSelesai').addClass('btn-secondary').removeClass('btn-info');
        }

        function tblSelesai() {
            $('#belum_selesai').hide();
            $('#selesai').show();
            $('#btnBelumSelesai').addClass('btn-secondary').removeClass('btn-info');
            $('#btnSelesai').addClass('btn-info').removeClass('btn-secondary');
        }

        $('.btn-edit').click(function() {
            var userId = $(this).data('id');

            $.ajax({
                url: '<?= base_url('data-pelanggaran') ?>/' + userId,
                method: 'GET',
                success: function(response) {
                    console.log(response);

                    $('#edit_pelanggaran_id').val(response.id_pelaporan);
                    $('#edit_nisn').val(response.nip_nisn);
                    $('#edit_nama_siswa').val(response.nama_siswa);
                    $('#edit_perihal').val(response.judul_pelaporan);
                    $('#edit_detail_pelanggaran').val(response.ket_pelaporan);

                    $('#editUserModal').modal('show');
                }
            });
        });
    </script>
</body>
</html>
