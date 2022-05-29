<?php

namespace App\Models;

use CodeIgniter\Model;

class ResidentModel extends Model{
    protected $table = 'residents';
    protected $primaryKey = 'residentid';
    protected $allowedFields = [
        'lastname', 'firstname', 'middlename', 'contactnumber', 'address', 'email', 'gender', 'birthday', 'civilstatus'
    ];
    protected $returnType = \App\Entities\Resident::class;
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}