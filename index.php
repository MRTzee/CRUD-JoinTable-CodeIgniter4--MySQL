<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>Data Mahasiswa</title>
</head>

<body>

    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        DATA MAHASISWA
                    </div>
                    <div class="card-body">
                        <?php if (!empty(session()->getFlashdata('message'))) : ?>

                            <div class="alert alert-success">
                                <?php echo session()->getFlashdata('message'); ?>
                            </div>

                        <?php endif ?>
                        <?php
                        //untuk batasan akses
                        $waktu = date('H:i');
                        $batas1 = date('08:00');
                        $batas2 = date('16:00');
                        if ($waktu >= $batas1 && $waktu <= $batas2) {
                        ?>
                            <a href="<?= base_url('post/create') ?>" class="btn btn-md btn-success" style="margin-bottom: 10px">TAMBAH DATA</a>
                        <?php } ?>
                        <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">NO.</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">NAMA LENGKAP</th>
                                    <th scope="col">FAKULTAS</th>
                                    <th scope="col">JURUSAN</th>
                                    <th scope="col">NOMOR HP</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $no = 1;
                                foreach ($tb_mahasiswa as $key => $post) {
                                ?>

                                    <tr>
                                        <td><?php echo $no++ ?></td>
                                        <td><?php echo $post->nim ?></td>
                                        <td><?php echo $post->nama ?></td>
                                        <td><?php echo $post->fakultas ?></td>
                                        <td><?php echo $post->prodi ?></td>
                                        <td><?php echo $post->no_hp ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url('post/edit/' . $post->id) ?>" class="btn btn-sm btn-primary">EDIT</a>
                                            <a href="<?php echo base_url('post/delete/' . $post->id) ?>" class="btn btn-sm btn-danger">HAPUS</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>
</body>

</html>