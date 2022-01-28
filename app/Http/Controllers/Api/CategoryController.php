<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class CategoryController extends Controller
{
    function index()
    {
        $categories = Category::orderBy("name")->get();

        return response()->json($categories);
    }

    function show($categoryId)
    {
        $category = Category::where("id", $categoryId)
            ->with(["posts", "posts.category", "posts.user", "posts.tags"])
            ->first();

        if (!$category) {
            throw new HttpException(404);
        }

        return $category;
    }
}
