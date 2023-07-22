<!DOCTYPE html>
<html>
<head>
    <title>Tambah Fakultas</title>
    <!-- Tambahkan link CSS untuk Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Fakultas</h1>

        <!-- Tambahkan form untuk menambah fakultas -->
        <form method="post" action="/fakultas/store">
            <div class="form-group">
                <label for="nama">Nama Fakultas</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/fakultas" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <!-- Tambahkan script JS untuk Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
