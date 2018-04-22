@extends('layouts.admin_master')

@section('title')
    Gallery
@endsection

@section('content')

    {!! Form::open(['url' => route('admin_gallery_store', ['id' => $id]), 'method' => 'post', 'files' => true, 'class' => 'form-horizontal']) !!}

    <div class="panel panel-default border-grey">
        <div class="panel-heading">
            <h6 class="panel-title">Upload Photos</h6>
        </div>

        <div class="panel-body">
            <div class="row">
                <div style="margin-top: 40px;" class="col-md-12">
                    <fieldset class="content-group">
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Image</label>
                            <div class="col-lg-7">
                                <input name="image" type="file" class="file-styled">
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
                    <button type="submit" class="btn border-indigo text-indigo-600 btn-flat btn-icon legitRipple">Submit <i class="icon-arrow-right14 position-right"></i></button>
                </div>
            </div>
        </div>
    </div>

    {!! Form::close() !!}

    @if(count($photos) > 0)
    <div style="margin-top: 20px;" class="panel panel-default border-grey">
        <div class="panel-heading">
            <h6 class="panel-title">All Photos</h6>
        </div>
        <div class="panel-body">
            <div class="row" id="gallery">
                @foreach($photos as $photo)
                <div class="col-lg-3 col-sm-6">
                    <div class="thumbnail">
                        <div class="thumb">
                            <img style="height: 200px; width: 300px;" src="{{ $photo->image == 'gallery.png' ? url('demo/gallery.png') : url('uploads/images/gallery/' . $photo->image) }}" alt="">
                            <div class="caption-overflow">
                                <span>
                                    <a href="{{ $photo->image == 'gallery.png' ? url('demo/gallery.png') : url('uploads/images/gallery/' . $photo->image) }}" data-popup="lightbox" rel="gallery" class="btn border-white text-white btn-flat btn-icon btn-rounded"><i class="icon-plus3"></i></a>
                                    <a class="delete btn border-white text-white btn-flat btn-icon btn-rounded ml-5"><i class="icon-close2"></i></a>
                                    <input class="delete_url" type="hidden" value="{{ route('admin_gallery_delete', ['id' => $photo->id]) }}">
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

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