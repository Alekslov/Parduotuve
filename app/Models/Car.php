<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public function carMaker()
{
    return $this->belongsTo('App\Models\Maker', 'maker_id', 'id');
}
}


