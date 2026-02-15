<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class PageController extends Controller
{

    public function home(): View
    {
        $data = [];

        return view('web.index', compact('data'));
    }

    public function aboutUs(): View
    {
        $data = [];

        return view('web.pages.about', compact('data'));
    }

    public function contact(): View
    {
        $data = [];

        return view('web.pages.contact', compact('data'));
    }

    public function serviceDetail(): View
    {
        $data = [];

        return view('web.pages.services-details', compact('data'));
    }
}
