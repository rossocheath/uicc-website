<?php

namespace App\Http\Controllers\frontend\pages;

use App\Models\Blog;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $banner = Banner::where('banner_type_id', '3')->get();
        $banner_carousel_count = Banner::where('banner_type_id', '3')->get();
        $blogs = Blog::orderBy('id', 'desc')->paginate(4);
        return view('frontend.pages.blog',compact('banner','banner_carousel_count','blogs'));    
    }
    public function show($id){
        $blogs = Blog::findOrFail($id);
        return view('frontend.pages.pages_detail.blog_detail', compact('blogs'));
    }
}
