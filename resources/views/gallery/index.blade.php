@extends('layouts.app')

@section('content')

<style type="text/css">
    .pagination li{
        float: left;
        list-style-type: none;
        margin: 5px;
    }
</style>

<style type="text/css">
    .pagination li{
        float: left;
        list-style-type: none;
        margin: 5px;
    }
</style>

<div class="container mt-3">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0">Gallery</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right" style="background: white;">
                @if (Auth::guest())
                    <li class="breadcrumb-item"><a href="{{ url('login')}}" style="color: var(--calmBlack)">Login</a></li>
                    <li class="breadcrumb-item active">Gallery</li>
                @else
                    <li class="breadcrumb-item"><a href="{{ url('/Views') }}" style="color: var(--calmBlack)">Home</a></li>
                    <li class="breadcrumb-item active">Gallery</li>
                @endif
            </ol>
        </div>
    </div>
    
    <div class="row">
        @if (count($galleries)>0)
            @foreach ($galleries as $gallery)
                <div class="col">
                    <div>
                        <a href="{{asset('storage/posts_image/'.$gallery->picture)}}" class="example-image-link" data-lightbox="example-2" data-title="{{$gallery->description}}">
                            <img src="{{asset('storage/posts_image/'.$gallery->picture)}}" alt="image-1" class="example-image img-fluid mb-2">
                            {{-- {{asset('storage/posts_image/'.$posts->picture)}} --}}
                        </a>
                    </div>
                </div>
            @endforeach
        @else
            <h3 class="h3">Tidak ada data</h3>
        @endif
    
        <div class="d-flex">
            {{$galleries->links()}}
        </div>
    </div>
</div>

@endsection