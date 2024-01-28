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
        return view('short-url.index', ['urls' => ShortUrl::where('user_id', auth()->id())->paginate(2)]);
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
        ShortUrl::create($data);
        return redirect()->route('short-url.index')->with('success', 'Short url created...');
    }

    /**
     * Display the specified resource.
     */
    public function show(ShortUrl $shortUrl)
    {
        if (request()->user()->cannot('view', $shortUrl)) {
            return redirect()->back()->with('error', "You can't view urls");
        }
        return view('short-url.show', compact('shortUrl'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShortUrl $shortUrl)
    {
        if (request()->user()->cannot('edit', $shortUrl)) {
            return redirect()->back()->with('error', "You can't edit this url");
        }
        return view('short-url.edit', compact('shortUrl'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShortUrlRequest $request, ShortUrl $shortUrl)
    {
        if (request()->user()->cannot('edit', $shortUrl)) {
            return redirect()->back()->with('error', "You can't edit this url");
        }
        $shortUrl->update($request->validated());
        return redirect()->route('short-url.index')->with('success', "Short url updated succesfully...");
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
}
