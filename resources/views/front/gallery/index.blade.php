@extends('layouts.front_master')

@section('content')
    <div id="content">
        <div class="container floated">
            <div class="sixteen floated page-title">
                @if(isset($category_data))
                <h2>{{ $category_data->title }}</h2>
                @else
                <h2>All Photos</h2>
                @endif
            </div>
        </div>
        <div class="container floated">
            <div class="eleven floated">
                <div>
                    @foreach($photos as $photo)
                    <div style="width: 300px !important;" class="ten columns">
                        <a class="portfolio-item">
                            <figure>
                                <div class="picture"><img style="height: 250px; width: 300px;" src="{{ $photo->image == 'gallery.png' ? url('demo/gallery.png') : url('uploads/images/gallery/'.$photo->image) }}" alt=""/><div class="image-overlay-link">
                            </figure>
                        </a>
                    </div>
                    @endforeach
                </div>
                <div class="clearfix"></div>
                <nav class="pagination">
                    <ul>
                        <li><a href="{{ $photos->previousPageUrl() }}">Previous</a></li>
                        <li><a href="{{ $photos->nextPageUrl() }}">Next</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </nav>
            </div>
            <div class="four floated sidebar right">
                <aside class="sidebar">
                    <nav class="widget" style="margin: 0;">
                        <ul class="categories">
                            @foreach($categories as $category)
                                <li><a href="{{ route('gallery', ['slug' => $category->slug]) }}">{{ $category->title }}</a></li>
                            @endforeach
                        </ul>
                    </nav>
                </aside>
            </div>
        </div>
    </div>
@endsection