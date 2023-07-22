<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" />

</head>

<body>
    <div class="container">
        <h1>Tambah Ruangan</h1>
        <form action="/ruangan/addruangan" method="post">
            <label for="nama_ruangan">Nama Ruangan:</label>
            <input type="text" name="nama_ruangan" id="nama_ruangan" required>

            <button type="submit">Simpan</button>
        </form>
        <table border="1">
            <thead>
                <th>Kode</th>
                <th>Nama Ruangan</th>
                <th>Aksi</th>
            </thead>
            <?php foreach ($dataRuangan as $key) : ?>
                <tbody>
                    <tr>
                        <td><?= $key['kd_ruangan'] ?></td>
                        <td><?= $key['nama_ruangan'] ?></td>
                        <td>
                            <a class="btn btn-danger" href="<?= base_url("/ruangan/deleteruangan/" . $key['id_ruangan']) ?>" onclick="return confirm('apakah anda yakin?')" style="color: black;">Delete</a>
                            <a class="btn btn-primary" href="<?= base_url("/ruangan/editruangan/" . $key['id_ruangan']) ?>" style="color: black;">Edit</a>

                        </td>

                    </tr>

                </tbody>
            <?php endforeach ?>
        </table>
    </div>







</body>

</html>