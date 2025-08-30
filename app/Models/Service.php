<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services'; // Table name

    protected $fillable = [
        'title',
        'slug',
        'service_thumbnail',
        'catagory_tags',
    ];


    protected $casts = [
        'catagory_tags' => 'array',
    ];
}
