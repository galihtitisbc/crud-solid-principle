<?php

namespace App\Modules\Post\Repository;

use App\Models\Post;

class PostRepositoryImpl implements PostRepository
{
    public function getAllPost(): \Illuminate\Database\Eloquent\Collection
    {
        return Post::all();
    }

    public function getPostById($id)
    {
        return Post::findOrFail($id);
    }

    public function createPost($data)
    {
        return Post::create($data);
    }

    public function updatePost(Post $post, $data): bool
    {
        return $post->update($data);
    }

    public function deletePost(Post $post): ?bool
    {
        return $post->delete();
    }
}
