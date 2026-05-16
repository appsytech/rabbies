<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class NavigationMenu extends Model
{
    protected $guarded = ['id'];
    protected $table = 'navigation_menus';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
