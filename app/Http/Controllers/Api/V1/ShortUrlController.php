<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShortUrlRequest;
use App\Http\Requests\UpdateShortUrlRequest;
use App\Http\Resources\ShortUrlResource;
use App\Models\ShortUrl;

class ShortUrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShortUrlRequest $request)
    {

        if (request()->user()->cannot('create', ShortUrl::class)) {
            return response()->json([
                'error' => "You must be logged in to the system",
                'login_url' => route('api.login'),
            ], 403);
        }
        $data = $request->validated();
        $createdUrl = ShortUrl::create($data);
        if ($createdUrl) {
            $short_url = base_convert($createdUrl->id * 100, 10, 36);
            $createdUrl->update([
                'short_url' => url($short_url),
            ]);
        }

        return new ShortUrlResource(ShortUrl::with('user')->find($createdUrl->id));
    }
}
