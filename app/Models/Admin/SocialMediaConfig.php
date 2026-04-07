<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class SocialMediaConfig extends Model
{
    protected $guarded = ['id'];
    protected $table = 'social_media_configs';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
