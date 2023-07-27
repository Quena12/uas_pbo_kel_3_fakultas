<?= $this->extend('Layouts/indexView') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="card">
        <div class="card-header bg-secondary text-white">
            Ruangan
        </div>
        <div class="card-body">
        </div>
    </div>
    <div class="row match-height">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Ruangan Baru</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" action="/ruangan/addruangan" method="post">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Nama Ruangan</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="nama_ruangan" class="form-control" name="nama_ruangan" placeholder="Nama Ruangan">
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
                    <h4 class="card-title">List Ruangan</h4>
                </div>
                <div class="card-content">

                    <!-- table bordered -->
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <?php $no = 1 ?>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Ruangan</th>
                                    <th>Nama Ruangan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dataRuangan as $ruangan) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $ruangan['kd_ruangan']; ?></td>
                                        <td><?= $ruangan['nama_ruangan']; ?></td>
                                        <td>
                                            <!-- Tambahkan tombol edit dan delete -->
                                            <a href="/ruangan/editruangan/<?= $ruangan['id_ruangan']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="/ruangan/deleteruangan/<?= $ruangan['id_ruangan']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</a>
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