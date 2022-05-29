<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionViewModel extends Model{
    protected $table = 'gettransactions';
    protected $primaryKey = 'id';
    protected $allowedFields = [

    ];
    protected $returnType = \App\Entities\TransactionView::class;
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}