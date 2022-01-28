<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index(Request $request)
    {
        $limit = $request->query("limit");

        $postsList = Post::with("category")
            ->with("user")
            ->with("tags")
            ->orderBy("created_at", "DESC");

        if ($limit) {
            $postsList = $postsList->limit($limit)->get();
        } else {
            $postsList = $postsList->paginate(3);
        }

        foreach ($postsList as $post) {
            $text = strip_tags($post->text);
            $post["text"] = strlen($text) > 300 ? substr($text, 0, 300) . "..." : $text;
        }
        return $postsList;
    }

    public function show($slug)
    {
        $post = Post::where("slug", $slug)->first();

        return response()->json($post);
    }
}
