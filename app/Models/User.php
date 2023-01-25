<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function tweets()
    {
        return $this->hasMany(Tweet::class,'user_id','id');
    }
    public function followers()
    {
        return $this->belongsToMany(User::class,'following_relation','followed_id','follower_id');
    }
    public function following()
    {
        return $this->belongsToMany(User::class,'following_relation','follower_id','followed_id');
    }

    public function tweet($text,$additional_media = null)
    {
        $tweet = Tweet::create(['text' => $text,
                                'user_id' => $this->id,
                                'additional_media' => $additional_media,
                                ]);

        $hashtags = extractHashtags($text);
        foreach ($hashtags as $hashtag) {
            $hash = Hashtag::firstOrCreate(['hashtag' => $hashtag]);
            TweetHasHashtag::create(['tweet_id' => $tweet->id, 'hashtag' => $hash->hashtag]);
        }
        return $tweet;
    }
    public function follow(User $user)
    {
        $following = DB::table('following_relation')->where('follower_id',$this->id)->where('followed_id',$user->id);
        if(!$following->first())
        {
            DB::table('following_relation')->insert(['follower_id' => $this->id, 'followed_id' => $user->id]);
            return true;
        }
        return false;
    }
    public function unfollow(User $user)
    {
        $following = DB::table('following_relation')->where('follower_id',$this->id)->where('followed_id',$user->id);
        if($following->first())
        {
            $following->delete();
            return true;
        }
        return false;
    }

    public function like(Tweet $tweet)
    {
        $like = DB::table('user_like_tweet')->where('tweet_id',$tweet->id)->where('user_id',$this->id);
        if(!$like->first())
        {
            DB::table('user_like_tweet')->insert(['tweet_id' => $tweet->id,'user_id'=>$this->id]);
            return true;
        }
        return false;
    }
    public function unlike(Tweet $tweet)
    {
        $like = DB::table('user_like_tweet')->where('tweet_id',$tweet->id)->where('user_id',$this->id);
        if($like->first())
        {
            $like->delete();
            return true;
        }
        return false;
    }
    public function liked(Tweet $tweet)
    {
        $like = DB::table('user_like_tweet')->where('tweet_id',$tweet->id)->where('user_id',$this->id)->first();
        return $like?true:false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'cover',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
