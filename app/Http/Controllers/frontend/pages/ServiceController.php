<?php

namespace App\Http\Controllers\frontend\pages;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $banner = Banner::where('banner_type_id', '5')->get();
        $banner_carousel_count = Banner::where('banner_type_id', '5')->get();
        return view('frontend.pages.service',compact('banner','banner_carousel_count'));
    }
}
