<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Family extends Model
{
    use SoftDeletes;
    public $incrementing = false;

    public function createdUser()
    {
        return $this->hasOne(User::class, 'created_by');
    }

    public function updatedUser()
    {
        return $this->hasOne(User::class, 'updated_by');
    }
}
