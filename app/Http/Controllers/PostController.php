<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCreateRequest;
use App\Models\Post;
use App\Modules\Post\Service\PostService;
use Illuminate\Support\Facades\Auth;

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

    public function getPostById($id)
    {
        return $this->postService->getPostById($id);
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
