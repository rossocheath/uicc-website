<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $banner = Banner::where('banner_type_id', '8')->get();
        $banner_carousel_count = Banner::where('banner_type_id', '8')->get();

        return view('frontend.pages.contact_us', compact('banner', 'banner_carousel_count'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email',
            'phone' => 'required|min:10',
            'subject' => 'required',
            'message' => 'required',
        ]);
        Contact::create($validated);

        return redirect()->back()
            ->with('success', 'Contact has been sent successfully.');
    }
}
