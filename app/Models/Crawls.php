<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Crawls extends Model
{
	protected $table = 'crawls';
    protected $fillable = [
      'keyword_id','main_category_id','sub_category_id',  'domain_name', 'position','result_title','result_url','result_destination','result_description',
        'is_archived','is_published','is_active','is_deleted'
    ];
    
    // protected $guarded = ['id', 'created_at','updated_at'];
    
    public function crawlBelongsTo()
    {
        return $this->belongsTo('App\Models\Keywords','keyword_id');
    }
   
}
