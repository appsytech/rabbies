<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Web\PackageService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PackageController extends Controller
{
    public function __construct(
        protected PackageService $packageService
    ) {}

    public function index(): View
    {
        $data = [
            'packages' => $this->packageService->getPackages([
                'paginateLimit' => 6
            ])
        ];

        return view('web.pages.package.index', compact('data'));
    }

    public function show(Request $request)
    {
        $package = $this->packageService->find($request->id);

        if (! $package) {
            return redirect()->back()->withErrors('Package Dont Exists');
        }

        $data = [
            'package' => $package,
            'relatedPackages' => $this->packageService->getPackages([
                'exceptId' => $package->id,
                'limit' => 5,
            ], ['id', 'title', 'author', 'created_at', 'image']),
        ];

        return view('web.pages.package.show', compact('data'));
    }
}
