@extends('dashboard')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{url('create')}}" method="get">
            @csrf
            <button class="btn btn-warning" type="submit">Create Blog</button>
        </form>
        <div class="row">
            <div class="col-lg-8">
                @foreach($posts as $posts)
                <div class="row mt-2">
                    <div class="col-lg-12 mb-5">
                        <div class="single-blog-item">
                            <table class="table">
                                <tr>
                                    <td>
                                        {{$posts->updated_at}}
                                    </td>
                                    <td>
                                        <form action="{{ route('blog.edit',[$posts->id])}}" method="get">
                                            @csrf
                                            <button class="btn btn-warning" type="submit">Update</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('blog.destroy',[$posts->id])}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                            @if($posts->image)
                            <img src="{{ asset('storage/blogpostimages/' . $posts->image)}}" class="img-fluid rounded">
                            @endif

                            <div class="blog-item-content bg-white p-5">

                                <h2 class="mt-3 mb-4"> {{$posts->title}}</h2>
                                <p>{{$posts->content}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
