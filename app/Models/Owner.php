<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstName',
        'lastName',
        'phone',
        'address'
    ];

    public function estates()
    {
       return $this->hasMany(Estate::class, 'owner_id', 'id');
    }
}
