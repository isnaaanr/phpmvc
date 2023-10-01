<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman <?= $data['judul']; ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="<?= BASEURL; ?>">PHP MVC</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>">Home</a>
          <a class="nav-link active" href="<?= BASEURL; ?>/siswa">Siswa</a>
          <a class="nav-link active" href="<?= BASEURL; ?>/about">About</a>
          <a class="nav-link active" href="<?= BASEURL; ?>/jurusan">Jurusan</a>
          <a class="nav-link active" href="<?= BASEURL; ?>/kelas">Kelas</a>
          <a class="nav-link active" href="<?= BASEURL; ?>/guru">Guru</a>
        </div>
      </div>
    </div>
  </nav>