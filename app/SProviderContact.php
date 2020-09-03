<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SProviderContact extends Model
{
    protected $guarded = ['id'];

    public function SProviderContact()
    {        
        return $this->belongsTo('App\ServiceProvider', 'providerId', 'id');
    }
}
