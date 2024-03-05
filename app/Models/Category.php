<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{    
	protected $table = 'category';
    protected $guarded = [
        'id','created_at','updated_at'
    ];

    public function categoryHasProducts()
    {
    return $this->hasMany(Products::class,'category_id','id');
    }
    
    //  public function categoryHasCrawl()
    // {
    //      return $this->hasMany(Crawls::class,'main_category_id','id');
    //     //return $this->hasOne('App\Models\Crawls', 'main_category_id','id');
    // }
    
    public static function allCategory(){
        $data = Category::all();
        return $data;
    }

}
