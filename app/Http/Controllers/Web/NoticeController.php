<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Web\NoticeService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NoticeController extends Controller
{
    public function __construct(
        protected NoticeService $noticeService
    ) {}

    public function show(Request $request): View
    {
        $data = [
            'notice' => $this->noticeService->find($request->id),
            'extraNotices' => $this->noticeService->getNotices([
                'excludeId' => decrypt($request->id),
                'limit' => 6,
            ],
                ['id', 'title', 'created_at']),
        ];

        return view('web.pages.notice.show', compact('data'));
    }
}
