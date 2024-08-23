<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    // protected $guarded = [];
    protected $fillable = [
        'title' ,
        'condition' ,
        'description' ,
        'availability' ,
        'category' ,
        'item_image' ,
        'center_id' ,
    ];


    public function center()
        {
            return $this->belongsTo(Center::class);
        }

}
