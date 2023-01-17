<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'likes';

    // User,Productの多対多中間テーブル


    protected $fillable = [
        'user_id',
        'product_id',
    ];

    
}
