<?php

namespace App\View\Components;

use App\Models\Blog;
use App\Models\Career;
use App\Models\Event;
use App\Models\IndustryPartner;
use App\Models\Service;
use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
       //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $service = Service::count();
        $industry_partner = IndustryPartner::count();
        $career = Career::count();
        $event = Event::count();
        $blog = Blog::count();
        $recentBlogs = Blog::orderBy('created_at', 'Desc')->take(5)->get();
        $recentEvents = Event::orderBy('created_at', 'Desc')->take(5)->get();

        return view('components.sidebar',
            [
                'service' => $service,
                'industry_partner' => $industry_partner,
                'career' => $career,
                'event' => $event,
                'blog' => $blog,
                'recentBlogs' => $recentBlogs,
                'recentEvents' => $recentEvents,
            ]
        );
    }
}
