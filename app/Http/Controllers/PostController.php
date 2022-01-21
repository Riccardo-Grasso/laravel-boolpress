<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    function index()
    {
        $postsList = Post::with("category")->with("user")->with("tags")->get();

        foreach ($postsList as $post) {
            $text = strip_tags($post->text);
            $post["text"] = strlen($text) > 300 ? substr($text, 0, 300) . "..." : $text;
        }
        return $postsList;
    }
}
