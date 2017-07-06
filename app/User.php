<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use ListConfig;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'api_token'
    ];


    private $list_config = [
        'name' => [
            'field' => 'name',
            'type' => 'varchar',
            'label' => 'user.lbl_list_name'
        ],
        'email' => [
            'field' => 'email',
            'type' => 'varchar',
            'label' => 'user.lbl_list_email'
        ],
        'language' => [
            'field' => 'language',
            'type' => 'options',
            'options_list' =>'user.list_language',
            'label' => 'user.lbl_list_language',

        ],
    ];

    public function isAdmin()
    {
        return $this->id == 1 && $this->email == 'admin';
    }

    public function family()
    {
        return $this->hasOne('App\Families');
    }

}
