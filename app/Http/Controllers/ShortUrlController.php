<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShortUrlRequest;
use App\Http\Requests\UpdateShortUrlRequest;
use App\Models\ShortUrl;

class ShortUrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->user()->cannot('viewAny', ShortUrl::class)) {
            return redirect()->back()->with('error', "You can't view urls");
        }
        $urls = ShortUrl::with('user')->paginate(2);
        // dd($urls);
        return view('short-url.index', compact('urls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (request()->user()->cannot('create', ShortUrl::class)) {
            return redirect()->back()->with('error', "You can't create urls");
        }
        return view('short-url.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShortUrlRequest $request)
    {
        if (request()->user()->cannot('create', ShortUrl::class)) {
            return redirect()->back()->with('error', "You can't create urls");
        }
        $data = $request->validated();
        $createdUrl = ShortUrl::create($data);
        if ($createdUrl) {
            $short_url = base_convert($createdUrl->id * 100, 10, 36);
            $createdUrl->update([
                'short_url' => $short_url,
            ]);
        }

        return redirect()->route('short-url.index')->with('success', 'Short url created...');
    }

    /**
     * Display the specified resource.
     */
    public function show(ShortUrl $shortUrl)
    {
        if (request()->user()->cannot('view', $shortUrl)) {
            return redirect()->back()->with('error', "You can't view this url");
        }
        return view('short-url.show', compact('shortUrl'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShortUrl $shortUrl)
    {
        if (request()->user()->cannot('delete', $shortUrl)) {
            return redirect()->back()->with('error', "You can't delete this url");
        }
        $shortUrl->delete();
        return redirect()->route('short-url.index')->with('success', 'Short url deleted succesfully...');
    }

    public function visit(String $short_url)
    {
        $short_url = ShortUrl::where('short_url', $short_url)->first();
        $short_url->update([
            'visits' => $short_url->visits + 1,
        ]);
        return redirect()->to($short_url->url);
    }
}
