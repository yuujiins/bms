<?php

namespace App\Models;

use CodeIgniter\Model;

class ClearanceModel extends Model{
    protected $table = 'getclearances';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id','requestedby', 'purpose', 'status'
    ];
    protected $returnType = \App\Entities\Clearance::class;
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}