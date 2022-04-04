<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ShortenedUrlCollection;
use App\Models\ShortenedUrl;
use phpDocumentor\Reflection\Types\Boolean;

class ShortenedUrlController extends Controller
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
            'shortcode' => $this->shortcodeCreate()
        ]);

        $shortenedUrl->save();

        return response()->json('success');
    }


    public function index()
    {
        return new ShortenedUrlCollection(ShortenedUrl::all());
    }


    public function edit(Int $id)
    {
        $shortenedUrl = ShortenedUrl::find($id);
        return response()->json($shortenedUrl);
    }


    public function update(Int $id, Request $request)
    {
        $shortenedUrl = ShortenedUrl::find($id);

        $shortenedUrl->update($request->all());

        return response()->json('Shortcode successfully updated');
    }


    public function delete(Int $id)
    {
        $shortenedUrl = ShortenedUrl::find($id);

        $shortenedUrl->delete();

        return response()->json('Shortcode successfully deleted');
    }


    public function shortcodeCreate(): String|Null {

        $shortcode = $this->shortcodeGenerator(8);
        if($this->shortcodeCheck($shortcode) == true){
            $this->shortcodeCreate();
        }else{
            return $shortcode;
        }
        return Null;
    }

    public function shortcodeGenerator(int $strength): String {

        // No special characters, please
        $permittedCharacters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $inputLength = strlen($permittedCharacters);
        $randomCode = '';
        for($i = 0; $i < $strength; $i++) {
            $randomCharacter = $permittedCharacters[random_int(0, $inputLength - 1)];
            $randomCode .= $randomCharacter;
        }

        return $randomCode;
    }

    public function shortcodeCheck(String $shortcode): Boolean{
        try{
            ShortenedUrl::whereShortcode($shortcode)->exists();
            return true;
        } catch (ModelNotFoundException $e) {
            return false;
        }
    }
}
