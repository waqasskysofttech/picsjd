<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Faq extends Model
{
	protected $table = 'faq';
     protected $guarded = [
        'id','created_at','updated_at'
    ];
    
    //  public function faqBelongsToFaqType()
    // {
    //     return $this->belongsTo('App\Models\FaqType','faq_type_id');
    // }
    
   
}
