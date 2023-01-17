<?php

namespace App\Modules\Post\Repository;

use App\Models\Post;

class PostRepositoryImpl implements PostRepository
{
    public function getAllPost()
    {
        return Post::all();
    }
    public function getPostById($id)
    {
        return Post::where('id', $id);
    }
    public function createPost($data)
    {
        return Post::create($data);
    }
    public function updatePost(Post $post, $data)
    {
        return $post->update($data);
    }
    public function deletePost(Post $post)
    {
        return $post->delete();
    }
}
