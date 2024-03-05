<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{    
	protected $table = 'team';
    protected $guarded = [
        'id','created_at','updated_at'
    ];

    // public function productBelongsToCategory()
    // {
    //     return $this->belongsTo('App\Models\Category','category_id');
    // }

    public function team1HasMatches()
    {
    return $this->hasMany(Matches::class,'team1_id','id');
    }

    public function team2HasMatches()
    {
    return $this->hasMany(Matches::class,'team2_id','id');
    }

   
    
    

}
