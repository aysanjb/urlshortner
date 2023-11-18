<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Url;
use App\Models\Urls;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Random;

class UrlController extends Controller
{
    public function link($shortener_url)
    {

        $original = Urls::where('shortener_url',$shortener_url)->firstOrFail();

        return redirect()->away("https://".$original->original_url);
    }

    public function create(Request $request)
    {
        $id = Auth::user()->id;
        $url = $request->url;
        $urls = new Urls();
        $urls->original_url = $url;
        $urls->user_id = $id;
        $urls->shortener_url = Random::generate(5,'a-z');
        $urls->save();
        return redirect('home');
    }
}
