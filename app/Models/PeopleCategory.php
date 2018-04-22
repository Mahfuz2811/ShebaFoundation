<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeopleCategory extends Model
{
    public function createdBy()
    {
        return $this->belongsTo('App\User', 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo('App\User', 'updated_by');
    }
}
