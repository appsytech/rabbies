<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $guarded = ['id'];

    protected $table = 'packages';

    protected $primaryKey = 'id';

    public $timestamps = false;
}
