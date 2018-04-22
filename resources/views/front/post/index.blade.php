@extends('layouts.front_master')

@section('content')
    <div id="content">
        <div class="container floated">
            <div class="sixteen floated page-title">
                <h2>{{ $post->title }}</h2>
            </div>
        </div>
        <div class="container floated">
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
    </div>
@endsection