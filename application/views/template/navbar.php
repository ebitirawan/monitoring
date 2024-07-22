        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
			
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=	 base_url('dashboard') ?> ">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-book"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Monitoring <sup>Siswa</sup></div>
            </a>
			
            <hr class="sidebar-divider my-0">
			
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

			
			<!-- <?php if ($session->role == 0 || $session->role == 1) { ?> -->
			
            <hr class="sidebar-divider">
			
            <div class="sidebar-heading">
                Pelaporan
            </div>
			
			<li class="nav-item">
				<a class="nav-link" href="<?= base_url('lapor') ?>">
                <i class="fas fa-file-circle"></i>
					<span>Pelaporan</span></a>
			</li>
				<!-- <?php if ($session->role == 0) { ?> -->
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('verifikasi') ?>">
							<i class="fas fa-fw fa-pills"></i>
							<span>Verifikasi Pelanggaran</span></a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('pemanggilan') ?>">
							<i class="fas fa-chart-pie"></i>
							<span>Data Pelaporan</span></a>
					</li>
			
					<hr class="sidebar-divider">
					
					<div class="sidebar-heading">
						Siswa
					</div>
					
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('siswa') ?>">
						<i class="far fa-address-card"></i>
							<span>Data Siswa</span></a>
					</li>
					
					<hr class="sidebar-divider">
					
					<div class="sidebar-heading">
						Setting
					</div>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('setting') ?>">
							<i class="fas fa-fw fa-book"></i>
							<span>Pengaturan Utama</span></a>
					</li>

					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('user') ?>">
						<i class="fas fa-fw fa-user"></i>
							<span>User</span></a>
					</li>
				<!-- <?php } ?> -->
			<!-- <?php } ?> -->
			
			<!-- <?php if ($session->role == 2) { ?> -->
				<hr class="sidebar-divider">

				<div class="sidebar-heading">
					Pelanggaran
				</div>

				<li class="nav-item">
					<a class="nav-link" href="<?= base_url('data-pelanggaran') ?>">
						<i class="fas fa-fw fa-pills"></i>
						<span>Data Pelaporan</span></a>
				</li>
			<!-- <?php } ?> -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

