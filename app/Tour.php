<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    public function options()
    {
        return $this->hasMany(TourOption::class);
    }

    public function option()
    {
        return $this->hasMany(TourOption::class)->take(1);
    }

    public function zone()
    {
        return $this->hasMany(ToursZonePrices::class)->take(1);
    }

    public function subcategories()
    {
        return $this->belongsToMany(SubCategory::class, 'subcategory_tours');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeSearch($query,$term)
    {
        // $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('title','like', $term)
                ->orWhere('description','like', $term)
                ->orWhereHas('category', function ($query) use ($term){
                    $query->where('title','like', $term);
                })
                ->orWhereHas('subcategory', function ($query) use ($term){
                    $query->where('title','like', $term);
                });
        });
    }
}
