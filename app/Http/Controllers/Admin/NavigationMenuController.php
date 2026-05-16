<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\NavigationMenuService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class NavigationMenuController extends Controller
{
    public function __construct(
        protected NavigationMenuService $navigationMenuService
    ) {}


    public function index(Request $request): View
    {
        $request->validate([
            'type' => 'nullable|string|in:HOME,ABOUT,ACTIVITY,CONTACT,BLOG,NEWS',
        ]);

        $data = [
            'navigations' => $this->navigationMenuService->getNavigationMenus([
                'type' => $request->type ?? null,
            ]),
            'oldInputs' => $request->all(),
        ];

        return view('admin.pages.navigation-menu.index', compact('data'));
    }


    public function edit(Request $request): View
    {
        $data = [
            'navigation' => $this->navigationMenuService->find($request->id),
        ];

        return view('admin.pages.navigation-menu.edit', compact('data'));
    }


    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => 'required|integer',
            'title' => 'required|string|max:255',
            'status' => 'required|in:0,1',
            'sort' => 'required|integer|min:0',
        ]);

        $response = $this->navigationMenuService->update($request);

        if ($response['status']) {
            return redirect()->route('navigation-menu.index')->with('success', 'Navigation Menu Updated Successfully');
        } else {
            return redirect()->back()->withErrors($response['message']);
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

        $isUpdated = $this->navigationMenuService->updateStatus($request->id);

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
