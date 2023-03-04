<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * バリデーションルール
     *
     * @return array
     */
    public static function validationRules()
    {
        return [
            'user.username' => ['required'],
            'user.mail'  => ['required'],
            'user.password' => ['required', 'min:8'],
        ];
    }

    /**
     * 編集時のバリデーションルール
     *
     * @param array $requestAll
     * @return array
     */
    public static function validationRulesForEdit(array $requestAll)
    {
        $editRules = [];

        // パスワード（編集時は空の場合は許可するルール）
        if (array_key_exists('password', $requestAll['user']) === false || strlen($requestAll['user']['password']) === 0) {
            $editRules['user.password'] = ['sometimes', 'present'];
        }

        return array_replace(self::validationRules(), $editRules);
    }


    // postsテーブルとのリレーション（主テーブル側）//1対多の「多」側なので複数形
    public function posts(){
        return $this->hasMany('App\Post');
    }

    // followsテーブルとのリレーション（主テーブル側）//多対多の「多」なので複数形
    //belongsToMany('関係するモデル', '中間テーブルのテーブル名', '中間テーブルで関係しているカラム(followsテーブルでこのメソッド名に適したもの)', '第3引数で書かれたカラムと関係しているカラム(第3引数とは違うfollowsテーブルのカラム)');
    public function followed(){
        return $this->belongsToMany('App\User','follows','followed_id','following_id');
    }

    public function following(){
        return $this->belongsToMany('App\User','follows','following_id','followed_id');
    }

    public function follow($user_id)
    {
        return $this->follows()->attach($user_id);
    }

    // フォロー解除する
    public function unfollow($user_id)
    {
        return $this->follows()->detach($user_id);
    }

    // フォローしているか
    public function isFollowing($user_id)
    {
        return (boolean) $this->follows()->where('followed_id', $user_id)->first(['follows.id']);
    }

    // フォローされているか
    public function isFollowed($user_id)
    {
        return (boolean) $this->followers()->where('following_id', $user_id)->first(['follows.id']);
    }
}
