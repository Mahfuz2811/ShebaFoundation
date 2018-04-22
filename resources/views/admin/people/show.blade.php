@extends('layouts.admin_master')
@section('title')
    People
@endsection

@section('content')
    <div class="panel panel-default border-grey">
        <div class="panel-heading">
            <h6 class="panel-title">People Details</h6>
        </div>

        <div class="panel-body">
            <div class="row">
                <div style="margin-top: 30px;" class="col-md-12">
                    <fieldset class="content-group">

                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Category: </label>
                            <div class="col-lg-7">
                                <p>{{ $people->category->title }}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Image: </label>
                            <div class="col-lg-7">
                                <p><img src="{{ $people->image == 'people.png' ? url('demo/people.png') : url('uploads/images/people/' . $people->image) }}" height="200" width="200"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Name: </label>
                            <div class="col-lg-7">
                                <p>{{ $people->name }}</p>
                            </div>
                        </div>
			
			@if(isset($people->designation))
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Designation: </label>
                            <div class="col-lg-7">
                                <p>{{ $people->designation }}</p>
                            </div>
                        </div>
                        @endif
			
			@if(isset($people->grade))
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Grade: </label>
                            <div class="col-lg-7">
                                <p>{{ $people->grade }}</p>
                            </div>
                        </div>
                        @endif

			@if(isset($people->bio))
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Bio: </label>
                            <div class="col-lg-7">
                                <p>{{ $people->bio }}</p>
                            </div>
                        </div>
                        @endif

                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Created By: </label>
                            <div class="col-lg-7">
                                <p>{{ $people->createdBy->name }}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Created At: </label>
                            <div class="col-lg-7">
                                <p>{{ $people->created_at->format('d/m/Y') }}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Updated By: </label>
                            <div class="col-lg-7">
                                <p>{{ $people->updatedBy->name }}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Updated At: </label>
                            <div class="col-lg-7">
                                <p>{{ $people->updated_at->format('d/m/Y') }}</p>
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
                </div>
            </div>
        </div>
    </div>
@endsection