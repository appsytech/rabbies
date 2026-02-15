<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
     public function index():View
    {
        return view('web.pages.blog.index');
    }


    public function show():View
    {
        return view('web.pages.blog.show');
    }
}
