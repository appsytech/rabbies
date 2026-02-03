<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\AdminService;

class DashboardController extends Controller
{
    public function __construct(
        protected AdminService $adminService
    ) {}

    public function index()
    {
        $data = [
            'totalTeachers' => $this->adminService->countByFilters([
                'adminRole' => 4,
            ]),
            'totalAdmins' => $this->adminService->countByFilters([
                'exceptAdminRole' => 4,
            ]),
        ];

        return view('admin.dashboard', compact('data'));
    }
}
