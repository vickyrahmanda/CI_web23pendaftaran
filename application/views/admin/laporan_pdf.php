<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Laporan Pendaftaran</title>
  <style>
  body {
    font-family: sans-serif;
  }

  h2 {
    text-align: center;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    font-size: 12px;
    margin-top: 10px;
  }

  th,
  td {
    border: 1px solid #000;
    padding: 6px;
    text-align: left;
  }

  th {
    background-color: #eee;
  }
  </style>
</head>

<body>
  <h2>Laporan Data Pendaftaran</h2>
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Pasien</th>
        <th>Nama Dokter</th>
        <th>Spesialis</th>
        <th>Tanggal Daftar</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php $no = 1; foreach ($pendaftaran as $p): ?>
      <tr>
        <td><?= $no++ ?></td>
        <td><?= $p['nama_pasien'] ?></td>
        <td><?= $p['nama_dokter'] ?></td>
        <td><?= $p['spesialis'] ?></td>
        <td><?= date('d-m-Y', strtotime($p['tanggal_daftar'])) ?></td>
        <td><?= ucfirst($p['status']) ?></td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</body>

</html>