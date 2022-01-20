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
            <label for="field_subtitle" class="form-label">Categoria</label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="" disabled selected hidden>Scegli una categoria...</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
                
            </select>
        </div>

        <div class="mb-4">
            <label for="field_text" class="form-label">Testo</label>
            <textarea class="form-control" id="field_text" name="text" rows="3" value="{{$post->text}}"></textarea>
        </div>

        <div>
            <button class="btn btn-danger" type="reset">Svuota</button>
            <button class="btn btn-success" type="submit">Invia</button>
        </div>
    </form>

    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

</div>

@endsection