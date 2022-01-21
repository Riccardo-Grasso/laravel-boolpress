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
            <label for="field_category_id" class="form-label">Categoria</label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="" disabled selected hidden>Scegli una categoria...</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach  
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Tag</label>
        
            <select name="tags[]" class="form-control" multiple>
              @foreach($tags as $tag)
              <option value="{{$tag->id}}">{{$tag->name}}
              </option>
              @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="field_text" class="form-label">Testo</label>
            <textarea class="form-control" id="field_text" name="text" rows="3" value="ciao"></textarea>
        </div>

        <div class="mb-4">
            <label for="field_coverImg" class="form-label">Immagine di copertina</label>
            <input type="text" class="form-control" id="field_coverImg" name="coverImg">
        </div>

{{--         <div class="mb-4">
            <label for="field_author" class="form-label">Autore</label>
            <input type="text" class="form-control" id="field_author" name="author">
        </div> --}}

        <div>
            <button class="btn btn-danger" type="reset">Svuota</button>
            <button class="btn btn-success" type="submit">Invia</button>
        </div>
    </form>
    
    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
						

</div>

@endsection