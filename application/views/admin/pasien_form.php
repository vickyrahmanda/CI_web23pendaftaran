<?php $this->load->view('layout/header'); ?>
<?php $this->load->view('layout/sidebar'); ?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Form Pasien</title>
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <h1><?= isset($edit) ? 'Edit Pasien' : 'Tambah Pasien' ?></h1>
        </div>
      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <form
                action="<?= isset($edit) ? base_url('admin/pasien_update/' . $pasien['id_pasien']) : base_url('admin/pasien_simpan') ?>"
                method="post">
                <div class="form-group">
                  <label>Nama Pasien</label>
                  <input type="text" name="nama_pasien" class="form-control"
                    value="<?= isset($pasien['nama_pasien']) ? $pasien['nama_pasien'] : '' ?>" required>
                </div>
                <div class="form-group">
                  <label>Tanggal Lahir</label>
                  <input type="date" name="tgl_lahir" class="form-control"
                    value="<?= isset($pasien['tgl_lahir']) ? $pasien['tgl_lahir'] : '' ?>" required>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea name="alamat" class="form-control"
                    required><?= isset($pasien['alamat']) ? $pasien['alamat'] : '' ?></textarea>
                </div>
                <div class="form-group">
                  <label>Telepon</label>
                  <input type="text" name="telepon" class="form-control"
                    value="<?= isset($pasien['telepon']) ? $pasien['telepon'] : '' ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?= base_url('admin/pasien') ?>" class="btn btn-secondary ml-2">Kembali</a>
              </form>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

  <?php $this->load->view('layout/footer'); ?>
</body>

</html>