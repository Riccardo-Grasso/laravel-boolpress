<form action="{{ route("admin.posts.destroy", $post->slug)}}" method="post" class="form-delete">
    @csrf
    @method("delete")
    
    <button type="submit" class="btn btn-danger">Elimina</button>
</form>