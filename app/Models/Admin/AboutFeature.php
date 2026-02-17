<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class AboutFeature extends Model
{
    protected $guarded = ["id"];
    protected $table = 'about_features';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
