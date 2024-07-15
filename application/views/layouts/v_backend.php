<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Monitoring pelanggaran &mdash; siswa</title>
<!-- General CSS Files -->
<link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/prism/prism.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>

  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">
              
          
              
              
            </div>
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
        
        <?php $user = $this->session->userdata('level');  ?>
      
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block"> <?=  $user?></div>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">Logged in 5 min ago</div>
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="<?php echo base_url('Login') ?>" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
          <img src ="assets/img/Logo.jpg" alt="logo" width="70" class="shadow-light rounded-circle">
          </div>
         
          <ul class="sidebar-menu">
          
            <li class="menu-header"></li>
            <li class="dropdown active">
              <a href="<?php echo site_url('home')?>" class="nav-link "><i class="fas fa-home"></i><span>Dashboard</span></a>
              
              <li>
              
              <a href="<?php echo site_url('rekapan_pelanggaran')?>" class="nav-link "><i class="far fa-chart"></i><span>Rekapan Pelanggaran</span></a></li>
    <?php
$id_level = $this->session->userdata('id_level');
if ($id_level == '2') 
{
?>
                <li><a class="nav-link"
                 href="<?php echo site_url('data_siswa')?>"class="nav-link"><i class="fas fa-id-badge"></i><span>Data Siswa</span></a></li>
                 <li><a class="nav-link"
                 href="<?php echo site_url('data_guru')?>"class="nav-link"><i class="fas fa-user"></i><span>Data Guru</span></a></li>
                 <li><a class="nav-link"
                 href="<?php echo site_url('input_pelanggaran')?>"class="nav-link"><i class="fas fa-plus"></i></i><span>Input data pelanggaran</span></a></li>
             
                 <?php
                 
  
}




?>          
              </ul>
            </li>


           
          

      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
        <div class="section-header">
            <h1><?= $title; ?></h1>
          </div>
          
        <?php $this->load->view($layout); ?>
        
        </section>
      </div>
      <footer class="main-footer">
          <!-- <div class="footer-left">
            Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
          </div> -->
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
  <script src="assets/modules/prism/prism.js"></script>

  <!-- Page Specific JS File -->
  <script src="assets/js/page/bootstrap-modal.js"></script>
  
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>
