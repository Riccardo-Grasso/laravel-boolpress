@extends('layouts.admin')

@section('title', 'Boolean Blog - Utenti')
    


@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            @foreach($usersList as $user)
                <div class="card w-100 mb-2">
                    <div class="card-body">
                        <h5 class="card-title"><strong>Username:</strong> {{$user->name}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted"><strong>Email:</strong> {{$user->email}}</h6>
    
                        <a href="{{route('admin.users.edit', $user->id)}}">
                            Modifica
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>



@endsection
