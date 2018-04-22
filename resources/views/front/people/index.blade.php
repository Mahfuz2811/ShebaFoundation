@extends('layouts.front_master')

@section('content')
    <div id="content">
        <div class="container floated">
            <div class="sixteen floated page-title">
                <h2>{{ $category_data->title }}</h2>
            </div>
            <div class="eleven floated">
                @if(file_exists('demo/'.$post->slug.'.jpg'))
                    <img style="margin-top: 50px;" src="{{ url('demo/'.$post->slug.'.jpg') }}" style="width: 100%;">
                @endif
                <article class="post" style="text-align: justify; white-space: normal;">
                    <p>
                        {!! $post->description !!}
                    </p>
                </article>
            </div>
        </div>
        <div class="container floated">
            <div class="eleven floated">
                <div>
                    @foreach($peoples as $people)
                    <div class="three columns">
                        <a class="portfolio-item">
                            <figure>
                                <div class="picture"><img style="height: 180px; width: 350px;" src="{{ $people->image == "people.png" ? url('demo/'.$people->image) : url('uploads/images/people/'.$people->image) }}" alt=""/><div class="image-overlay-link"></div></div>
                                <figcaption class="item-description">
                                    <h5>{{ $people->name }}</h5>
                                    @if(isset($people->designation))
                                    <span>{{ $people->designation }}</span>
                                    @endif
                                    @if(isset($people->grade))
                                        <span>{{ $people->grade }}</span>
                                    @endif
                                </figcaption>
                            </figure>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection