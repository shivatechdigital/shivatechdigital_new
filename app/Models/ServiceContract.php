<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceContract extends Model
{
    //
    protected $fillable = ['name', 'email', 'service', 'contact', 'status'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
