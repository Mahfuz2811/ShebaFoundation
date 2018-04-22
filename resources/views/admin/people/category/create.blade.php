@extends('layouts.admin_master')

@section('title')
    Category
@endsection

@section('content')

    {!! Form::open(['url' => route('admin_people_category_store'), 'method' => 'post', 'class' => 'form-horizontal']) !!}

    <!-- Content panel -->
    <div class="panel panel-default border-grey">
        <div class="panel-heading">
            <h6 class="panel-title">Create Category</h6>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <fieldset class="content-group">
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Title <span class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Enter Title">
                                @if($errors->has('title'))
                                    <p style="margin-top: 5px;" class="text-danger">{{ $errors->first('title') }}</p>
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
                    <a href="{{ route('admin_people_category_index') }}" class="btn border-indigo text-indigo-600 btn-flat btn-icon legitRipple"><i class="icon-arrow-left13 position-right"></i> Cancel</a>
                    <button type="submit" class="btn border-indigo text-indigo-600 btn-flat btn-icon legitRipple">Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- /content panel -->

    {!! Form::close() !!}

@endsection