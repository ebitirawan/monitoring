<head>
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</head>

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
                                <form class="user" id="pelaporanForm" action="<?= base_url('lapor-insert')?>" method="POST">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="tgl_pelanggaran" class="text-gray-900">Tanggal Pelanggaran</label>
                                                <input type="date" class="form-control form-control"
                                                    id="tgl_pelanggaran" name="tgl_pelanggaran">
                                            </div>
                                            <div class="form-group">
                                                <label for="siswa" class="text-gray-900">Nama Siswa</label>
                                                <select class="form-control form-control" id="siswa" name="siswa">
                                                    <option value="" selected>Pilih Siswa</option>
                                                    <?php foreach($siswa as $s): ?>
                                                    <option value="<?= $s->id_siswa ?>"><?= $s->nama_siswa ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>    
                                            <div class="form-group">
                                                <label for="perihal" class="text-gray-900">Perihal</label>
                                                <input type="text" class="form-control form-control"
                                                    id="perihal" name="perihal" placeholder="Enter perihal...">
                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="detail_pelanggaran">Detail Pelanggaran:</label>
                                                <textarea class="form-control" name="detail_pelanggaran" id="detail_pelanggaran" rows="4" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Tambah Pelanggaran
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

<!-- Scripts -->
<script src="<?= base_url('public/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function(){
        $('#siswa').select2();
    });

    $('#pelaporanForm').on('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting normally

        Swal.fire({
            title: 'Good job',
            text: "berhasil menambahkan data",
            icon: 'success',
            
        }).then((result) => {
            if (result.isConfirmed) {
                this.submit(); // Submit the form if confirmed
            }
        });
    });
</script>
