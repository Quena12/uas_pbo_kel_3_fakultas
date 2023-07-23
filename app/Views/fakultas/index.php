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
                                        <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama Fakultas">
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($fakultas as $fakultas) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $fakultas['kd_fakultas']; ?></td>
                                        <td><?= $fakultas['nama']; ?></td>
                                        <td>
                                            <!-- Tambahkan tombol edit dan delete -->
                                            <a href="/fakultas/editfakultas/<?= $fakultas['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="/fakultas/deletefakultas/<?= $fakultas['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>