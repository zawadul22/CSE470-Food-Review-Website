<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $fillable = [
        'restaurant_id',
        'restaurant_name',
        'review',
        'img',
    ];

    public function restaurants(){
        return $this->belongsTo('App\Models\User', 'restaurant_id');
    }
}
