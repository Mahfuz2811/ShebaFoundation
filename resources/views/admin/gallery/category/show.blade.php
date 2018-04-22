@extends('layouts.admin_master')

@section('title')
    Category
@endsection

@section('content')
    <div class="panel panel-default border-grey">
        <div class="panel-heading">
            <h6 class="panel-title">Category Details</h6>
        </div>

        <div class="panel-body">
            <div class="row">
                <div style="margin-top: 30px;" class="col-md-12">
                    <fieldset class="content-group">

                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Category Title: </label>
                            <div class="col-lg-7">
                                <p>{{ $category->title }}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Category Slug: </label>
                            <div class="col-lg-7">
                                <p>{{ $category->slug }}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Created By: </label>
                            <div class="col-lg-7">
                                <p>{{ $category->createdBy->name }}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Created At: </label>
                            <div class="col-lg-7">
                                <p>{{ $category->created_at->format('d/m/Y') }}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Updated By: </label>
                            <div class="col-lg-7">
                                <p>{{ $category->updatedBy->name }}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Updated At: </label>
                            <div class="col-lg-7">
                                <p>{{ $category->updated_at->format('d/m/Y') }}</p>
                            </div>
                        </div>

                    </fieldset>

                </div>
            </div>
        </div>

        <div class="panel-footer">
            <div class="heading-elements">
                <div class="heading-btn pull-right">
                    <a href="{{ route('admin_gallery_category_index') }}" class="btn border-indigo text-indigo-600 btn-flat btn-icon legitRipple"><i class="icon-arrow-left13 position-right"></i> Cancel</a>
                </div>
            </div>
        </div>
    </div>
@endsection