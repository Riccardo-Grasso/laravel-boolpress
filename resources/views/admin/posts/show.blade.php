@extends('layouts.admin')

@section('title', "Boolean Blog - Dettagli post: " . $post->title)
    


@section('content')
<div class="container p-5 rounded" style="background-color: white">
    <img src="{{$post->coverImg}}" alt="post-img" class="w-100 mb-3">
    <div>
        <div class="d-flex justify-content-between">
            <h1 class="card-title">{{$post->title}}</h1>

            <div><span class="badge bg-primary" style="color: white">{{$post->category->name}}</span></div>
        </div>                        
        <h5 class="card-subtitle mb-2 text-muted">{{$post->subtitle}}</h5>
        <h6 class="card-subtitle mb-2 text-muted">Scritto da {{$post->user->name}}</h6>
        <p class="card-text my-3">{!! $post->text !!}</p>
        <div class="d-flex align-items-center justify-content-between">
        <div>
            <a href="{{ route('admin.posts.edit', $post->id) }}" class="card-link text-decoration-none">Modifica</a>
            </div>
            @include('admin.partials.delete_btn')
        </div>
    </div>
</div>
@endsection