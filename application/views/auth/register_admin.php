<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Registrasi Admin</title>
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <b>Registrasi</b> Admin Baru
  </div>
  <div class="card">
    <div class="card-body register-card-body">
      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"> <?= $this->session->flashdata('error') ?> </div>
      <?php elseif ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('success') ?> </div>
      <?php endif; ?>
      <form action="<?= base_url('auth/register_admin') ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-user"></span></div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <a href="#" id="togglePassword" style="color:inherit;"><i class="fas fa-eye" id="eyeIcon"></i></a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Daftar Admin</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="<?= base_url('assets/adminlte/') ?>plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/adminlte/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/adminlte/') ?>dist/js/adminlte.min.js"></script>
<script>
  document.getElementById('togglePassword').addEventListener('mousedown', function (e) {
    e.preventDefault();
    const pw = document.getElementById('password');
    const icon = document.getElementById('eyeIcon');
    pw.type = 'text';
    icon.classList.remove('fa-eye');
    icon.classList.add('fa-eye-slash');
  });
  document.getElementById('togglePassword').addEventListener('mouseup', function (e) {
    const pw = document.getElementById('password');
    const icon = document.getElementById('eyeIcon');
    pw.type = 'password';
    icon.classList.remove('fa-eye-slash');
    icon.classList.add('fa-eye');
  });
  document.getElementById('togglePassword').addEventListener('mouseleave', function (e) {
    const pw = document.getElementById('password');
    const icon = document.getElementById('eyeIcon');
    pw.type = 'password';
    icon.classList.remove('fa-eye-slash');
    icon.classList.add('fa-eye');
  });
</script>
</body>
</html>