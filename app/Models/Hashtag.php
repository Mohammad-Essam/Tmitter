<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    use HasFactory;
    protected $primaryKey = 'hashtag';
    protected $keyType = 'string';
    protected $fillable = ['hashtag'];
    public $incrementing = false;
    public function tweets()
    {
        return $this->belongsToMany(Tweet::class,'tweet_has_hashtag','hashtag','tweet_id');
    }
}
