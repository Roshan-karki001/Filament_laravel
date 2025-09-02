<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
protected $appends = ['logo_path'];

    public function getLogoPathAttribute(){
      return  $this->logo ? Storage::url($this->logo) : null;
    }

}
