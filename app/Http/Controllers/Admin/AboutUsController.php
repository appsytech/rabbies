<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\AboutUsService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutUsController extends Controller
{
    public function __construct(
        protected AboutUsService $aboutUsService
    ) {}



    public function index(Request $request): View
    {
        $request->validate([
            'title' => 'nullable|string|max:100',
        ]);

        $data = [
            'aboutUs' => $this->aboutUsService->getAboutUs([
                'title' => $request->title ?? null,
            ]),
            'oldInputs' => $request->all(),
        ];

        return view('admin.pages.about-us.index', compact('data'));
    }


    public function edit(Request $request): View
    {
        $data = [
            'aboutus' => $this->aboutUsService->find($request->id),
        ];

        return view('admin.pages.about-us.edit', compact('data'));
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => 'required|integer',
            'title'       => 'required|string|max:255',
            'author'      => 'required|string|max:150',
            'description' => 'required|string',
            'images1'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'images2'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $isUpdated = $this->aboutUsService->update($request);

        if ($isUpdated) {
            return redirect()->route('about-us.index')->with('success', 'About us Updated Successfully');
        } else {
            return redirect()->back()->withErrors('Something went wrong!');
        }
    }
}
