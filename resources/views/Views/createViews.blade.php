
@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <h1 class="h1">Add Views</h1>
    <form action="{{ route('Views.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="pageName" class="form-label">Page name</label>
            <input type="text" class="form-control" id="pageName" name="pageName">
        </div>
        <div class="mb-3">
            <label for="data" class="form-label">Description</label>
            <textarea class="form-control" name="data" id="data" cols="20" rows="10"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection