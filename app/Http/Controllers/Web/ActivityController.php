<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Web\ActivityService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ActivityController extends Controller
{

    public function index()
    {
        return view('web.pages.activity.index');
    }


    public function show()
    {
        return view('web.pages.activity.show');
    }
}
