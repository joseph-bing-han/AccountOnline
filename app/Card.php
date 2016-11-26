<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
    use SoftDeletes;
    public function bank()
    {
        return $this->hasOne(Bank::class);
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
