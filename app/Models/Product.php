<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    //多対多のリレーション
    public function likes()
    {
        // 1: リレーション先モデル　
        // 2: 中間テーブル名
        // 3: 接続元のid(product_id) 
        // 4: 接続先のid(user_id)　
        return $this->belongsToMany('App\Models\User', 'likes', 'product_id', 'user_id')->withTimestamps();
    }

    // この投稿に対して既にlikeしたかどうかを判別する
    public function isLike($productId)
    {
        return $this->likes()->where('product_id', $productId)->exists();
    }

    //isLikeを使って、既にlikeしたか確認したあと、いいねする（重複させない）
    public function like($productId)
    {
        if ($this->isLike($productId)) {
            //もし既に「いいね」していたら何もしない
        } else {
            $this->likes()->attach($productId);
        }
    }

    //isLikeを使って、既にlikeしたか確認して、もししていたら解除する
    public function unlike($productId)
    {
        if ($this->isLike($productId)) {
            //もし既に「いいね」していたら消す
            $this->likes()->detach($productId);
        } else { }
    }

    public function category()
    {
        return $this->belongsTo(SecondaryCategory::class, 'secondary_category_id');
    }
}
