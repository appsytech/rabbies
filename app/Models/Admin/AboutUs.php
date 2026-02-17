<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $guarded = ["id"];
    protected $table = 'about_us';

    protected $primaryKey = 'id';

    public $timestamps = false;
}
