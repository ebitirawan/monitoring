        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
			
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=	 base_url('dashboard') ?> ">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-book"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SIM <sup>Dalkon</sup></div>
            </a>
			
            <hr class="sidebar-divider my-0">
			
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

			
			<?php if ($session->role == 0 || $session->role == 1) { ?>
			
            <hr class="sidebar-divider">
			
            <div class="sidebar-heading">
                Alkon
            </div>
			
			<li class="nav-item">
				<a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-pills"></i>
					<span>Alkon Masuk</span></a>
			</li>
			
			<li class="nav-item">
				<a class="nav-link" href="tables.html">
					<i class="fas fa-fw fa-pills"></i>
					<span>Alkon Keluar</span></a>
			</li>
			
			<li class="nav-item">
				<a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-calendar-day"></i>
					<span>Alkon Kadaluarsa</span></a>
			</li>
			
            <hr class="sidebar-divider">
			
            <div class="sidebar-heading">
                Master Data
            </div>
			<?php if ($session->role == 0) { ?>
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-user"></i>
                    <span>User</span></a>
            </li>
			<?php } ?>
			
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Jenis Alkon</span></a>
            </li>
			
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-book"></i>
                    <span>Data Alkon</span></a>
            </li>
			
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Data Faskes</span></a>
            </li>
			
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Data Suplier</span></a>
            </li>
			<?php } ?>
			
			<?php if ($session->role == 2) { ?>
			<hr class="sidebar-divider">

			<div class="sidebar-heading">
				Laporan
			</div>

			<li class="nav-item">
				<a class="nav-link" href="tables.html">
					<i class="fas fa-fw fa-pills"></i>
					<span>Alkon Masuk</span></a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="tables.html">
					<i class="fas fa-fw fa-pills"></i>
					<span>Alkon Keluar</span></a>
			</li>

			<li class="nav-item">
				<a class="nav-link" href="tables.html">
					<i class="fas fa-fw fa-calendar-day"></i>
					<span>Alkon Kadaluarsa</span></a>
			</li>
			<?php } ?>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

