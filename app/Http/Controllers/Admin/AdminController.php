<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\AdminService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function __construct(
        protected AdminService $adminService
    ) {}

    public function index(Request $request): View
    {
        $request->validate([
            'name' => 'nullable|string|max:100',
            'username' => 'nullable|string|max:100',
        ]);

        $data = [
            'admins' => $this->adminService->getAdmins([
                'name' => $request->name ?? null,
                'userName' => $request->username,
            ]),
            'oldInputs' => $request->all(),
        ];

        return view('admin.pages.admin.index', compact('data'));
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admins,email',
            'username' => 'nullable|string|max:100|unique:admins,username',
            'phone' => 'nullable|string',
            'password' => 'nullable|string|min:8|max:40|confirmed',
            'admin_role' => 'required|in:1,2,3,4,5',
            'status' => 'required|in:0,1',
            'profile_image' => 'nullable',
            'description' => 'nullable|string',
            'sort' => 'required|int|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'code' => 422,
                'messages' => ['Validation Error'],
                'errors' => $validator->errors()->all(),
                'data' => null,
            ], 422);
        }

        return $this->adminService->create($request);
    }

    public function edit(Request $request): View
    {
        $data = [
            'admin' => $this->adminService->find($request->id),
        ];

        return view('admin.pages.admin.edit', compact('data'));
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => 'required|integer',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'username' => 'nullable|string|max:100',
            'phone' => 'nullable|string',
            'password' => 'nullable|string|min:8|confirmed',
            'admin_role' => 'required|in:1,2,3,4,5',
            'status' => 'required|in:0,1',
            'profile_image' => 'nullable',
            'description' => 'nullable|string',
            'sort' => 'required|int|min:0'
        ]);

        $isUpdated = $this->adminService->update($request);

        if ($isUpdated) {
            return redirect()->route('admin.index')->with('success', 'Admin Updated Successfully');
        } else {
            return redirect()->back()->withErrors('Something went wrong!');
        }
    }

    public function delete(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => 'required|int',
        ]);

        $isDeleted = $this->adminService->delete($request->id);

        if ($isDeleted) {
            return redirect()->back()->with('success', 'Admin Deleted Successfully');
        } else {
            return redirect()->back()->withErrors('Something went wrong!');
        }
    }

    public function updateStatus(Request $request): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|integer',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
                'data' => null,
            ], 422);
        }

        $isUpdated = $this->adminService->updateStatus($request->id);

        if ($isUpdated) {
            return response()->json([
                'status' => true,
                'message' => 'Status Updated',
                'errors' => null,
                'data' => null,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Something went wrong',
                'errors' => null,
                'data' => null,
            ], 500);
        }
    }
}
