@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <h1 class="h1"><b>Update data</b></h1>
    <form action="{{ route('posts.resizeImage', $posts->id) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $posts->id }}">

        <div class="mb-3">
            <label for="input-file" class="form-label">Choose file</label>
            <input class="form-control" type="file" id="input-file" name="picture" value="{{ $posts->picture }}" disabled>
        </div>

        <button type="submit" class="btn btn-primary"><b>Submit</b></button>
    </form>
</div>

<div class="container mt-5" style="max-width: 550px">
    <h2 class="mb-5">Laravel Image Resize Example</h2>     
    <form action="{{route('resizeImage')}}" method="post" enctype="multipart/form-data">
        @csrf
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <strong>{{ $message }}</strong>
        </div>

        <div class="col-md-12 mb-3">
            <strong>Grayscale Image:</strong><br/>
            <img src="/uploads/{{ Session::get('fileName') }}" width="550px" />
        </div>
        @endif
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="custom-file">
            <input type="file" name="file" class="custom-file-input" id="chooseFile">
            <label class="custom-file-label" for="chooseFile">Select file</label>
        </div>
        <button type="submit" name="submit" class="btn btn-outline-danger btn-block mt-4">
            Upload
        </button>
    </form>
</div>

@endsection