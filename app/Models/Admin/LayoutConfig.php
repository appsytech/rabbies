<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class LayoutConfig extends Model
{
    protected $guarded = ['id'];
    protected $table = 'layout_config';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
