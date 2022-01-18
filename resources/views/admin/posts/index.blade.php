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
                    <div>
                        <a href="{{route("admin.posts.create")}}"><button type="button" class="btn btn-success"> Nuovo Post</button></a>  
                    </div>

                </div>
            </div>
                
                
               {{--  <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
