@extends('layouts.front_master')

@section('content')
    <div id="content">
        <div class="container floated">
            <div class="sixteen floated page-title">
                <h2>All News & Notices</h2>
            </div>
        </div>
        <div class="container floated">
            <div class="eleven floated">
                @foreach($newses as $news)
                <article class="post medium">
                    <section class="date">
                        <span class="day">{{ $news->created_at->format('d') }}</span>
                        <span class="month">{{ $news->created_at->format('M') }}</span>
                    </section>
                    <div class="medium-content">
                        <header class="meta">
                            <h2><a href="{{ route('news_post', ['slug' => $news->slug]) }}">{{ $news->title }}</a></h2>
                            <span><i class="halflings user"></i>By <a href="#">{{ $news->createdBy->name }}</a></span>
                        </header>
                        <p>{!! substr($news->description, 0, 200) !!}</p>
                        <a href="{{ route('news_post', ['slug' => $news->slug]) }}" class="button color">Read More</a>
                    </div>
                </article>
                <div class="line"></div>
                @endforeach

                <nav class="pagination">
                    <ul>
                        <li><a href="{{ $newses->previousPageUrl() }}">Previous</a></li>
                        <li><a href="{{ $newses->nextPageUrl() }}">Next</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </nav>
            </div>
            <div class="four floated sidebar right">
                <aside class="sidebar">
                    <nav class="widget" style="margin: 0;">
                        <h4>Important Links</h4>
                        <ul class="categories">
                            <li><a href="#">Our Blog</a></li>
                            <li><a href="#">News & Notice</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </nav>
                </aside>
            </div>
        </div>
    </div>
@endsection