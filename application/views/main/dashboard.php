<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- SweetAlert CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Bootstrap CSS (optional, for better styling of table) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Application Information Card -->
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Tentang Aplikasi Ini</h5>
                <p class="card-text">
                    Aplikasi ini dirancang untuk memudahkan monitoring dan pelaporan pelanggaran siswa di SMP Negeri 4 Gorontalo. Dengan aplikasi ini, guru dan staf sekolah dapat mencatat, mengelola, dan menganalisis data pelanggaran yang terjadi di lingkungan sekolah. Fitur-fitur utama termasuk:
                    <ul>
                        <li>Pencatatan pelanggaran oleh siswa</li>
                        <li>Pengelolaan data siswa dan pelanggaran</li>
                        <li>Analisis dan visualisasi data pelanggaran</li>
                        <li>Pelaporan pelanggaran kepada wali kelas dan orang tua</li>
                    </ul>
                    Aplikasi ini diharapkan dapat membantu dalam menciptakan lingkungan belajar yang lebih baik dan mendukung penegakan disiplin di sekolah.
                </p>
            </div>
        </div>

        <!-- School Information Card -->
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Tentang SMP Negeri 4 Gorontalo</h5>
                <p class="card-text">
                    SMP Negeri 4 Gorontalo adalah sebuah lembaga sekolah SMP negeri yang beralamat di Gorontalo, Kota Gorontalo.<br><br>
                    SMP negeri ini berdiri sejak 1978. Pada waktu ini SMP Negeri 4 Gorontalo memakai panduan kurikulum belajar pemerintah yaitu SMP 2013. SMP Negeri 4 Gorontalo memiliki kepala sekolah dengan nama Yopi H. Bano ditangani oleh seorang operator yang bernama Sri Nurfadhila Wahab.<br><br>
                    <strong>Akreditasi SMP Negeri 4 Gorontalo</strong><br>
                    SMP Negeri 4 Gorontalo memiliki akreditasi grade A dengan nilai 91 (akreditasi tahun 2017) dari BAN-S/M (Badan Akreditasi Nasional) Sekolah/Madrasah.
                </p>
            </div>
        </div>

        <!-- Chart Card -->
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Data Pelanggaran</h5>
                <div style="max-width: 250px; margin: auto;">
                    <canvas id="chart-dashboard" width="250" height="250"></canvas> 
                </div>
            </div>
        </div>
        
    </div>
    <!-- /.container-fluid -->

    <script src="<?= base_url('public/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('chart-dashboard').getContext('2d');

        const data = {
            labels: ['ditangani wali kelas', 'ditangani guru bk', 'Pemanggilan orang tua'],
            datasets: [{
                label: '# Jumlah Siswa',
                data: [<?= $wali->count ?>, <?= $bk->count ?>, <?= $panggil->count ?>],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)'
                ],
                borderWidth: 1
            }]
        };

        new Chart(ctx, {
            type: 'pie',
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false, 
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true,
                    }
                }
            }
        });
    </script>
</body>
</html>
