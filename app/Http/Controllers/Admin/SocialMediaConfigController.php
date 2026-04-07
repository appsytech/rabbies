<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\SocialMediaConfigService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class SocialMediaConfigController extends Controller
{
    public function __construct(
        protected SocialMediaConfigService $socialMediaConfigService
    ) {}



    public function index(Request $request): View
    {
        $request->validate([
            'name' => 'nullable|string|max:100',
        ]);

        $data = [
            'configs' => $this->socialMediaConfigService->getSocialMediaConfigs([
                'name' => $request->name ?? null,
            ]),
            'oldInputs' => $request->all(),
        ];

        return view('admin.pages.social-media-config.index', compact('data'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'   => 'required|string|max:100',
            'icon'   => 'required|file',
            'link'   => 'required|url|max:255',
            'sort'   => 'required|integer|min:0',
            'status' => 'required|in:0,1',
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

        $response = $this->socialMediaConfigService->create($request);

        $code = $response['status'] ? 200 : 500;

        return response()->json([
            'status' => $response['status'],
            'code' => $code,
            'messages' => $response['message'],
            'errors' => null,
            'data' => null,
        ], $code);
    }

    public function edit(Request $request): View
    {
        $data = [
            'config' => $this->socialMediaConfigService->find($request->id),
        ];

        return view('admin.pages.social-media-config.edit', compact('data'));
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => 'required|integer',
            'name'   => 'required|string|max:100',
            'icon'   => 'nullable|file',
            'link'   => 'required|url|max:255',
            'sort'   => 'required|integer|min:0',
            'status' => 'required|in:0,1',
        ]);

        $response = $this->socialMediaConfigService->update($request);

        if ($response['status']) {
            return redirect()->route('social-media-config.index')->with('success', 'Social Media Config Updated Successfully');
        } else {
            return redirect()->back()->withErrors($response['message']);
        }
    }

    public function delete(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => 'required|int',
        ]);

        $isDeleted = $this->socialMediaConfigService->delete($request->id);

        if ($isDeleted) {
            return redirect()->back()->with('success', 'Social Media Config Deleted Successfully');
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

        $isUpdated = $this->socialMediaConfigService->updateStatus($request->id);

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
