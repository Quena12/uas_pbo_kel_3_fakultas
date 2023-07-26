<?= $this->extend('Layouts/indexView') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Edit Fakultas</h2>

    <!-- Tambahkan form untuk mengedit fakultas -->
    <form method="post" action="/fakultas/editfakultas/<?= $fakultas['id']; ?>">
        <div class="form-group">
            <label for="kd_ruangan">Kode Fakultas</label>
            <input type="text" class="form-control" name="kd_fakultas" placeholder="Kode Fakultas" value="<?= $fakultas['kd_fakultas'] ?>" readonly>
        </div>
        <div class="form-group">
            <label for="nama">Nama Fakultas</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $fakultas['nama']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/fakultas" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?= $this->endSection() ?>