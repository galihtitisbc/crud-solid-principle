<?php

namespace App\Modules\Post\Repository;

use App\Models\Post;

interface PostRepository
{
    public function getAllPost();
    public function getPostById($id);
    public function createPost($data);
    public function updatePost(Post $post, $data);
    public function deletePost(Post $post);
}
