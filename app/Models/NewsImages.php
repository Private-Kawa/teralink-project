<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsImages extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'news_id',
        'path',
    ];
    
    public function news() {
        return $this->belongsTo(News::class);
    }
}
