@extends('layouts.admin')

@section('title', 'Boolean Blog - Posts')
    


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="posts-container rounded p-5">
                <div>
                    <div>
                       <h1>{{ __('Posts') }}</h1>
                    </div>
                    <div class="my-2">
                        <a href="{{route("admin.posts.create")}}"><button type="button" class="btn btn-success">Nuovo Post</button></a>  
                    </div>
                </div>

                @if(session("msg"))
                    <div class="alert alert-success"> {{session("msg")}}</div>
                @endif

                <div class="row row-cols-1 mt-3 w-100">
                    @foreach ($posts as $post)
                        <div class="col">
                            <div class="card my-3">
                                <img src="{{$post->coverImg}}" class="card-img-top" alt="post_img">
                                <div class="card-body">
                                    <h4 class="card-title">{{$post->title}}</h4>
                                    <h5 class="card-subtitle mb-2 text-muted">{{$post->subtitle}}</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">By {{$post->user->name}}</h6>
                                    <p class="card-text">{!! $post->text !!}</p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <a href="{{ route('admin.posts.show', $post->id) }}" class="card-link text-decoration-none">Continua a leggere...</a>
                                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="card-link text-decoration-none">Modifica</a>
                                        </div>
                                        
                                        @include('admin.partials.delete_btn')
                                    </div>
                                </div>
                            </div>

                            
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
