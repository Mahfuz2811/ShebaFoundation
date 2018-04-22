@extends('layouts.admin_master')

@section('title')
    Contact
@endsection

@section('content')

    {!! Form::open(['url' => route('admin_contact_store'), 'method' => 'post', 'files' => true, 'class' => 'form-horizontal']) !!}

    <div class="panel panel-default border-grey">
        <div class="panel-heading">
            <h6 class="panel-title">Update Contact Details</h6>
        </div>

        <div class="panel-body">
            <div class="row">
                <div style="margin-top: 40px;" class="col-md-12">
                    <fieldset class="content-group">
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Address Line 1</label>
                            <div class="col-lg-7">
                                <input name="address_line_1" type="text" value="{{ old('address_line_1') ? old('address_line_1') : $contact->address_line_1 }}" class="form-control" placeholder="Enter Address">
                                @if($errors->has('address_line_1'))
                                    <p class="help-block text-danger-800">{{ $errors->first('address_line_1') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Address Line 2</label>
                            <div class="col-lg-7">
                                <input name="address_line_2" type="text" value="{{ old('address_line_2') ? old('address_line_2') : $contact->address_line_2 }}" class="form-control" placeholder="Enter Address">
                                @if($errors->has('address_line_2'))
                                    <p class="help-block text-danger-800">{{ $errors->first('address_line_2') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Phone</label>
                            <div class="col-lg-7">
                                <input name="phone" type="text" value="{{ old('phone') ? old('phone') : $contact->phone }}" class="form-control" placeholder="Enter Phone">
                                @if($errors->has('phone'))
                                    <p class="help-block text-danger-800">{{ $errors->first('phone') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Email</label>
                            <div class="col-lg-7">
                                <input name="email" type="text" value="{{ old('email') ? old('email') : $contact->email }}" class="form-control" placeholder="Enter Email">
                                @if($errors->has('email'))
                                    <p class="help-block text-danger-800">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Website</label>
                            <div class="col-lg-7">
                                <input name="website" type="text" value="{{ old('website') ? old('website') : $contact->website }}" class="form-control" placeholder="Enter Website">
                                @if($errors->has('website'))
                                    <p class="help-block text-danger-800">{{ $errors->first('website') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Twitter</label>
                            <div class="col-lg-7">
                                <input name="twitter" type="text" value="{{ old('twitter') ? old('twitter') : $contact->twitter }}" class="form-control" placeholder="Enter Twitter Url">
                                @if($errors->has('twitter'))
                                    <p class="help-block text-danger-800">{{ $errors->first('twitter') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Facebook</label>
                            <div class="col-lg-7">
                                <input name="facebook" type="text" value="{{ old('facebook') ? old('facebook') : $contact->facebook }}" class="form-control" placeholder="Enter Facebook Url">
                                @if($errors->has('facebook'))
                                    <p class="help-block text-danger-800">{{ $errors->first('facebook') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Google Plus</label>
                            <div class="col-lg-7">
                                <input name="google_plus" type="text" value="{{ old('google_plus') ? old('google_plus') : $contact->google_plus }}" class="form-control" placeholder="Enter Google Plus Url">
                                @if($errors->has('google_plus'))
                                    <p class="help-block text-danger-800">{{ $errors->first('google_plus') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-3 text-right">Google Map Address</label>
                            <div class="col-lg-7">
                                <input name="gmap_address" type="text" value="{{ old('gmap_address') ? old('gmap_address') : $contact->gmap_address }}" class="form-control" placeholder="Enter Google Map Address">
                                @if($errors->has('gmap_address'))
                                    <p class="help-block text-danger-800">{{ $errors->first('gmap_address') }}</p>
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