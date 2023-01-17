<?php

namespace App\Modules\Post\Service;

use App\Models\Post;
use App\Modules\Post\Repository\PostRepository;

class PostServiceImpl implements PostService
{
	private $postRepository;
	function __construct(PostRepository $postRepository)
	{
		$this->postRepository = $postRepository;
	}
	public function getAllPost()
	{
		return $this->postRepository->getAllPost();
	}
	public function getPostById($id)
	{
		return $this->postRepository->getPostById($id);
	}
	public function createPost($data)
	{
		try {
			$this->postRepository->createPost($data);
			return response()->json([
				'status'	=>	true,
				'message'	=> "Sukses Tambah Post"
			]);
		} catch (\Throwable $th) {
			return response()->json([
				'status'	=>	false,
				'code'		=> $th->getCode(),
				'message'	=> $th->getMessage()
			]);
		}
	}
	public function updatePost(Post $post, $data)
	{
		try {
			$this->postRepository->updatePost($post, $data);
			return response()->json([
				'status'	=>	true,
				'message'	=> "Sukses Update Post"
			]);
		} catch (\Throwable $th) {
			return response()->json([
				'status'	=>	false,
				'code'		=> $th->getCode(),
				'message'	=> $th->getMessage()
			]);
		}
	}
	public function deletePost(Post $post)
	{
		try {
			$this->postRepository->deletePost($post);
			return response()->json([
				'status'	=>	true,
				'message'	=> "Sukses Delete Post"
			]);
		} catch (\Throwable $th) {
			return response()->json([
				'status'	=>	false,
				'code'		=> $th->getCode(),
				'message'	=> $th->getMessage()
			]);
		}
	}
}
