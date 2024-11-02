<?php

namespace App\Http\Controllers\frontend\pages;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $banner = Banner::where('banner_type_id', '5')->get();
        $banner_carousel_count = Banner::where('banner_type_id', '5')->get();
        $services = Service::all();
        return view('frontend.pages.service',compact('banner','banner_carousel_count','services'));
    }

    public function show($id){
        $services = Service::findOrFail($id);
        return view('frontend.pages.pages_detail.service_detail', compact('services'));
    }
}
