<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'company_id',
        'model_name',
        'description',
        'sale_price',
        'cost_price',
        'qty',
        'is_popular'
    ];

    public function getIsPopularAttribute($attribute){
        return $this->isPopularOptions()[$attribute] ?? 0;
    }

    public function isPopularOptions(){
        return [
            1 => 'Popular',
            0 => 'Not Popular',
        ];
    }

    public function sizes(){
        return $this->belongsToMany(Size::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function colors(){
        return $this->belongsToMany(Color::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function productGalleries(){
        return $this->hasMany(ProductGallery::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class)->withPivot('qty')->withTimestamps();
    }
}
