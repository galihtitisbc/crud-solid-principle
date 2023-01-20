<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\PostCreateRequest;
use App\Modules\Post\Service\PostService;

class PostController extends Controller
{
    private $postService;

    function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        return response()->json([
            "status" => true,
            "data" => $this->postService->getAllPost()
        ]);
    }

    public function store(PostCreateRequest $request)
    {
        $data = $request->validated();
        return $this->postService->createPost($data);
    }

    public function update(Post $post, PostCreateRequest $request)
    {
        $data = $request->validated();
        return $this->postService->updatePost($post, $data);
    }

    public function delete(Post $post)
    {
        return $this->postService->deletePost($post);
    }
}
