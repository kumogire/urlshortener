<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ShortenedUrlCollection;
use App\Models\ShortenedUrl;

class ShortenedUrls extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function store(Request $request)
    {
        $shortenedUrl = new ShortenedUrl([
            'url' => $request->get('url'),
            'shortcode' => $request->get('shortcode')
        ]);

        $shortenedUrl->save();

        return response()->json('success');
    }

    public function index()
    {
        return new ShortenedUrlCollection(ShortenedUrl::all());
    }

    public function edit($id)
    {
        $shortenedUrl = ShortenedUrl::find($id);
        return response()->json($shortenedUrl);
    }

    public function update($id, Request $request)
    {
        $shortenedUrl = ShortenedUrl::find($id);

        $shortenedUrl->update($request->all());

        return response()->json('Shortcode successfully updated');
    }

    public function delete($id)
    {
        $shortenedUrl = ShortenedUrl::find($id);

        $shortenedUrl->delete();

        return response()->json('Shortcode successfully deleted');
    }
}
