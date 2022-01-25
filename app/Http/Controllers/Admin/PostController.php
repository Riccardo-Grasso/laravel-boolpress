<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{

    private function generateSlug($title)
    {
        $slug = Str::slug($title);
        $alreadyExists = Post::where("slug", $slug)->first();
        $counter = 1;

        while ($alreadyExists) {
            $newSlug = $slug . "-" . $counter;

            $alreadyExists = Post::where("slug", $newSlug)->first();
            $counter++;

            if (!$alreadyExists) {
                $slug = $newSlug;
            }
        }

        return $slug;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(2);
        return view("admin.posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view("admin.posts.create", [
            "categories" => $categories,
            "tags" => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $post = new Post();

        $post->fill($request->all());
        $post->slug = $this->generateSlug($data['title ']);

        $post->author_id = Auth::user()->id;
        $post->save();

        $post->tags()->sync($data["tags"]);

        return redirect()->route("admin.posts.show", $post->slug)->with("msg", "Post creato correttamente");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where("slug", $slug)->first();
        return view("admin.posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where("slug", $slug)->first();
        $categories = Category::all();
        $tags = Tag::all();

        return view("admin.posts.edit", [
            "post" => $post,
            "categories" => $categories,
            "tags" => $tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $post = Post::where("slug", $slug)->first();
        $data = $request->all();
        $oldTitle = $post->title;

        $titleChanged = $oldTitle !== $data["title"];

        $post->update($data);

        if ($titleChanged) {
            $post->slug = $this->generateSlug($data["title"]);
            $post->save();
        }

        $post->tags()->sync($data["tags"]);

        return redirect()->route("admin.posts.show", $post->slug)->with("msg", "Post modificato correttamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where("slug", $slug)->first();
        $post->delete();
        return redirect()->route("admin.posts.index")->with("msg", "Post eliminato");
    }
}
