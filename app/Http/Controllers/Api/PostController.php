<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function index(Request $request)
    {
        $postsList = Post::with("category")->with("user")->with("tags")->paginate($request->query("per_page"));

        /*         foreach ($postsList as $post) {
            $text = strip_tags($post->text);
            $post["text"] = strlen($text) > 300 ? substr($text, 0, 300) . "..." : $text;
        } */
        return $postsList;
    }
}
