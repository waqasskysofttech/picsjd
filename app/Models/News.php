<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class News extends Model
{
	protected $table = 'news';
    protected $fillable = [
        'slug','title','short_desc','long_desc', 'is_active','is_deleted'
    ];
    
    public function thumbnail()
    {
        return $this->hasOne('App\Models\Imagetable', 'ref_id','id')->where('table_name', 'news-thumbnail');
    }

    public function picture()
    {
        return $this->hasOne('App\Models\Imagetable', 'ref_id','id')->where('table_name', 'news-picture');
    }
   
}
