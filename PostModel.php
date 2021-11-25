<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    /**
     * table name
     */
    protected $table = "tb_mahasiswa";

    /**
     * allowed Field
     */
    protected $allowedFields = [
        'nim',
        'nama',
        'fakultas_id',
        'prodi_id',
        'no_hp'
    ];

    function nampil()
    {
        $db = \Config\Database::connect();
        $sql = 'SELECT * FROM tb_mahasiswa,tb_fakultas,tb_prodi WHERE tb_mahasiswa.fakultas_id=tb_fakultas.fakultas_id and tb_mahasiswa.prodi_id=tb_prodi.prodi_id ';
        $query = $db->query($sql);
        $results = $query->getResult();
        return $results;
    }
}
