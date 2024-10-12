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

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Categories</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Add Category</h6>
                    </div>
                    <div class="card-body">

                        <form method="post" action="{{ route('categories.update', $category) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3"><label for="exampleFormControlInput1">Name</label><input
                                    class="form-control" id="exampleFormControlInput1" type="text"
                                    placeholder="Category Name..." name="name" value="{{ $category->name }}"></div>

                            <div class="mb-3 py-5 float-right">
                                <button type="submit" class="btn btn-primary">Edit Category</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        @include('admin.footer')

    </div>
@endsection
