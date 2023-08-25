<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;


    protected $with = ['images'];
    protected $fillable = [
        'town',
        'quarter',
        'price',
        'purpose',
        'longitude',
        'latitude',
        'type',
        'rooms',
        'kitchens',
        'parlours',
        'baths',
        'note',
        'is_active',
        'user_id'
    ];


  



    public function images()
    {
        return $this->hasMany(PropertyImages::class, 'property_id');
    }


}



