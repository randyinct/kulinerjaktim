<?php

namespace App\Models;

use App\Models\User;
use App\Models\Place;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getImageUrlAttribute()
    {
        if($this->image){
            return asset($this->image);
        }
        
        return null;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function place()
    {
       return $this->belongsTo(Place::class);
    }



}
