<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ruangan</title>
</head>
<form action="/ruangan/editruangan/<?= $ruangan['id_ruangan'] ?>" method="post">
    <input type="hidden" name="id_ruangan" value="<?= $ruangan['id_ruangan'] ?>">
    <div class="form-group">
        <label for="kd_ruangan">Kode Ruangan</label>
        <input type="text" name="kd_ruangan" placeholder="Kode Ruangan" value="<?= $ruangan['kd_ruangan'] ?>" readonly>
    </div>
    <div class="form-group">
        <label for="nama_ruangan">Nama Ruangan</label>
        <input type="text" name="nama_ruangan" placeholder="Nama Ruangan" value="<?= $ruangan['nama_ruangan'] ?>">
    </div>
    <div class="form-group">
        <a href="/ruangan" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-success">Simpan</button>

    </div>
</form>

<body>

</body>

</html>