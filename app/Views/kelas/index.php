<?= $this->extend('Layouts/indexView') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="card">
        <div class="card-header bg-secondary text-white">
            Kelas
        </div>
        <div class="card-body">
        </div>
    </div>
    <div class="row match-height">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Program Kelas Baru</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" action="/kelas/adddkelas" method="post">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Nama Kelas</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" id="nama_kelas" class="form-control" name="nama_kelas" placeholder="Nama Kelas">
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

    <!-- Tambahkan tombol untuk menambah prodi -->

    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">List Kelas</h4>
                </div>
                <div class="card-content">

                    <!-- table bordered -->
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <?php $no = 1 ?>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Kelas</th>
                                    <th>Nama kelas</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dataKelas as $kelas) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $kelas['kd_kelas']; ?></td>
                                        <td><?= $kelas['nama_kelas']; ?></td>
                                        <td>
                                            <a href="/kelas/editkelas/<?= $kelas['id_kelas']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                            <a href="/kelas/deletekelas/<?= $kelas['id_kelas']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</a>
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