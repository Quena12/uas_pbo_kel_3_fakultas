<?= $this->extend('Layouts/indexView') ?>

<?= $this->section('content') ?>

<div class="container">
    <h2>Edit Kelas</h2>
    <form action="/kelas/editkelas/<?= $kelas['id_kelas'] ?>" method="post">
        <input type="hidden" name="id_kelas" value="<?= $kelas['id_kelas'] ?>">
        <div class="form-group">
            <label for="kd_kelas">Kode Kelas</label>
            <input type="text" class="form-control" name="kd_kelas" placeholder="Kode Kelas" value="<?= $kelas['kd_kelas'] ?>" readonly>
        </div>
        <div class="form-group">
            <label for="nama_kelas">Nama Kelas</label>
            <input type="text" class="form-control" name="nama_kelas" placeholder="Nama Kelas" value="<?= $kelas['nama_kelas'] ?>">
        </div>
        <div class="form-group">
            <a href="/kelas" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-success">Simpan</button>

        </div>
    </form>
</div>



<?= $this->endSection() ?>