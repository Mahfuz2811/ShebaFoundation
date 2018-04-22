@extends('layouts.front_master')

@section('content')
    <div id="content">
        <section class="flexslider home">
            <ul class="slides">
                @foreach($sliders as $slider)
                <li><img style="width: 100%; height: 500px;" src="{{ url('uploads/images/slider/' . $slider->image) }}" alt="{{ $slider->title }}" />
                    <article class="slide-caption" style="float: right; background-color: rgba(0, 0, 0, 0);
    background: rgba(0, 0, 0, 0);">
                        @if(isset($slider->title))
                        <p style="font-size: 16px; font-weight: 500; color: #fff; margin: -7px;">{{ $slider->title }}</p>
                        @endif
                    </article>
                </li>
                @endforeach
            </ul>
        </section>
        <div class="container" style="text-align: justify; white-space: normal;">
            <div class="sixteen column" style="margin: 10px 0 30px 0">
                <h3 style="margin: 10px 0 10px 0;">{{ $about->title }}</h3>
                <p>
                    {!! substr($about->description, 0, 1024) !!}
                </p>
                <a href="{{ route('post', ['slug' => $about->slug]) }}" class="button gray">Read More</a>
            </div>
        </div>
        <div class="container">
            <div class="sixteen column" style="margin: 10px 0 30px 0">
                <img src="{{ url('demo/home1.jpg') }}" style="width: 100%;">
            </div>
        </div>
        {{--<div class="container floated">--}}
            {{--<div class="blank floated">--}}
                {{--<div class="four columns carousel-intro">--}}
                    {{--<section class="entire">--}}
                        {{--<h3>Recent Activities</h3>--}}
                        {{--<p>Adding portfolio entries with this shortcode is now easier then ever.</p>--}}
                    {{--</section>--}}
                    {{--<div class="carousel-navi">--}}
                        {{--<div id="work-prev" class="arl jcarousel-prev"><i class="icon-chevron-left"></i></div>--}}
                        {{--<div id="work-next" class="arr jcarousel-next"><i class="icon-chevron-right"></i></div>--}}
                    {{--</div>--}}
                    {{--<div class="clearfix"></div>--}}
                {{--</div>--}}
                {{--<section class="jcarousel recent-work-jc">--}}
                    {{--<ul>--}}
                        {{--@foreach($photos as $photo)--}}
                        {{--<li class="four columns">--}}
                            {{--<a href="" class="portfolio-item">--}}
                                {{--<figure>--}}
                                    {{--<img src="{{ $photo->image == 'gallery.png' ? url('demo/gallery.png') : url('uploads/images/gallery/' . $photo->image) }}"/>--}}
                                    {{--<figcaption class="item-description">--}}
                                        {{--<h5>{{ $photo->created_at->format('d M, Y') }}</h5>--}}
                                    {{--</figcaption>--}}
                                {{--</figure>--}}
                            {{--</a>--}}
                        {{--</li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--</section>--}}
            {{--</div>--}}
        {{--</div>--}}
        @if(count($newses) > 0)
            <div class="container">
                <div class="sixteen columns">
                    <h3 class="margin-1">Recent Post</h3>
                    <?php $i = 0; $count = count($newses) ?>
                    @foreach($newses as $news)

                        <iframe src="{{ $news->slug }}" width="468" height="350" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>

                    @endforeach
                </div>
            </div>
        @endif
        @if(count($blogs) > 0)
        <div class="container">
            <div class="sixteen columns">
                <h3 class="margin-1">Recent Blogs <span>/ <a href="">View All</a></span></h3>
                <?php $i = 0; $count = count($blogs) ?>
                @foreach($blogs as $blog)
                <div class="four columns {{ $i == 0 ? 'alpha' : '' }}{{ $i == $count - 1 ? 'omega' : '' }}">
                    <?php $i++; ?>
                    <article class="recent-blog">
                        <section class="date">
                            <span class="day">{{ $blog->created_at->format('d') }}</span>
                            <span class="month">{{ $blog->created_at->format('M') }}</span>
                        </section>
                        <h4><a href="{{ route('blog_post', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a></h4>
                        <p>{!! substr($blog->description, 0, 100) !!}</p>
                    </article>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
@endsection
