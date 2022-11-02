@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <h1 class="h1"><b>Update data</b></h1>
    <form action="{{ route('posts.update', $posts->id) }}" method="POST" id="test1">
    @method('PUT')
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="title" class="form-label">Your name</label>
            <input type="text" class="form-control" id="title" name="name" value="{{$posts->title}}">
            @error('title')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">What do you think about this project?</label>
            <textarea class="form-control" name="impressions" id="description" cols="20" rows="5">{{$posts->description}}</textarea>
            @if ($errors->has('impressions'))
                <span class="text-danger">{{ $errors->first('impressions') }}</span>
            @endif
        </div>
        <input type="hidden" name="id" value="{{ $posts->id }}">

        <button type="submit" class="btn btn-primary"><b>Submit</b></button>
        <script>
            console.log(document.getElementById("test1").action);
        </script>
    </form>
</div>

@endsection