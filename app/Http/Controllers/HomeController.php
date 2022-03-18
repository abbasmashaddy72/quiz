<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Blog;
use App\Models\Count;
use App\Models\Review;
use App\Models\Service;
use App\Models\Work;
use App\Services\Helper;

class HomeController extends Controller
{
    public function __construct()
    {
        // view()->share('google_business', Helper::get_static_option('google_business'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }
}
