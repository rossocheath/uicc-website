<?php

namespace App\Http\Controllers\frontend\pages;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $service_en = Service::query()->latest()->paginate(6);
        $service_kh = Service::query()->latest()->paginate(6);
        $banner = Banner::where('banner_type_id', '1')->get();
        $banner_carousel_count = Banner::where('banner_type_id', '1')->get();

        return view('frontend.pages.home', compact('service_en', 'service_kh',
            'banner',
            'banner_carousel_count'
        ));
    }
}
