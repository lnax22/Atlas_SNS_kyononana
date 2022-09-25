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
        return $this->hasMany('App/Post');
    }
}
