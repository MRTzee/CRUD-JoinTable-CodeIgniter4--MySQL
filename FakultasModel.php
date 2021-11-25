<?php

namespace App\Models;

use CodeIgniter\Model;

class FakultasModel extends Model
{
    protected $table = "tb_fakultas";
    protected $primarykey = 'fakultas_id';
    protected $allowedFields = ['fakultas_id, fakultas'];
}
