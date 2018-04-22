@extends('layouts.front_master')

@section('content')
    <div id="content">
        <div class="container floated">
            <div class="sixteen floated page-title">
                <h2>{{ $blog->title }}</h2>
            </div>
        </div>
        <div class="container floated">
            <div class="eleven floated">
                <article class="post">
                    <section class="date">
                        <span class="day">{{ $blog->created_at->format('d') }}</span>
                        <span class="month">{{ $blog->created_at->format('M') }}</span>
                    </section>
                    <section class="post-content">
                        <header class="meta">
                            <h2><a>{{ $blog->title }}</a></h2>
                            <span><i class="halflings user"></i>By <a>{{ $blog->createdBy->name }}</a></span>
                        </header>
                        <p>
                            {!! $blog->description !!}
                        </p>
                    </section>
                </article>
                <div class="line"></div>
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