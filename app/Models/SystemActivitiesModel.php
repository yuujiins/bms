<?php

namespace App\Models;

use CodeIgniter\Model;

class SystemActivitiesModel extends Model{
    protected $table = 'systemactivities';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'performedby','actionperformed'
    ];
    protected $returnType = \App\Entities\Notes::class;
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}