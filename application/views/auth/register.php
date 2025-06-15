<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Registrasi</title>
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/adminlte/') ?>dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <b>Daftar</b> Akun Baru Pasien
  </div>
  <div class="card">
    <div class="card-body register-card-body">
      <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
      <?php elseif ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
      <?php endif; ?>

      <form action="<?= base_url('auth/register') ?>" method="post">
        <label>Username</label>
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-user"></span></div>
          </div>
        </div>
        <label>Password</label>
        <div class="input-group mb-3">
          <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <a href="#" id="togglePassword" style="color:inherit;"><i class="fas fa-eye" id="eyeIcon"></i></a>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <a href="<?= base_url('login') ?>">Sudah punya akun?</a>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-success btn-block">Daftar</button>
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
  const passwordInput = document.getElementById('password');
  const togglePassword = document.getElementById('togglePassword');
  const eyeIcon = document.getElementById('eyeIcon');

  togglePassword.addEventListener('mousedown', function (e) {
    e.preventDefault();
    passwordInput.type = 'text';
    eyeIcon.classList.remove('fa-eye');
    eyeIcon.classList.add('fa-eye-slash');
  });

  togglePassword.addEventListener('mouseup', function (e) {
    e.preventDefault();
    passwordInput.type = 'password';
    eyeIcon.classList.remove('fa-eye-slash');
    eyeIcon.classList.add('fa-eye');
  });

  togglePassword.addEventListener('mouseleave', function (e) {
    passwordInput.type = 'password';
    eyeIcon.classList.remove('fa-eye-slash');
    eyeIcon.classList.add('fa-eye');
  });
</script>
</body>
</html>
