<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estate_type extends Model
{
    use HasFactory;
    protected $fillable = [
        'type'
    ];

    public function estates()
    {
       return $this->hasMany(Estate::class, 'type_id', 'id');
    }
}
