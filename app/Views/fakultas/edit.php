<?= $this->extend('Layouts/indexView') ?>

<?= $this->section('content') ?>
<div class="container">
    <h2>Edit Fakultas</h2>

    <!-- Tambahkan form untuk mengedit fakultas -->
    <form method="post" action="/fakultas/editfakultas/<?= $fakultas['id_fakultas']; ?>">
        <div class="form-group">
            <label for="kd_ruangan">Kode Fakultas</label>
            <input type="text" class="form-control" name="kd_fakultas" placeholder="Kode Fakultas" value="<?= $fakultas['kd_fakultas'] ?>" readonly>
        </div>
        <div class="form-group">
            <label for="nama_fakultas">Nama Fakultas</label>
            <input type="text" class="form-control" id="nama_fakultas" name="nama_fakultas" value="<?= $fakultas['nama_fakultas']; ?>" required>
        </div>
        <div class="form-group">
            <label for="nama_ruangan">Nama Ruangan</label>
            <div class="col-md-6">
                <fieldset class="form-group">
                    <select class="form-select" id="basicSelect" name="id_ruangan">
                        <option value="">-- Pilih Ruangan --</option>
                        <?php foreach ($ruangan as $key) : ?>
                            <option value="<?= $key['id_ruangan'] ?>" <?= $fakultas['id_ruangan'] == $key['id_ruangan'] ? 'selected' : '' ?>><?= $key['nama_ruangan'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </fieldset>
            </div>
            <label for="id_prodi">Program Studi</label>
            <div class="col-md-6">
                <div class="form-group">
                    <select class="choices form-select multiple-remove" multiple="multiple" name="id_prodi">
                        <?php foreach ($prodi as $key) : ?>
                            <option value="<?= $key['id_prodi'] ?>" <?= $fakultas['id_prodi'] == $key['id_prodi'] ? 'selected' : '' ?>><?= $key['nama_prodi'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="/fakultas" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?= $this->endSection() ?>