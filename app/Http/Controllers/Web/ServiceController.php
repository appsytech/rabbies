<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Web\ServiceService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function __construct(
        protected ServiceService $ServiceService
    ) {}
    public function show(Request $request)
    {
        $service = $this->ServiceService->find($request->id);

        $data = [
            'service' => $service,
            'relatedServices' => $this->ServiceService->getServices([
                'exceptId' => $service->id,
                'limit' => 5,
            ], ['id', 'icon', 'title', 'created_at', 'created_by']),
        ];

        return view('web.pages.services-details', compact('data'));
    }
}
