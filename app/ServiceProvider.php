<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{
    protected $guarded = ['id'];

    public function hasManyEmployees()
    {
        return $this->hasMany('App\Employee', 'foreign_key', 'local_key');
    }
}
