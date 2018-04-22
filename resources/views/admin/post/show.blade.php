@extends('layouts.admin_master')

@section('title', 'Posts')

@section('content')
    <div class="panel panel-default border-grey">
        <div class="panel-heading">
            <h6 class="panel-title">Show Post</h6>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <fieldset class="content-group">
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Title:</label>
                            <div class="col-lg-7">
                                <p>{{ $post->title }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Description:</label>
                            <div class="col-lg-7">
                                <p>{!! $post->description !!}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Created At:</label>
                            <div class="col-lg-7">
                                <p>{{ $post->created_at->format('d/m/Y') }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Updated At:</label>
                            <div class="col-lg-7">
                                <p>{{ $post->updated_at->format('d/m/Y') }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Created By:</label>
                            <div class="col-lg-7">
                                <p>{{ $post->createdBy->name }}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Updated By:</label>
                            <div class="col-lg-7">
                                <p>{{ $post->updatedBy->name }}</p>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="heading-elements">
                <div class="heading-btn pull-right">
                    <a href="{{ route('admin_post_index') }}" class="btn border-indigo text-indigo-800 btn-flat btn-icon legitRipple"><i class="icon-arrow-left13 position-right"></i> Go Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
