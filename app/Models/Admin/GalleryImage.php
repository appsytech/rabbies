<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $guarded = ['id'];

    protected $table = 'gallery_images';

    protected $primaryKey = 'id';

    public $timestamps = false;
}
