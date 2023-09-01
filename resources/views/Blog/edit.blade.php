@extends('dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Blog') }}</div>
                <div class="card-body">
                    <form action="{{ route('blog.update', $blog->id) }}"  enctype = "multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <div class=" row  mt-2">
                            <div class="col h3 text-center">
                                <p>Edit your Blog post </p>
                                <input type="hidden" name="token" value="{{ csrf_token() }}">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <label for = "title">Blog Title</label>
                            </div>
                            <div class="col">
                                <input type = "text" id = "title" name = "title" class="form-control" value = "{{$blog->title}}">
                                @error('title')
                                <p class="invalid-feedback d-block" > {{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <label for = "blogImage">Blog Image</label>
                            </div>
                            <div class="col">
                                <input type = "file" name = "blogImage" class="form-control" value = "{{$blog->image}}">
                                @error('blogImage')
                                <p class="invalid-feedback d-block" > {{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <label for = "content">Blog Content</label>
                            </div>
                            <div class="col">
                                <textarea class="form-control" id="content" name="content" rows="10">{{$blog->content}}</textarea>
                                @error('content')
                                <p class="invalid-feedback d-block" > {{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <label for="status">Status</label>
                            </div>
                            <div class="col">
                                <select id="status" name="status" class="form-control">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                                @error('status')
                                <p class="invalid-feedback d-block">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col text-center ">
                                <input type = "submit"  id = "submit" class="btn btn-outline-info text-white" value = "POST" style="background-color: #00FF00;">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
