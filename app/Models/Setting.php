<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'setting_key', 'setting_value', 'title_ar', 'title_tr', 'type_id', 'category',
        'order_no', 'is_hidden'
    ];

    public $timestamps = false;
}
