@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <h1 class="h1"><b>Add Blog Your Impressions to This Website</b></h1>
    <form action="{{ route('posts.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="name" class="form-label">Your name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="impressions" class="form-label">What do you think about this project?</label>
            <textarea class="form-control"  name="impressions" id="impressions" cols="20" rows="5"></textarea>
        </div>

        <button type="submit" class="btn btn-primary"><b>Submit</b></button>
    </form>
</div>

@endsection