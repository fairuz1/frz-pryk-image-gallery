@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid mt-4">
    <div class="container">
        <h1 class="h1">{{$posts->title}}</h1>
        <small>Date: {{$posts->created_at}}</small>
        <p>{{$posts->description}}</p>

        <a href="/posts/{{$posts->id}}/edit" class="btn btn-primary"><b>Edit</b></a>
        <form action="{{ route('posts.destroy',$posts->id) }}" method="POST" id="deleteData">
            @method('DELETE')
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $posts->id }}"> <br/>
            
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>

@endsection