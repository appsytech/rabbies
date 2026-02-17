<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\AboutFeatureService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class AboutFeatureController extends Controller
{
    public function __construct(
        protected AboutFeatureService $aboutFeatureService
    ) {}




    public function index(Request $request): View
    {
        $request->validate([
            'title' => 'nullable|string|max:100',
            'status' => 'nullable|integer|in:ACTIVE,INACTIVE',
        ]);

        $data = [
            'features' => $this->aboutFeatureService->getAboutFeatures([
                'title' => $request->title ?? null,
                'status' => $request->status,
            ]),
            'oldInputs' => $request->all(),
        ];

        return view('admin.pages.about-feature.index', compact('data'));
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title'               => 'required|string|max:255',
            'icon'                => 'required|file',
            'description'         => 'required|string',
            'status'              => 'required|string|in:ACTIVE,INACTIVE',
            'sort'    => 'required|int|min:0'
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

        return $this->aboutFeatureService->create($request);
    }

    public function edit(Request $request): View
    {
        $data = [
            'feature' => $this->aboutFeatureService->find($request->id),
        ];

        return view('admin.pages.about-feature.edit', compact('data'));
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => 'required|integer',
            'title'               => 'required|string|max:255',
            'icon'                => 'nullable|file',
            'description'         => 'required|string',
            'status'              => 'required|string|in:ACTIVE,INACTIVE',
            'sort'    => 'required|int|min:0'
        ]);

        $isUpdated = $this->aboutFeatureService->update($request);

        if ($isUpdated) {
            return redirect()->route('about-feature.index')->with('success', 'About Us Feature Updated Successfully');
        } else {
            return redirect()->back()->withErrors('Something went wrong!');
        }
    }

    public function delete(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => 'required|int',
        ]);

        $isDeleted = $this->aboutFeatureService->delete($request->id);

        if ($isDeleted) {
            return redirect()->back()->with('success', 'About Us Feature Deleted Successfully');
        } else {
            return redirect()->back()->withErrors('Something went wrong!');
        }
    }
}
