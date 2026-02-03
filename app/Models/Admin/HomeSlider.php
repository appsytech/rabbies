<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class HomeSlider extends Model
{
    protected $guarded = ['id'];

    protected $table = 'home_slider';

    protected $primaryKey = 'id';

    public $timestamps = false;
}
