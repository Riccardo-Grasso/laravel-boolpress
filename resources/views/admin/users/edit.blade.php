@extends('layouts.admin')

@section('title', 'Modifica utente')

@section('content')
<div class="container">
    <form action="{{ route('admin.users.update', $user->id) }}" method="POST"
  class="mb-5">
  @csrf
  @method('put')

  <div class="form-group">
    <label class="form-label">Nome</label>
    <input id="name" type="text"
      class="form-control @error('name') is-invalid @enderror" name="name"
      value="{{ $user->name }}" required autocomplete="name">

    @error('name')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="form-group">
    <label class="form-label">Email</label>
    <input id="email" type="email"
      class="form-control @error('email') is-invalid @enderror" name="email"
      value="{{ $user->email }}" required autocomplete="email">

    @error('email')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
    @enderror
  </div>

  <div class="d-flex">

    <a href="{{route('admin.users.index')}}"
      class="btn btn-danger mr-3" type="reset">Annulla</a>
    <button class="btn btn-success" type="submit">Salva</button>
  </div>

</form>
</div>

@endsection