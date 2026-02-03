<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Web\GalleryService;

class GalleryController extends Controller
{
    public function __construct(
        protected GalleryService $galleryService
    ) {}
}
