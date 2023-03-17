<?php

namespace App\Models;

use App\Casts\datehuman;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;
    protected $table = "tweets";


    //relations
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function likes()
    {
        return $this->belongsToMany(User::class,'user_like_tweet','tweet_id','user_id');
    }

    public function hashtags()
    {
        return $this->belongsToMany(Hashtag::class,'tweet_has_hashtag','tweet_id','hashtag');
    }

    //castings
    public $casts = [
        // 'created_at' => datehuman::class,
    ];
    protected $fillable = ['text','additional_media','user_id'];
    // public function accessor(): Attribute
    // {
    //     return Attribute::make(
    //         get:fn($value) => "{$value} ONLY APPEARS IN GETTING",
    //         set:fn($value) => "{$value} ADDED BY SETTER",
    //     );
    // }
    public function time() : Attribute
    {
        return Attribute::make(
            get:function($value) {
                $date = $this->created_at->diffForHumans();
                $i = 0;
                    $result = "";
                    for (; $i < strlen($date); $i++) {
                        if(is_numeric($date[$i]))
                            $result.=$date[$i];
                        else
                            break;
                    }
                    $result .= $date[$i+1];
                    return $result;
            },
        );
    }
    public $appends = ['time'];
}
