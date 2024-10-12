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
                <h1 class="h3 mb-2 text-gray-800">Posts</h1>
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
                        <h6 class="m-0 font-weight-bold text-primary">Add Post</h6>
                    </div>
                    <div class="card-body">

                        <form method="post" action="{{ route('posts.store') }}">
                            @csrf


                            <input type="hidden" name="user_id" value={{ Auth::id() }}>
                            <div class="mb-3"><label for="exampleFormControlInput1">Title</label><input
                                    class="form-control" id="exampleFormControlInput1" type="text"
                                    placeholder="Post Title..." name="title"></div>



                            <div class="mb-0"><label for="exampleFormControlTextarea1">Content</label>
                                <textarea class="form-control" id="contentArea" rows="3" name="content"></textarea>
                            </div>

                            <div class="mb-3"><label for="exampleFormControlInput1">Category</label><input
                                    class="form-control" id="exampleFormControlInput1" type="text" name="category_id"
                                    placeholder="Category..."></div><!-- live search -->

                            <div class="mb-3"><label for="exampleFormControlInput1">Tags</label><input name="tags"
                                    class="form-control" id="exampleFormControlInput1" type="text" placeholder="Tags">
                            </div>


                            <div class="mb-3 py-5 float-right">
                                <button type="submit" class="btn btn-primary">Add Post</button>
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
