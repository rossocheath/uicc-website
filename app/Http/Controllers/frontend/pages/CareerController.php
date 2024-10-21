<?php

namespace App\Http\Controllers\frontend\pages;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $banner = Banner::where('banner_type_id', '7')->get();
        $banner_carousel_count = Banner::where('banner_type_id', '7')->get();
        return view('frontend.pages.career',compact('banner','banner_carousel_count'));
    }
}
