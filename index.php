<?php

require('connect.php');

$query = mysqli_query($conn, "SELECT * FROM pengaduan");

$i = 1;

?>

<!DOCTYPE html>

    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Daftar Pengaduan</title>
        <link href="assets/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>

    <div class="container mt-5">
        <h1 class="text-center mb-5">Daftar Pengaduan</h1>
        <a href="create.php" class="btn btn-primary mb-3">Tambah Pengaduan</a>
        <a href="auth/logout.php" class="btn btn-danger mb-3">Logout</a>

        <table class="table table-bordered rounded-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pelapor</th>
                    <th>Email</th>
                    <th>Nomor Hp</th>
                    <th>Pengaduan</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                
            <tbody>

            <?php while ($baris = mysqli_fetch_assoc($query)) { ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $baris['nama']; ?></td>
                <td><?php echo $baris['email']; ?></td>
                <td><?php echo $baris['no_hp']; ?></td>
                <td><?php echo $baris['isi_pengaduan']; ?></td>
                <td><?php echo $baris['created']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $baris['id']; ?>" class="btn btn-warning">EDIT</a>
                    <form action="auth/delete-process.php" method="post">
                        <input readonly type="hidden" name="id" value="<?= $baris['id']?>">
                        <button class="btn btn-danger" 
                        type="submit" name="delete">DELETE</button>
                    </form>
                </td>
            </tr>
            <?php $i++; } ?>

            </tbody>
        </table>
    </div>

    <script src="assets/bootstrap.min.js"></script>

    </body>

</html>