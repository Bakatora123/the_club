<?php

namespace App\Models;

use CodeIgniter\Model;

class UtileriaM extends Model
{
    protected $table      = 'utileria';
    protected $primaryKey = 'id_articulo';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['nombre', 'cantidad','locker','detalle'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}