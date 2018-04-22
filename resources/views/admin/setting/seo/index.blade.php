@extends('setting::layouts.master')

@section('title')
    Seo
@endsection

@section('content')

    {!! Form::open(['url' => route('admin_seo_store'), 'method' => 'post', 'files' => true, 'class' => 'form-horizontal']) !!}

    <div class="panel panel-default border-grey">
        <div class="panel-heading">
            <h6 class="panel-title">Update Seo Data</h6>
        </div>

        <div class="panel-body">
            <div class="row">
                <div style="margin-top: 40px;" class="col-md-12">
                    <fieldset class="content-group">
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Logo</label>
                            <div class="col-lg-7">
                                <input name="logo" type="file" class="file-styled">
                                <p class="help-block">Image Size: (270px X 100px)</p>
                                <div style="margin-top: 20px;">
                                    <img src="{{ url('uploads/images/logo/' . $seo->logo) }}" style="width: 270px; height: 100px;">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Title</label>
                            <div class="col-lg-7">
                                <input name="title" type="text" value="{{ old('title') ? old('title') : $seo->title }}" class="form-control" placeholder="Enter Site Title">
                                @if($errors->has('title'))
                                    <p class="help-block text-danger-800">{{ $errors->first('title') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Author</label>
                            <div class="col-lg-7">
                                <input name="author" type="text" value="{{ old('author') ? old('author') : $seo->author }}" class="form-control" placeholder="Enter Site Author">
                                @if($errors->has('author'))
                                    <p class="help-block text-danger-800">{{ $errors->first('author') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Keywords</label>
                            <div class="col-lg-7">
                                <input name="keywords" type="text" value="{{ old('keywords') ? old('keywords') : $seo->keywords }}" class="form-control" placeholder="Enter Site Keywords">
                                @if($errors->has('keywords'))
                                    <p class="help-block text-danger-800">{{ $errors->first('keywords') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Description</label>
                            <div class="col-lg-7">
                                <textarea name="description" class="form-control" placeholder="Enter Site Description" rows="10">
                                    {{ old('description') ? old('description') : $seo->description }}
                                </textarea>
                                @if($errors->has('description'))
                                    <p class="help-block text-danger-800">{{ $errors->first('description') }}</p>
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
                    <button type="submit" class="btn border-indigo text-indigo-600 btn-flat btn-icon legitRipple">Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}

@endsection

@section('script')

    <script>
        $(document).ready(function(){
            $("#gallery").on("click", ".delete", function () {
                var url = $(this).next('.delete_url').val();
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    showCloseButton: true,
                    animation: false,
                    customClass: 'animated tada',
                    timer: 15000
                }).then(function () {
                    window.location.href = url;
                })
            });
        });
    </script>

@endsection