@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <h3 class="text-center my-2">Sending Email</h3>
    <div class="col-md-4 p-4">
        @if (session('status'))
            <div class="alert alert-primary" role="alert">{{session('status')}}</div>
        @endif
    </div>

    <form action="{{ route('post-email') }}" method="POST">
        {{ csrf_field() }}
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" maxlength="50">
        </div>
        <div class="mb-3">
            <label for="descriptions" class="form-label">Descriptions</label>
            <input type="text" class="form-control" id="descriptions" name="email" maxlength="50">
        </div>
        <div class="mb-3">
            <label for="emailBody" class="form-label">Email Destinations</label>
            <textarea class="form-control" name="emailBody" id="data" cols="10" rows="10"></textarea>
        </div>

        <button type="submit" class="btn btn-primary" style="font-size: 1em;"><b>Send</b></button>
        <button type="button" class="btn btn-secondary ms-2" style="font-size: 1em;" data-dismiss="modal"><b>Cancel</b></button>
    </form>
</div>

@endsection