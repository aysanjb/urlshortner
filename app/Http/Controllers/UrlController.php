<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Url;
use App\Models\Urls;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
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

        $rules = [
            'link' => ['required', 'regex:/^(?:https?:\/\/)?[a-zA-Z0-9-]+(?:\.[a-zA-Z]{2,})+(?:\/[^\s]*)?$/'],
        ];

        $messages = [
            'link.required' => 'The link field is required.',
            'link.url' => 'The link must be a valid URL.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 200);
        }

        $id = Auth::user()->id;
        $url = preg_replace('#^https?://#', '', $request->link);
        $urls = new Urls();
        $urls->original_url = $url;
        $urls->user_id = $id;
        $urls->shortener_url = Random::generate(5,'a-z');
        $urls->save();
        return response()->json(["status"=>"success","url"=>url($urls->shortener_url)]);
    }
}
