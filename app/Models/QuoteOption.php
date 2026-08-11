<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuoteOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'option_key',
        'label',
        'base_price',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'base_price' => 'integer',
        'sort_order' => 'integer',
    ];
}
