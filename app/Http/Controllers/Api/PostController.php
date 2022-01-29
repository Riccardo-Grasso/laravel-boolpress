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
        $category = $request->query("category");

        $postsList = Post::with("category")
            ->with("user")
            ->with("tags")
            ->orderBy("created_at", "DESC");

        if ($category) {
            $postsList = $postsList->where("category_id", $category);
        }

        if ($limit) {
            $postsList = $postsList->limit($limit)->get();
        } else {
            $postsList = $postsList->paginate(5);
        }

        foreach ($postsList as $post) {
            $text = strip_tags($post->text);
            $post["text"] = strlen($text) > 300 ? substr($text, 0, 300) . "..." : $text;
        }
        return $postsList;
    }

    public function show($slug)
    {
        $post = Post::where("slug", $slug)->with("user")->with("tags")->with("category")->first();


        return response()->json($post);
    }
}
