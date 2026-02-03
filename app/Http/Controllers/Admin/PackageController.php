<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\PackageService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class PackageController extends Controller
{
    public function __construct(
        protected PackageService $packageService
    ) {}

    public function index(Request $request): View
    {
        $request->validate([
            'title' => 'nullable|string|max:100',
            'status' => 'nullable|in:-1,0,1',
        ]);

        $data = [
            'packages' => $this->packageService->getPackages([
                'title' => $request->title ?? null,
                'status' => $request->status ?? null,
            ]),
            'oldInputs' => $request->all(),
        ];

        return view('admin.pages.package.index', compact('data'));
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'nullable|string|max:30',
            'status' => 'required|in:-1,0,1',
            'image' => 'nullable|file',
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

        $isCreated = $this->packageService->create($request);

        if ($isCreated) {

            return response()->json([
                'status' => true,
                'code' => 200,
                'messages' => ['Package Created Successfully'],
                'errors' => null,
                'data' => null,
            ], 200);
        } else {

            return response()->json([
                'status' => false,
                'code' => 500,
                'messages' => ['Something went wrong'],
                'errors' => ['Something went wrong'],
                'data' => null,
            ], 500);
        }

    }

    public function edit(Request $request): View
    {
        $data = [
            'package' => $this->packageService->find($request->id),
        ];

        return view('admin.pages.package.edit', compact('data'));
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => 'required|integer',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'nullable|string|max:30',
            'status' => 'required|in:-1,0,1',
            'image' => 'nullable|file',
        ]);

        $isUpdated = $this->packageService->update($request);

        if ($isUpdated) {
            return redirect()->route('package.index')->with('success', 'Package Updated Successfully');
        } else {
            return redirect()->back()->withErrors('Something went wrong!');
        }
    }

    public function delete(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => 'required|int',
        ]);

        $isDeleted = $this->packageService->delete($request->id);

        if ($isDeleted) {
            return redirect()->back()->with('success', 'Package Deleted Successfully');
        } else {
            return redirect()->back()->withErrors('Something went wrong!');
        }

    }
}
