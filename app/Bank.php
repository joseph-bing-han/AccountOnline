<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{

    use SoftDeletes;
    use ListConfig;

    private $list_config = [
        'name' => [
            'field' => 'name',
            'type' => 'varchar',
            'label' => 'bank.lbl_list_name'
        ],
        'email' => [
            'field' => 'email',
            'type' => 'varchar',
            'label' => 'bank.lbl_list_email'
        ],
        'address' => [
            'field' => 'address',
            'type' => 'varchar',
            'label' => 'bank.lbl_list_address',
        ],
        'description' => [
            'field' => 'description',
            'type' => 'varchar',
            'label' => 'bank.lbl_list_description',
        ],
    ];


    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    public function family()
    {
        return $this->hasOne(Family::class);
    }

    public function createdUser()
    {
        return $this->hasOne(User::class, 'created_by');
    }

    public function updatedUser()
    {
        return $this->hasOne(User::class, 'updated_by');
    }
}
