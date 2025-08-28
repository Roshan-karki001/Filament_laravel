<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrustedClients extends Model
{
    use HasFactory;
    
    protected $table = 'trusted_clients';

     protected $fillable = [
        'logo',
        'short_description',
        'is_active',
    ];

    protected $casts = [
    'trusted_clients' => 'array',
];

}
