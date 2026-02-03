<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $guarded = ["id"];
    protected $table = 'activities';

    protected $primaryKey = 'id';

    public $timestamps = false;
}
