<?php

namespace App\Models;

use CodeIgniter\Model;

class ComplaintsModel extends Model{
    protected $table = 'complaints';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'complainant', 'complainee', 'complaint', 'resolution', 'status'
    ];
    protected $returnType = \App\Entities\Complaint::class;
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}