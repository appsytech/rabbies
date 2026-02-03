<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Web\PublicationService;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function __construct(
        protected PublicationService $publicationService
    ) {}

    public function show(Request $request)
    {
        $publication = $this->publicationService->find($request->id);

        if (! $publication) {
            return redirect()->back()->withErrors('Publication Dont Exists');
        }

        $data = [
            'publication' => $publication,
            'relatedPublications' => $this->publicationService->getPublications([
                'exceptId' => $publication->id,
                'limit' => 5,
            ], ['id', 'title', 'author', 'created_at', 'thumbnail']),
        ];

        return view('web.pages.publication.show', compact('data'));
    }
}
