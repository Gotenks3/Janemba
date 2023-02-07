<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Profile;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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

    /**
     * ユーザーからproductModelにアクセス
     */
    // public function products()
    // {
    //     return $this->belongsToMany('App/Models/')->withPivot('cart');
    // }
    
    /**
     * ユーザーからproductModelにアクセス
     */
    public function products()
    {
        return $this->belongsToMany(Product::class, 'carts')
        ->withPivot(['id', 'amount']); 
    }

    // 出品数合計 --アクセサ
    public function getCountProductsAttribute(): int
    {
        return $this->products->count();
    }

    /**
     * ユーザーに関連プロフィール情報を取得
     */
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    //多対多のリレーション(フォロワー数)
    public function followers()
    {
        // 1: リレーション先モデル　
        // 2: 中間テーブル名
        // 3: 接続元のid(followee_id) 
        // 4: 接続先のid(follower_id)　
        return $this->belongsToMany('App\Models\User', 'follows', 'followee_id', 'follower_id')->withTimestamps();
    }

    //多対多のリレーション(フォロー数)
    public function follows()
    {
        // 1: リレーション先モデル　
        // 2: 中間テーブル名
        // 3: 接続元のid(follower_id) 
        // 4: 接続先のid(followee_id)　
        return $this->belongsToMany('App\Models\User', 'follows', 'follower_id', 'followee_id')->withTimestamps();
    }

    // フォローしているか判定
    public function isFollowedBy(?User $user): bool
    {
        return $user
            ? (bool)$this->followers->where('id', $user->id)->count()
            : false;
    }

    // フォロワーの合計 --アクセサ
    public function getCountFollowersAttribute(): int
    {
        return $this->followers->count();
    }

    // フォロワーの合計 --アクセサ
    public function getCountFollowsAttribute(): int
    {
        return $this->follows->count();
    }
}
