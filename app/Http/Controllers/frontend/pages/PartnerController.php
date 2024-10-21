<?php

namespace App\Http\Controllers\frontend\pages;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $banner = Banner::where('banner_type_id', '6')->get();
        $banner_carousel_count = Banner::where('banner_type_id', '6')->get();
        return view('frontend.pages.industry_partner',compact('banner','banner_carousel_count'));
    }
}
