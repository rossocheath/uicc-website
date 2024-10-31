<div class="col-lg-4">
    <div class="sidebar">
        <h3 class="sidebar-title">{{__('sidebar.search')}}</h3>
        <div class="sidebar-item search-form"> 
            <form action="">
                <input type="text">
                <button type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End sidebar search formn-->

        <h3 class="sidebar-title">{{__('sidebar.categories')}}</h3>
        <div class="sidebar-item categories">
            <ul>
                <li><a href="#">{{__('sidebar.service')}} <span>({{$service}})</span></a></li>
                <li><a href="#">{{__('sidebar.industry_partner')}} <span>({{$industry_partner}})</span></a></li>
                <li><a href="#">{{__('sidebar.career')}} <span>({{$career}})</span></a></li>
                <li><a href="#">{{__('sidebar.event')}} <span>({{$event}})</span></a></li>
                <li><a href="#">{{__('sidebar.publication')}} <span>({{$blog}})</span></a></li>
            </ul>
        </div><!-- End sidebar categories-->

        <h3 class="sidebar-title">{{__('sidebar.recent_publication')}}</h3>
        <div class="sidebar-item recent-posts">
            @foreach ($recentBlogs as $recentBlog)
                @if(Config::get('languages')[App::getLocale()]['display']==='English')
                <div class="post-item clearfix">
                    <img src="{{asset('storage/'. $recentBlog->image)}}" alt="">
                    <h4><a href="{{route('publication-show',$recentBlog->id)}}">{{$recentBlog->title_en}}</a></h4>
                    <time datetime="{{$recentBlog->created_at->format('F j, Y')}}">{{$recentBlog->created_at->diffForHumans()}}</time>
                </div>
                @endif
                @if(Config::get('languages')[App::getLocale()]['display']==='ខ្មែរ')
                <div class="post-item clearfix">
                    <img src="{{asset('storage/'. $recentBlog->image)}}" alt="">
                    <h4><a href="{{route('publication-show',$recentBlog->id)}}">{{$recentBlog->title_kh}}</a></h4>
                    <time datetime="{{$recentBlog->created_at->format('F j, Y')}}">{{$recentBlog->created_at->diffForHumans()}}</time>
                </div>
                @endif
            @endforeach
        </div><!-- End sidebar recent posts-->

        <h3 class="sidebar-title">{{__('sidebar.recent_event')}}</h3>
        <div class="sidebar-item recent-posts">
            @foreach ($recentEvents as $recentEvent)
                @if(Config::get('languages')[App::getLocale()]['display']==='English')
                <div class="post-item clearfix">
                    <img src="{{asset('storage/'. $recentEvent->image)}}" alt="">
                    <h4><a href="blog-single.html">{{$recentEvent->title_en}}</a></h4>
                    <time datetime="{{$recentEvent->created_at->format('F j, Y')}}">{{$recentEvent->created_at->diffForHumans()}}</time>
                </div>
                @endif
                @if(Config::get('languages')[App::getLocale()]['display']==='ខ្មែរ')
                <div class="post-item clearfix">
                    <img src="{{asset('storage/'. $recentEvent->image)}}" alt="">
                    <h4><a href="blog-single.html">{{$recentEvent->title_kh}}</a></h4>
                    <time datetime="{{$recentEvent->created_at->format('F j, Y')}}">{{$recentEvent->created_at->diffForHumans()}}</time>
                </div>
                @endif
            @endforeach
        </div><!-- End sidebar recent Event-->

        {{-- <h3 class="sidebar-title">Tags</h3>
        <div class="sidebar-item tags">
            <ul>
                <li><a href="#">App</a></li>
                <li><a href="#">IT</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Mac</a></li>
                <li><a href="#">Design</a></li>
                <li><a href="#">Office</a></li>
                <li><a href="#">Creative</a></li>
                <li><a href="#">Studio</a></li>
                <li><a href="#">Smart</a></li>
                <li><a href="#">Tips</a></li>
                <li><a href="#">Marketing</a></li>
            </ul>
        </div><!-- End sidebar tags--> --}}

    </div><!-- End sidebar -->

</div><!-- End blog sidebar -->
