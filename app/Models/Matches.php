<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{    
	protected $table = 'matches';
    protected $guarded = [
        'id','created_at','updated_at'
    ];

    public function matchBelongsToTeam1()
    {
        return $this->belongsTo('App\Models\Team','team1_id');
    }
    public function matchBelongsToTeam2()
    {
        return $this->belongsTo('App\Models\Team','team2_id');
    }

    // public function productsHasMainImage()
    // {
    // return $this->hasMany(ShopImage::class,'ref_id','id')->where('img_type', 1);
    // }

    // public function productsHasMultiImages()
    // {
    // return $this->hasMany(ShopImage::class,'ref_id','id')->where('img_type', 2);
    // }

   
    
    

}
