<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Web\AdminService;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    public function __construct(
        protected AdminService $adminService
    ) {}

    public function show(Request $request)
    {
        $admin = $this->adminService->find($request->id);

        if (! $admin) {
            return redirect()->back()->withErrors('Member Dont Exists');
        }

        $data = [
            'admin' => $admin,
        ];

        return view('web.pages.admin.show', compact('data'));
    }
}
