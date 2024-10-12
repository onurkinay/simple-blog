@extends('layouts.admin')


@section('content')
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            @include('admin.topbar')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">
                @session('success')
                    <div class="alert alert-success" role="alert">
                        {{ $value }}
                    </div>
                @endsession

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Posts</h1>
                <p class="mb-4"> <a name="" id="" class="btn btn-primary" href="{{ route('posts.create') }}"
                        role="button">Add Post</a>
                </p>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Posts</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>User</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>

                                    </tr>
                                </tfoot>
                                <tbody>
                                    @forelse ($posts as $post)
                                        <tr>
                                            <th>{{ $post->id }}</th>
                                            <th>{{ $post->title }}</th>
                                            <th>{{ $post->user->name }}</th>
                                            <th>{{ $post->created_at }}</th>
                                            <th>
                                                <a href="{{ route('posts.edit', $post->id) }}"> <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('posts.destroy', $post->id) }}" method="post"
                                                    id="form-id-{{ $post->id }}" style="display: inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="#"
                                                        onclick="document.getElementById('form-id-{{ $post->id }}').submit();">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </form>
                                            </th>
                                        </tr>
                                    @empty
                                        <tr>
                                            <th colspan="4">No record found!</th>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        @include('admin.footer')

    </div>
@endsection
