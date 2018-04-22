@extends('layouts.admin_master')

@section('title', 'Posts')
    
@section('content')
    {!! Form::open(['url' => route('admin_post_update', ['id' => $post->id]), 'method' => 'post', 'class' => 'form-horizontal form-validate-jquery']) !!}
    <div class="panel panel-default border-grey">
        <div class="panel-heading">
            <h6 class="panel-title">Edit Post</h6>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <fieldset class="content-group">
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Post Title <span class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <input type="text" name="title" value="{{ old('title') ? old('title') : $post->title }}" class="form-control" placeholder="Enter Semester Name">
                                @if($errors->has('title'))
                                    <p class="text-danger-600 mt-5"> {{ $errors->first('title') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Description <span class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <textarea class="ckeditor" name="description" class="form-control" cols="30" rows="10">{{ old('description') ? old('description') : $post->description }}</textarea>
                                @if($errors->has('description'))
                                    <p class="text-danger-600 mt-5"> {{ $errors->first('description') }}</p>
                                @endif
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>

        <div class="panel-footer">
            <div class="heading-elements">
                <div class="heading-btn pull-right">
                    <a href="{{ route('admin_post_index') }}" class="btn border-indigo text-indigo-800 btn-flat btn-icon legitRipple"><i class="icon-arrow-left13 position-right"></i> Cancel</a>
                    <button type="submit" class="btn border-indigo text-indigo-800 btn-flat btn-icon legitRipple">Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- /content panel -->

    {!! Form::close() !!}

@endsection
