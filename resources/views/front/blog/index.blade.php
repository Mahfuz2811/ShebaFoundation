@extends('layouts.front_master')

@section('content')
    <div id="content">
        <div class="container floated">
            <div class="sixteen floated page-title">
                <h2>All Blogs</h2>
            </div>
        </div>
        <div class="container floated">
            <div class="eleven floated">
                @foreach($blogs as $blog)
                    <article class="post medium">
                        <section class="date">
                            <span class="day">{{ $blog->created_at->format('d') }}</span>
                            <span class="month">{{ $blog->created_at->format('M') }}</span>
                        </section>
                        <div class="medium-content">
                            <header class="meta">
                                <h2><a href="{{ route('blog_post', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a></h2>
                                <span><i class="halflings user"></i>By <a href="#">{{ $blog->createdBy->name }}</a></span>
                            </header>
                            <p>{!! substr($blog->description, 0, 200) !!}</p>
                            <a href="{{ route('blog_post', ['slug' => $blog->slug]) }}" class="button color">Read More</a>
                        </div>
                    </article>
                    <div class="line"></div>
                @endforeach
                <nav class="pagination">
                    <ul>
                        <li><a href="{{ $blogs->previousPageUrl() }}">Previous</a></li>
                        <li><a href="{{ $blogs->nextPageUrl() }}">Next</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </nav>
            </div>
            <div class="four floated sidebar right">
                <aside class="sidebar">
                    <nav class="widget" style="margin: 0;">
                        <h4>Categories</h4>
                        <ul class="categories">
                            <li><a href="{{ route('blog') }}">All</a></li>
                            @foreach($categories as $category)
                            <li><a href="{{ route('blog', ['slug' => $category->slug]) }}">{{ $category->title }}</a></li>
                            @endforeach
                        </ul>
                    </nav>
                </aside>
            </div>
        </div>
    </div>
@endsection