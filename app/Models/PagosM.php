<?php

namespace App\Models;

use CodeIgniter\Model;

class PagosM extends Model
{
    protected $table      = 'socio_pago';
    protected $primaryKey = 'id_pago';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['id_usuarioFK', 'id_socioFK','monto','fecha','nombre_encargado','nombre_socio'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}