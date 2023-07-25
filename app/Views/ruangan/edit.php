<?= $this->extend('Layouts/indexView') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Edit Ruangan</h2>
    <form action="/ruangan/editruangan/<?= $ruangan['id_ruangan'] ?>" method="post">
        <input type="hidden" name="id_ruangan" value="<?= $ruangan['id_ruangan'] ?>">
        <div class="form-group">
            <label for="kd_ruangan">Kode Ruangan</label>
            <input type="text" class="form-control" name="kd_ruangan" placeholder="Kode Ruangan" value="<?= $ruangan['kd_ruangan'] ?>" readonly>
        </div>
        <div class="form-group">
            <label for="nama_ruangan">Nama Ruangan</label>
            <input type="text" class="form-control" name="nama_ruangan" placeholder="Nama Ruangan" value="<?= $ruangan['nama_ruangan'] ?>">
        </div>
        <div class="form-group">
            <a href="/ruangan" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-success">Simpan</button>

        </div>
    </form>
</div>



<?= $this->endSection() ?>