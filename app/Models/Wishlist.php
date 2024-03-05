<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Wishlist extends Model
{
	protected $table = 'wishlist';
    protected $guarded = [
        'id','created_at','updated_at'
    ];
    
     public function wishlistBelongsTo()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
   
}
