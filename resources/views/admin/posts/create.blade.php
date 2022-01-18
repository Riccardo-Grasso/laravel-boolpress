@extends('layouts.admin')

@section('title', 'Boolean Blog - Nuovo Post')

@section('content')
<div class="container py-5" style="background-color: white">
    <h2 class="">Nuovo Post</h2> 

    <form action="{{route('admin.posts.store')}}" method="post" class="w-50 mx-auto">
        @csrf

        <div class="mb-4">
            <label for="field_title" class="form-label">Titolo</label>
            <input type="text" class="form-control" id="field_title" name="title">
        </div>

        <div class="mb-4">
            <label for="field_subtitle" class="form-label">Sottotitolo</label>
            <input type="text" class="form-control" id="field_subtitle" name="subtitle">
        </div>

        <div class="mb-4">
            <label for="field_text" class="form-label">Testo</label>
            <input type="text" class="form-control" id="field_text" name="text">
        </div>

        <div class="mb-4">
            <label for="field_author" class="form-label">Autore</label>
            <input type="text" class="form-control" id="field_author" name="author">
        </div>

        <div>
            <button class="btn btn-danger" type="reset">Cancella</button>
            <button class="btn btn-success" type="submit">Invia</button>
        </div>
    </form>

</div>

@endsection