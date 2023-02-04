<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Cart;

class Product extends Model
{
    use HasFactory;

    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'products';

    protected $fillable = [
        'user_id',
        'secondary_category_id',
        'name',
        'content',
        'image1',
        'image2',
        'image3',
        'image4',
        'state',
        'price',
        'is_selling'
    ];

    // StockModelリレーション
    public function stock()
    {
        return $this->hasOne('App\Models\Stock');
    }

    // cartModelリレーション
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    //多対多のリレーション
    public function likes()
    {
        // 1: リレーション先モデル　
        // 2: 中間テーブル名
        // 3: 接続元のid(product_id) 
        // 4: 接続先のid(user_id)　
        return $this->belongsToMany('App\Models\User', 'likes', 'product_id', 'user_id')->withTimestamps();
    }

    // この投稿に対して既にlikeしたかどうかを判別する --bool
    public function isLikedBy(?User $user): bool
    {
        return $user
            ? (bool) $this->likes->where('id', $user->id)->count()
            : false;
    }

    public function getCountLikesAttribute(): int
    {
        return $this->likes->count();
    }

    public function category()
    {
        return $this->belongsTo(SecondaryCategory::class, 'secondary_category_id');
    }
}
