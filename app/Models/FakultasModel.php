<?php

namespace App\Models;

use CodeIgniter\Model;

class FakultasModel extends Model
{
    protected $table = "tb_fakultas";
    protected $primarykey = 'fakultas_id';
    protected $allowedFields = ['fakultas_id, fakultas'];

    function nampil($id)
    {
        $db = \Config\Database::connect();
        $sql = "SELECT * FROM tb_mahasiswa,tb_fakultas,tb_prodi WHERE tb_mahasiswa.fakultas_id=tb_fakultas.fakultas_id and tb_mahasiswa.prodi_id=tb_prodi.prodi_id and id = '$id'";
        $query = $db->query($sql);
        $results = $query->getResult();
        return $results;
    }
}
