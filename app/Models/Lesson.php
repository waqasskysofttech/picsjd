<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lesson';
    protected $fillable = [
       'title', 'slug', 'short_desc', 'long_desc','img_path','is_active','is_deleted',
        
    ];
    
}
