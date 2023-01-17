<?php

namespace App\Modules\Post\Service;

use App\Models\Post;

interface PostService
{
    public function getAllPost();
    public function getPostById($id);
    public function createPost($data);
    public function updatePost(Post $post, $data);
    public function deletePost(Post $post);
}
