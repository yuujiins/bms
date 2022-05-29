<?php

namespace App\Models;

use CodeIgniter\Model;

class NotesModel extends Model{
    protected $table = 'complaintnotes';
    protected $primaryKey = 'noteid';
    protected $allowedFields = [
        'complaintid','notes', 'enteredby'
    ];
    protected $returnType = \App\Entities\Notes::class;
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}