<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Resources\ShortenedUrlCollection;
use App\Models\ShortenedUrl;

class ShortenedUrlController extends Controller
{

    public function store(Request $request)
    {
        $shortenedUrl = new ShortenedUrl([
            'url' => $request->get('url'),
            'shortcode' => $this->shortcodeCreate()
        ]);

        $shortenedUrl->save();

        return response()->json(['id' => $shortenedUrl->id, 'shortcode' => $shortenedUrl->shortcode, 'url' => $shortenedUrl->url]);
    }


    public function index()
    {
        // Return an array for vue and sort newest to oldest
        return new ShortenedUrlCollection(ShortenedUrl::all()->sortByDesc("created_at"));
    }

    public function delete(Int $id)
    {
        $shortenedUrl = ShortenedUrl::find($id);

        $shortenedUrl->delete();

        return response()->json('Shortcode successfully deleted');
    }


    public function shortcodeCreate(): ?String {

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

    public function shortcodeCheck(String $shortcode): Bool{
        try {
            return ShortenedUrl::whereShortcode($shortcode)->exists();
        } catch (ModelNotFoundException $e) {
            return 0;
        }
    }
}
