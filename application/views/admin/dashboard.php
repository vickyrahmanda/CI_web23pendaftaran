<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>dist/css/adminlte.min.css">
</head>

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body text-center">
          <div class="col-sm-12 text-center">
            <h1 class="m-0">Selamat Datang, <strong><?= $this->session->userdata('username') ?></strong></h1>
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <div class="col-sm-12">
            <h3 class="m-0 mb-3">Statistik Pasien</h3>
          </div>

          <div class="row">
            <div class="col-lg-4 col-6">
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?= $total ?></h3>
                  <p>Total Pendaftaran</p>
                </div>
                <div class="icon">
                  <i class="fas fa-notes-medical"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-6">
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?= $diterima ?></h3>
                  <p>Pasien Diterima</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user-check"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-6">
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3><?= $ditolak ?></h3>
                  <p>Pasien Ditolak</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user-times"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php $this->load->view('layout/footer'); ?>

</html>