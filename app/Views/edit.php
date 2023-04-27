<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Edit Mahasiswa</title>
</head>

<body>
    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        EDIT MAHASISWA
                    </div>
                    <div class="card-body">
                        <?php if (isset($validation)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $validation->listErrors() ?>
                            </div>
                        <?php } ?>
                        <form action="<?php echo base_url('post/update/' . $post['id']) ?>" method="POST">

                            <div class="form-group">
                                <label>NIM</label>
                                <input type="text" name="nim" value="<?php echo $post['nim'] ?>" placeholder="Masukkan NIM" class="form-control">
                                <input type="hidden" name="id" value="<?php echo $post['id'] ?>">
                            </div>

                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama" value="<?php echo $post['nama'] ?>" placeholder="Masukkan Nama" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="fakultas">FAKULTAS</label>
                                <select name="fakultas_id" class="form-control" id="fakultas">
                                    <?php foreach ($DataSebelum as $ds) : ?>
                                        <?php foreach ($tb_fakultas as $fakultas) : ?>
                                            <option <?php if ($ds->fakultas == $fakultas['fakultas']) {
                                                        echo "selected='selected'";
                                                    } ?> value="<?= $fakultas['fakultas_id'] ?>">
                                                <?= $fakultas['fakultas'] ?></option>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="prodi">PRODI</label>
                                <select name="prodi_id" class="form-control" id="prodi">
                                    <?php foreach ($DataSebelum as $ds) : ?>
                                        <option value="<?= $ds->prodi_id; ?>"><?= $ds->prodi; ?></option>
                                    <?php endforeach; ?>
                                </select>

                            </div>
                            <div class="form-group">
                                <label>NOMOR HP</label>
                                <input type="text" class="form-control" name="no_hp" value="<?= $post['no_hp']; ?>">
                            </div>

                            <button type="submit" class="btn btn-success">UPDATE</button>
                            <a href="<?= base_url('post'); ?>" class="btn btn-md btn-primary">KEMBALI</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#fakultas').change(function() {
                var fakultas_id = $('#fakultas').val();
                var action = 'get_prodi';
                if (fakultas_id != '') {
                    $.ajax({
                        url: "<?= base_url('post/action'); ?>",
                        method: "POST",
                        data: {
                            fakultas_id: fakultas_id,
                            action: action
                        },
                        dataType: "JSON",
                        success: function(data) {
                            var html = '<option value="">--Pilih Prodi--</option>';
                            for (var count = 0; count < data.length; count++) {
                                html += '<option value="' + data[count].prodi_id + '">' + data[count].prodi + '</option>';
                            }
                            $('#prodi').html(html);
                        }
                    });
                } else {
                    $('#prodi').val('');
                }
            });
        });
    </script>

</body>

</html>