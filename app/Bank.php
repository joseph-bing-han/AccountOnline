<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bank extends Model
{

    use SoftDeletes;

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
