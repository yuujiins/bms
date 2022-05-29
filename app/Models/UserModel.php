<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
    protected $table = 'users';
    protected $primaryKey = 'userid';
    protected $allowedFields = [
        'lastname', 'firstname', 'middlename', 'address', 'email', 'loginpassword','contactnumber', 'roletype'
    ];
    protected $returnType = \App\Entities\User::class;
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}