<?php

namespace App\Models;

use CodeIgniter\Model;

class ClearanceMainModel extends Model{
    protected $table = 'clearances';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'requestedby', 'purpose', 'status'
    ];
    protected $returnType = \App\Entities\ClearanceMain::class;
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}