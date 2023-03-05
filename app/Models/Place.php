<?php

namespace App\Models;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Query\Builder;

class Place extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    public function subDistrict()
    {
        
        return $this->BelongsTo(subDistrict::class);
    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    public function getImageUrlAttribute()
    {
        if($this->image){
            return asset($this->image);
        }
        
        return null;
    }

    // scope QUERY SEARCH
    public function scopeSearchPlace($query, $keyword)
    {
        return $query->where('name', 'like', '%' . $keyword .'%' )
                ->orWhere('description', 'like', '%' . $keyword .'%' )
                ->orWhere('address', 'like', '%' . $keyword .'%' )
                ->orWhereHas('subDistrict', function ($query) use ($keyword) {
                    $query->where('name', 'like', '%' . $keyword .'%');
                });
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
