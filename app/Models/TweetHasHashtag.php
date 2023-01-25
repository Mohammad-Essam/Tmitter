<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TweetHasHashtag extends Model
{
    use HasFactory;
    protected $table = 'tweet_has_hashtag';
    protected $fillable = ['tweet_id','hashtag'];
}
