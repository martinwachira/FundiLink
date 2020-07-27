<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeContact extends Model
{
    protected $guarded = ['id'];

    public function EmployeeContact()
    {
        return $this->belongsTo('App\ServiceProvider', 'providerId', 'id');
    }
}
