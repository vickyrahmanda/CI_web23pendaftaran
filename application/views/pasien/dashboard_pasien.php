<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Dashboard Pasien</title>
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="#" class="navbar-brand">
        <span class="brand-text font-weight-light">Dashboard Pasien</span>
      </a>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="<?= base_url('pasien/daftar') ?>" class="btn btn-primary mr-2">Form Pendaftaran</a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('pasien/status') ?>" class="btn btn-success">Cek Status</a>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('logout') ?>" class="btn btn-danger ml-3 logout">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0 text-center">Sistem Pendaftaran Pasien Rumah</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      <div class="container">
        <div class="card">
          <div class="card-body text-center">
            <div class="col-sm-12 text-center">
              <h1 class="m-0">Selamat Datang, <strong><?= $this->session->userdata('username') ?></strong></h1>
            </div>
            <p>Gunakan tombol di atas untuk mengisi form pendaftaran atau mengecek status pendaftaran Anda.</p>
          </div>
        </div>
      </div>
    </section>
  </div>

</div>

<?php $this->load->view('layout/footer'); ?>

</html>
