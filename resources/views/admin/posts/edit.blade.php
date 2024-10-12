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
                        <h6 class="m-0 font-weight-bold text-primary">Edit Post</h6>
                    </div>
                    <div class="card-body">

                        <form method="post" action="{{ route('posts.update', $post) }}/">
                            @csrf
                            @method('PUT')


                            <input type="hidden" name="user_id" value={{ $post->user_id }}>
                            <div class="mb-3"><label for="exampleFormControlInput1">Title</label><input
                                    class="form-control" id="exampleFormControlInput1" type="text"
                                    placeholder="Post Title..." name="title" value="{{ $post->title }}"></div>



                            <div class="mb-0"><label for="exampleFormControlTextarea1">Content</label>
                                <textarea class="form-control" id="contentArea" rows="3" name="content">{{ $post->content }}</textarea>
                            </div>

                            <div class="mb-3"><label for="exampleFormControlTextarea1">Category</label>
                                <select name="category_id" class="form-control" id="categories">
                                    @forelse ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            @if ($category->id == $post->category_id) selected @endif>{{ $category->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>

                            <div class="mb-3"><label for="exampleFormControlInput1">Tags</label><input name="tags"
                                    class="form-control" id="exampleFormControlInput1" type="text" placeholder="Tags"
                                    value="{{ $post->tags }}">
                            </div>


                            <div class="mb-3 py-5 float-right">
                                <button type="submit" class="btn btn-primary">Edit Post</button>
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
