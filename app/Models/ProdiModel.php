<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdiModel extends Model
{
    protected $table = "tb_prodi";
    protected $primarykey = 'prodi_id';
    protected $allowedFields = ['prodi_id', 'prodi', 'fakultas_id'];
}
