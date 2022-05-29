<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model{
    protected $table = 'transactions';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'requestid', 'ornumber', 'amountpaid'
    ];
    protected $returnType = \App\Entities\Transactions::class;
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}