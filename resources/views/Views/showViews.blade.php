@extends('layouts.app')
@section('content')

{!! $views->pageData !!}

<div class="alert alert-primary alert-dismissible fade show login-alert" role="alert">
    @if (session('status'))
        <div class="alert alert-primary" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <h4 class="alert-heading"><b>Welcome to ShowViews Page!</b></h4>
    <p> Congratulation <b>{{ Auth::user()->name }}</b>! You have successfuly accessed <b>{{$views->page}}</b> from database using controller!</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    
    {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
</div>
@endsection