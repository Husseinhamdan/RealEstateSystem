<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    use HasFactory;
    protected $fillable = [
        'owner_id',
        'type_id',
        'space',
        'description',
        'location',
        'price'
    ];

    public function owner()
    {
       return $this->belongsTo(Owner::class, 'owner_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo(Estate_type::class,'type_id','id');
    }
}
