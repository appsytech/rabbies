<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Web\StaffHomepageMessageService;

class StaffHomepageMessageController extends Controller
{
    public function __construct(
        protected StaffHomepageMessageService $staffHomePageMessageService,
    ) {}

    public function show(string $id)
    {
        $data = [
            'message' => $this->staffHomePageMessageService->find($id),
        ];

        if (! $data['message']) {
            return redirect()->back()->withErrors('Staff Message Not Found');
        }

        return view('web.pages.staff-homepage-message.show', compact('data'));
    }
}
