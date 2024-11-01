<?php

namespace App\Http\Controllers\frontend\pages;

use Carbon\Carbon;
use App\Models\Banner;
use App\Models\Career;
use App\Models\Applying;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class CareerController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $banner = Banner::where('banner_type_id', '7')->get();
        $banner_carousel_count = Banner::where('banner_type_id', '7')->get();
        $all_time = Career::where('date_end', '>=', Carbon::now()->toDateString())->get();
        $full_time = Career::where('job_nature', 'Full Time')->where('date_end', '>=', Carbon::now()->toDateString())->get();
        $part_time = Career::where('job_nature', 'Part Time')->where('date_end', '>=', Carbon::now()->toDateString())->get();
        $internship = Career::where('job_nature', 'Internship')->where('date_end', '>=', Carbon::now()->toDateString())->get();
        return view('frontend.pages.career',compact('banner','banner_carousel_count'),
    [
        'all_time' => $all_time,
        'full_time' => $full_time,
        'part_time' => $part_time,
        'internship' => $internship,
    ]);
    }
    public function show($id){
        $career = Career::findOrFail($id);
        return view('frontend.pages.pages_detail.career_detail',compact('career'));
    }

    public function store(Request $request)
    {
        $validated =$request->validate([
            'career_id' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required','min:10'],
            'file' => ['required','mimes:pdf,doc,docx'], 
            'cover_letter' => ['required'],
        ]);

        $validated['file'] = $request->file('file')->store('files','public');

        Applying::create($validated);

        return redirect()->back()
            ->with('success', 'Your application has been sent successfully.');
    }
}
