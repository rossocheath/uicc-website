<?php

namespace App\Http\Controllers\frontend\pages;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Event;

class EventController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $banner = Banner::where('banner_type_id', '2')->get();
        $banner_carousel_count = Banner::where('banner_type_id', '2')->get();
        $events = Event::orderBy('id', 'desc')->paginate(4);

        return view('frontend.pages.event', compact('banner', 'banner_carousel_count', 'events'));
    }

    public function show($id)
    {
        $events = Event::findOrFail($id);

        return view('frontend.pages.pages_detail.event_detail', compact('events'));
    }
}
