@extends('layouts.admin')

@section('title', 'Boolean Blog - Modifica Post')

@section('content')
<div class="container py-5" style="background-color: white">
    <h2 class="">Modifica i dati di {{ $post->title}}</h2> 

    <form action="{{route('admin.posts.update', $post->id)}}" method="post" class="w-50 mx-auto">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="field_title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="field_title" name="title" value="{{$post->title}}">
        </div>

        <div class="mb-4">
            <label for="field_subtitle" class="form-label">Sottotitolo</label>
            <input type="text" class="form-control" id="field_subtitle" name="subtitle" value="{{$post->subtitle}}">
        </div>

        <div class="mb-4">
            <label for="field_text" class="form-label">Testo</label>
            <input type="text" class="form-control" id="field_text" name="text" value="{{$post->text}}">
        </div>

        <div class="mb-4">
            <label for="field_author" class="form-label">Autore</label>
            <input type="text" class="form-control" id="field_author" name="author" value="{{$post->author}}">
        </div>

        <div>
            <button class="btn btn-danger" type="reset">Cancella</button>
            <button class="btn btn-success" type="submit">Invia</button>
        </div>
    </form>

</div>

@endsection