<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Complaint extends Entity{
    protected $attributes = [
        'id' => null,
        'complainant' => null,
        'complainee' => null,
        'complaint' => null,
        'created_at' => null,
        'updated_at' => null,
        'deleted_at' => null,
        'notes' => null
    ];
    public function setCreatedAt(string $dateString){
        $this->attributes['created_at'] = new Time($dateString, 'UTC');

        return $this;
    }

    public function setNotes($notes){
        $this->attributes['notes'] = $notes;
    }

    public function getCreatedAt(string $format = 'Y-m-d H:i:s'){
        // Convert to CodeIgniter\I18n\Time object
        $this->attributes['created_at'] = $this->mutateDate($this->attributes['created_at']);

        $timezone = $this->timezone ?? app_timezone();

        $this->attributes['created_at']->setTimezone($timezone);

        return $this->attributes['created_at']->format($format);
    }
}