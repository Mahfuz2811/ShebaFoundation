@extends('layouts.admin_master')

@section('title')
    Blog
@endsection

@section('content')
    <div class="panel panel-default border-grey">
        <div class="panel-heading">
            <h6 class="panel-title">All News</h6>
            <div class="heading-elements">
                <div class="heading-btn pull-right">
                    <a href="{{ route('admin_news_create') }}" type="button" class="btn border-indigo text-indigo-800 btn-flat btn-icon legitRipple">Add New <i class="icon-add position-right"></i></a>
                </div>
            </div>
        </div>
        <table id="datatable" class="table datatable-pagination">
            <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Updated By</th>
                <th>Updated At</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php $count = 1; ?>
            @foreach($newses as $news)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $news->title }}</td>
                    <td>{{ $news->updatedBy->name }}</td>
                    <td>{{ $news->updated_at->format('d/m/Y') }}</td>
                    <td class="text-center">
                        <ul class="icons-list">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="{{ route('admin_news_show', ['id' => $news->id]) }}"><i class="icon-zoomin3"></i> View</a></li>
                                    <li><a href="{{ route('admin_news_edit', ['id' => $news->id]) }}"><i class="icon-compose"></i> Edit</a></li>
                                    <li>
                                        <a class="delete"><i class="icon-close2"></i> Delete</a>
                                        <input class="delete_url" type="hidden" value="{{ route('admin_news_delete', ['id' => $news->id]) }}">
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- /content panel -->

@endsection

@section('style')

    <style>
        .navigation:last-child {
            padding-bottom: 20px !important;
        }
    </style>

@endsection

@section('script')

    <script>
        $( document ).ready(function() {
            $('#category').addClass("active");
            $('#all_category').addClass("active");
        });
    </script>

    <script>
        $(document).ready(function(){
            $("#datatable").on("click", ".delete", function () {
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