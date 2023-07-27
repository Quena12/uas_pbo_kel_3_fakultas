<!DOCTYPE html>
<html>
<head>
    <title>Fakultas</title>
    <!-- Tambahkan link CSS untuk Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        .container{
            max-width: 1300px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
        <!-- <h1>Daftar Fakultas</h1> -->
        <!-- container -->
    <div class="container">
        <div class="card">
            <div class="card-header bg-secondary text-white">
            Ruangan Fakultas
            </div>
            <div class="card-body">               
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Masukkan Kata Kunci" aria-label="pencarian fakultas" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Cari</button>
                    </div>
                </form>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                + Tambah Fakultas
                </button>
    
            <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Form Fakultas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Form Input Fakultas -->
                                <div class="mb-3 row">
                                    <label for="inputkode" class="col-sm-2 col-form-label">Kode Fakultas</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputkode">
                                    </div>
                                    <label for="inputnama" class="col-sm-2 col-form-label">Nama Fakultas</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputnama">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="button" class="btn btn-primary" id="tombolsimpan">Simpan Perubahan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Tambahkan tombol untuk menambah fakultas -->
    <!-- <a href="/fakultas/create" class="btn btn-primary mb-3">Tambah Fakultas</a> -->

    <table>
            <tr>
                <th>ID</th>
                <th>Kode Fakultas</th>
                <th>Nama Fakultas</th>
                <th>Aksi</th>
            </tr>
            <?php foreach ($fakultas as $fakultas) : ?>
            <tr>
                    <td><?= $fakultas['id']; ?></td>
                    <td><?= $fakultas['kode_fakultas']?></td>
                    <td><?= $fakultas['nama']; ?></td>
                    <td>
                        <!-- Tambahkan tombol edit dan delete -->
                        <a href="/fakultas/edit/<?= $fakultas['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="/fakultas/delete/<?= $fakultas['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</a>
                    </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- <h2>Data JSON</h2>
    <pre><?= json_encode($fakultas, JSON_PRETTY_PRINT); ?></pre> -->
    

    <!-- Tambahkan script JS untuk Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script>
        $('#tombolsimpan').on('click',function(){
            var $kode_fakultas = $('#inputkode').val();
            var $nama = $('#inputnama').val();

            $.ajax({
                url: "<?php echo site_url('fakultas/create')?>",
                type : "POST",
                success:function(hasil){
                    var $obj = $.parseJSON(hasil);
                    if ($obj.sukses === false) {
                        alert('saya gagal pesan : ' + obj.error);
                    }else{
                        alert('saya sukses');
                    }
                }
            })
        })
    </script>

</body>
</html>
