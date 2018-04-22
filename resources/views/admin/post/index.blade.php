@extends('layouts.admin_master')

@section('title', 'Posts')

@section('content')
    <!-- Content panel -->
    <div class="panel panel-default border-grey">
        <div class="panel-heading">
            <h6 class="panel-title">All Posts</h6>
        </div>
        <table class="table datatable-pagination">
            <thead>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Created By</th>
                <th>Updated By</th>
                <th>Updated At</th>
                <th class="text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php $count = 1; ?>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->createdBy->name }}</td>
                    <td>{{ $post->updatedBy->name }}</td>
                    <td>{{ $post->updated_at->format('d/m/Y') }}</td>
                    <td class="text-center">
                        <ul class="icons-list">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="{{ route('admin_post_show', ['id' => $post->id]) }}"><i class="icon-zoomin3"></i> View</a></li>
                                    <li><a href="{{ route('admin_post_edit', ['id' => $post->id]) }}"><i class="icon-compose"></i> Edit</a></li>
                                </ul>
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
