<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $guarded = ['id'];

    protected $table = 'publication';

    protected $primaryKey = 'id';

    public $timestamps = false;
}
