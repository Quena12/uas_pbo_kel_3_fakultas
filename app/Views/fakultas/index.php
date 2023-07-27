<?= $this->extend('Layouts/indexView') ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="card">
        <div class="card-header bg-secondary text-white">
            Ruangan Fakultas
        </div>
        <div class="card-body">
        </div>
    </div>
    <div class="row match-height">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Fakultas Baru</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" action="/fakultas/addfakultas" method="post">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Nama Fakultas</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="nama_fakultas" class="form-control" name="nama_fakultas" placeholder="Nama Fakultas" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Pilih Ruangan</label>
                                    </div>
                                    <div class="col-md-8">
                                        <fieldset class="form-group">
                                            <select class="form-select" id="basicSelect" name="id_ruangan" required>
                                                <option value="">-- Pilih Ruangan --</option>
                                                <?php foreach ($ruangan as $key) : ?>
                                                    <option value="<?= $key['id_ruangan'] ?>"><?= $key['nama_ruangan'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Pilih Program Studi</label>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <select class="choices form-select multiple-remove" multiple="multiple" name="id_prodi">
                                                <?php foreach ($prodi as $key) : ?>
                                                    <option value="<?= $key['id_prodi'] ?>"><?= $key['nama_prodi'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <!-- <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button> -->
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan tombol untuk menambah fakultas -->

    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Fakultas</h4>
                    <p><?= $json ?></p>
                </div>
                <div class="card-content">

                    <!-- table bordered -->
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <?php $no = 1 ?>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Fakultas</th>
                                    <th>Nama Fakultas</th>
                                    <th>Kantor Fakultas</th>
                                    <th>Program Studi Fakultas</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($fakultas as $fakultas) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $fakultas->kd_fakultas; ?></td>
                                        <td><?= $fakultas->nama_fakultas; ?></td>
                                        <td><?= $fakultas->nama_ruangan; ?></td>
                                        <td><?= $fakultas->nama_prodi; ?></td>
                                        <td>
                                            <!-- Tambahkan tombol edit dan delete -->
                                            <a href="/fakultas/editfakultas/<?= $fakultas->id_fakultas; ?>" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="/fakultas/deletefakultas/<?= $fakultas->id_fakultas; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?= print_r($fakultas) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>