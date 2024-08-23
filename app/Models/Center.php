<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;

    // protected $guarded = [];
    protected $fillable = [
        'name' ,
        'email' ,
        'address' ,
        'phone_number' ,
        'open_hours' ,
        'center_image' ,
    ];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
