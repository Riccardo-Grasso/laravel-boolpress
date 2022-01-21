@extends('layouts.admin')

@section('title', "Boolean Blog - Dettagli post: " . $post->title)
    


@section('content')
<div class="container p-5 rounded" style="background-color: white">
    <div class="mb-4">
        <a class="card-link" href="{{route('admin.posts.index')}}"> <button type="button" class="btn btn-success"> POSTS </button> </a>
    </div>
    <img src="{{$post->coverImg}}" alt="post-img" class="w-100 mb-3">
    <div>
        <div class="d-flex justify-content-between">
            <h1 class="card-title">{{$post->title}}</h1>
            <div>
                <div><strong><em> Categoria: {{$post->category->name}}</em></strong></div>
                <div>
                    @foreach ($post->tags as $tag)
                    <span class="badge bg-success" style="color: white">{{$tag->name}}</span>
                    @endforeach
                </div>
            </div>
            
        </div>                        
        <h5 class="card-subtitle mb-2 text-muted">{{$post->subtitle}}</h5>
        <h6 class="card-subtitle mb-2 text-muted"> <em> Scritto da {{$post->user->name}}</em></h6>
        <h6 class="card-subtitle mb-2 text-muted"> <em>{{$post->created_at}}</em></h6>
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