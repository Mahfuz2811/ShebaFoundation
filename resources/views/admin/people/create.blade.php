@extends('layouts.admin_master')

@section('title')
    People
@endsection

@section('content')

    {!! Form::open(['url' => route('admin_people_store'), 'method' => 'post', 'class' => 'form-horizontal', 'files' => 'true']) !!}

    <!-- Content panel -->
    <div class="panel panel-default border-grey">
        <div class="panel-heading">
            <h6 class="panel-title">Create People</h6>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <fieldset class="content-group">
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Category <span class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <select name="people_category_id" data-placeholder="Select Category" class="select">
                                    <option></option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('people_category_id') == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('people_category_id'))
                                    <p style="margin-top: 5px;" class="text-danger">{{ $errors->first('people_category_id') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Image</label>
                            <div class="col-lg-7">
                                <input name="image" type="file" class="file-styled">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Name <span class="text-danger">*</span></label>
                            <div class="col-lg-7">
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Name">
                                @if($errors->has('name'))
                                    <p style="margin-top: 5px;" class="text-danger">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Designation</label>
                            <div class="col-lg-7">
                                <input type="text" name="designation" value="{{ old('designation') }}" class="form-control" placeholder="Enter Designation">
                                @if($errors->has('designation'))
                                    <p style="margin-top: 5px;" class="text-danger">{{ $errors->first('designation') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Grade</label>
                            <div class="col-lg-7">
                                <input type="text" name="grade" value="{{ old('grade') }}" class="form-control" placeholder="Enter Grade">
                                @if($errors->has('grade'))
                                    <p style="margin-top: 5px;" class="text-danger">{{ $errors->first('grade') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Bio</label>
                            <div class="col-lg-7">
                                <textarea name="bio" class="form-control" placeholder="Enter Bio" cols="30" rows="10">{{ old('bio') }}</textarea>
                                @if($errors->has('bio'))
                                    <p style="margin-top: 5px;" class="text-danger">{{ $errors->first('bio') }}</p>
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
                    <a href="{{ route('admin_people_index') }}" class="btn border-indigo text-indigo-600 btn-flat btn-icon legitRipple"><i class="icon-arrow-left13 position-right"></i> Cancel</a>
                    <button type="submit" class="btn border-indigo text-indigo-600 btn-flat btn-icon legitRipple">Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </div>
        </div>
    </div>
    <!-- /content panel -->

    {!! Form::close() !!}

@endsection