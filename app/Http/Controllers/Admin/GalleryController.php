<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\GalleryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function __construct(
        protected GalleryService $galleryService
    ) {}

    public function index(Request $request): View
    {
        $request->validate([
            'title' => 'nullable|string|max:100',
            'type' => 'nullable|in:images,video',
        ]);

        $data = [
            'images' => $this->galleryService->getGalleryImages([
                'title' => $request->title ?? null,
                'type' => $request->type ?? null,
            ]),
            'oldInputs' => $request->all(),
        ];

        return view('admin.pages.gallery.index', compact('data'));
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:2000',
            'status' => 'required|boolean',
            'sort' => 'required|integer|min:0',
            'media' => ['required', 'file',
                function ($attribute, $file, $fail) use ($request) {
                    $type = $request->type;

                    if ($type === 'images') {
                        validator(
                            ['media' => $file],
                            ['media' => 'image|max:2048']
                        )->validate();
                    }

                    if ($type === 'video') {
                        validator(
                            ['media' => $file],
                            ['media' => 'mimetypes:video/mp4,video/quicktime,video/x-msvideo|max:15360']
                        )->validate();
                    }
                }, ],

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

        $isCreated = $this->galleryService->create($request);

        if ($isCreated) {

            return response()->json([
                'status' => true,
                'code' => 200,
                'messages' => ['Gallery Image Created Successfully'],
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
            'image' => $this->galleryService->find($request->id),
        ];

        return view('admin.pages.gallery.edit', compact('data'));
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => 'required|integer',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:2000',
            'status' => 'required|boolean',
            'sort' => 'required|integer|min:0',
            'media' => ['nullable', 'file',
                function ($attribute, $file, $fail) use ($request) {
                    $type = $request->type;

                    if ($type === 'images') {
                        validator(
                            ['media' => $file],
                            ['media' => 'image|max:2048']
                        )->validate();
                    }

                    if ($type === 'video') {
                        validator(
                            ['media' => $file],
                            ['media' => 'mimetypes:video/mp4,video/quicktime,video/x-msvideo|max:15360']
                        )->validate();
                    }
                }, ],
        ]);

        $isUpdated = $this->galleryService->update($request);

        if ($isUpdated) {
            return redirect()->route('gallery.index')->with('success', 'Gallery Image updated successfully');
        } else {
            return redirect()->back()->withErrors('Something went wrong!');
        }
    }

    public function updateStatus(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(),
            [
                'id' => 'required|integer',
            ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
                'data' => null,
            ], 422);
        }

        $isUpdated = $this->galleryService->updateStatus($request->id);

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

    public function delete(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => 'required|int',
        ]);

        $isDeleted = $this->galleryService->delete($request->id);

        if ($isDeleted) {
            return redirect()->back()->with('success', 'Gallery Image Deleted Successfully');
        } else {
            return redirect()->back()->withErrors('Something went wrong!');
        }

    }
}
