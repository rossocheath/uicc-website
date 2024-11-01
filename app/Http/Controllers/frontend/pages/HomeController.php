<?php

namespace App\Http\Controllers\frontend\pages;

use App\Models\Event;
use App\Models\Banner;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\IndustryPartner;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $service = Service::query()->latest()->paginate(6);
        $event = Event::query()->latest()->paginate(3);
        $banner = Banner::where('banner_type_id', '1')->get();
        $banner_carousel_count = Banner::where('banner_type_id', '1')->get();
        $partners = IndustryPartner::all();
        return view('frontend.pages.home', compact('service', 'event','partners',
            'banner',
            'banner_carousel_count'
        ));
    }
}
