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
    </div>
    </div>
    
    <!-- Tambahkan tombol untuk menambah fakultas -->
    <a href="/fakultas/create" class="btn btn-primary mb-3">Tambah Fakultas</a>

    <table>
            <tr>
                <th>ID</th>
                <th>Nama Fakultas</th>
            </tr>
            <?php foreach ($fakultas as $fakultas) : ?>
            <tr>
                    <td><?= $fakultas['id']; ?></td>
                    <td><?= $fakultas['nama']; ?></td>
                    <td>
                        <!-- Tambahkan tombol edit dan delete -->
                        <a href="/fakultas/edit/<?= $fakultas['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                        <a href="/fakultas/delete/<?= $fakultas['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</a>
                    </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <!-- <h2>Data JSON</h2>
    <pre><?= json_encode($fakultas, JSON_PRETTY_PRINT); ?></pre> -->
    

    <!-- Tambahkan script JS untuk Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
