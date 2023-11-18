<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Urls;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Random;

class HomeController extends Controller
{
    public function index()
    {
        $userid= Auth::user()->id;
        $urls = User::where('id',$userid)->first()->url->all();
        return view('home')->with('urls',$urls);
    }

}
