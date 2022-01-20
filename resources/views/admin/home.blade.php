@extends('layouts.admin')

@section('title', 'Boolean Blog - Your Area')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                    <div class="card-header d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            {{ __('La mia Homepage') }}
                        </div>
                        <div>
                            <a class="card-link" href="{{route('admin.posts.index')}}"> <button type="button" class="btn btn-success"> POSTS </button> </a>
                        </div>
                    </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Benvenuto {{ Auth::user()->name }}!</p> 
                    <div>Per leggere la lista utenti clicca <a href="{{route('admin.users.index')}}">qui</a></div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
