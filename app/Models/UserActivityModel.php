<?php

namespace App\Models;

use CodeIgniter\Model;

class UserActivityModel extends Model{
    protected $table = 'useractivities';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'userid','activity'
    ];
    protected $returnType = \App\Entities\Notes::class;
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}