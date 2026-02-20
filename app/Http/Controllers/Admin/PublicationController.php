<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\PublicationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class PublicationController extends Controller
{
    public function __construct(
        protected PublicationService $publicationService
    ) {}

    public function index(Request $request): View
    {
        $request->validate([
            'type' => 'nullable|string|max:100',
            'author' => 'nullable|string|max:200',
        ]);

        $data = [
            'publications' => $this->publicationService->getPublications([
                'type' => $request->type ?? null,
                'author' => $request->author,
            ]),
            'oldInputs' => $request->all(),
        ];

        return view('admin.pages.publication.index', compact('data'));
    }

    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:30',
            'status' => 'required|in:0,1',
            'document' => 'nullable|file',
            'thumbnail' => 'required|file',
            'description' => 'nullable|string',
            'sort'               => 'required|integer|min:0'
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

        $isCreated = $this->publicationService->create($request);

        if ($isCreated) {

            return response()->json([
                'status' => true,
                'code' => 200,
                'messages' => ['Publication Created Successfully'],
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
            'publication' => $this->publicationService->find($request->id),
        ];

        return view('admin.pages.publication.edit', compact('data'));
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => 'required|integer',
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:30',
            'status' => 'required|in:0,1',
            'document' => 'nullable|file',
            'thumbnail' => 'nullable|file',
            'description' => 'nullable|string',
            'sort'               => 'required|integer|min:0'
        ]);

        $isUpdated = $this->publicationService->update($request);

        if ($isUpdated) {
            return redirect()->route('publication.index')->with('success', 'Publication Updated Successfully');
        } else {
            return redirect()->back()->withErrors('Something went wrong!');
        }
    }

    public function delete(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => 'required|int',
        ]);

        $isDeleted = $this->publicationService->delete($request->id);

        if ($isDeleted) {
            return redirect()->back()->with('success', 'Publication Deleted Successfully');
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

        $isUpdated = $this->publicationService->updateStatus($request->id);

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
