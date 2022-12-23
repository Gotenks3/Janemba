<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Profile extends Model
{
    use HasFactory;

    /**
     * モデルと関連しているテーブル
     *
     * @var string
     */
    protected $table = 'profiles';

    protected $fillable = [
        'user_id',
        'nickname',
        'content',
        'icon',
        'prefecture',
        'gender',
        'age'
    ];

    /**
     * このプロフィールと関係しているユーザーを取得
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
