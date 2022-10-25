<?php

namespace App\Models;

use CodeIgniter\Model;

class IngresosM extends Model
{
    protected $table      = 'ingreso';
    protected $primaryKey = 'id_ingreso';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['monto','detalles','fecha'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}