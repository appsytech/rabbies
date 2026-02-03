<?php

namespace App\Models\Admin;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $guarded = ['id'];

    protected $table = 'admins';

    protected $primaryKey = 'id';

    public $timestamps = false;
}
