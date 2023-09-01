@extends('dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Blog') }}</div>
                <div class="card-body">
                    <form id = "myform" action = "{{url('blog')}}" enctype = "multipart/form-data" method = "post">
                        @csrf
                        <div class=" row  mt-2">
                            <div class="col h3 text-center">
                                <p>Create your Blog post </p>
                                <input type="hidden" name="token" value="{{ csrf_token() }}">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col">
                                <label for = "title">Blog Title</label>
                            </div>
                            <div class="col">
                                <input type = "text" id = "title" name = "title" class="form-control" value = "{{old('title')}}">
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
                                <input type = "file" name = "blogImage" class="form-control" value = "{{old('blogImage')}}">
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
                                <textarea class="form-control" id="content" name="content" rows="10">{{old('content')}}</textarea>
                                @error('content')
                                <p class="invalid-feedback d-block" > {{$message}}</p>
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
