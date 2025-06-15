<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Data Pasien</title>
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>dist/css/adminlte.min.css">
</head>

<div class="wrapper">
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pasien</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
              <li class="breadcrumb-item active">Pasien</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <a href="<?= base_url('admin/pasien_tambah') ?>" class="btn btn-primary btn-sm">
              <i class="fas fa-plus"></i> Tambah Pasien
            </a>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Tanggal Lahir</th>
                  <th>Alamat</th>
                  <th>Telepon</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($pasien as $p): ?>
                <tr>
                  <td><?= $p['nama_pasien'] ?></td>
                  <td><?= date('d-m-Y', strtotime($p['tgl_lahir'])) ?></td>
                  <td><?= $p['alamat'] ?></td>
                  <td><?= $p['telepon'] ?></td>
                  <td>
                    <a href="<?= base_url('admin/pasien_edit/' . $p['id_pasien']) ?>" class="btn btn-sm btn-warning">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="<?= base_url('admin/pasien_hapus/' . $p['id_pasien']) ?>" class="btn btn-sm btn-danger"
                      onclick="return confirm('Yakin ingin menghapus data pasien ini?')">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

<?php $this->load->view('layout/footer'); ?>

</html>