<?php

namespace App\Models;

use App\Models\Place;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubDistrict extends Model
{
    use HasFactory;
    protected $guarded = [];

    public $timestamps = false;

        public function places()
    {
        return $this->hasMany(Place::class);
    }
}
