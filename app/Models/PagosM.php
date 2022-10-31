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

    protected $allowedFields = ['doc_encargado', 'doc_socio','monto','fecha'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}