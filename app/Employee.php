<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $guarded = ['id'];

    public function hasManyServiceProviders()
    {
        return $this->hasMany('App\ServiceProvider', 'foreign_key', 'local_key');
    }
}
