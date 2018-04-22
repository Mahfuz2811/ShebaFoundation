@extends('layouts.front_master')

@section('content')
    <div id="content">
        <div class="container floated">
            <div class="sixteen floated page-title">
                <h2>{{ $news->title }}</h2>
            </div>
        </div>
        <div class="container floated">
            <div class="eleven floated">
                <article class="post">
                    <section class="date">
                        <span class="day">{{ $news->created_at->format('d') }}</span>
                        <span class="month">{{ $news->created_at->format('M') }}</span>
                    </section>
                    <section class="post-content">
                        <header class="meta">
                            <h2><a>{{ $news->title }}</a></h2>
                            <span><i class="halflings user"></i>By <a>{{ $news->createdBy->name }}</a></span>
                        </header>
                        <p>
                            {!! $news->description !!}
                        </p>
                    </section>
                </article>
                <div class="line"></div>
            </div>
        </div>
    </div>
@endsection