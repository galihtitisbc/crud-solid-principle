<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Modules\Post\Repository\PostRepository;
use App\Modules\Post\Repository\PostRepositoryImpl;
use App\Modules\Post\Service\PostService;
use App\Modules\Post\Service\PostServiceImpl;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Mockery\MockInterface;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    private $postService;
    public function setUp(): void
    {
        parent::setUp();
        $mock = Mockery::mock(PostRepository::class, function (MockInterface $mock) {
            $mock->shouldReceive([
                'getAllPost'    =>  [],
            ]);
        });
        $this->postService = new PostServiceImpl($mock);
    }
    public function test_post_index_assert_true()
    {
        $this->assertIsArray($this->postService->getAllPost());
    }
    public function test_create_data_post_true()
    {
        $response = $this->post('/api/store', [
            'judul'     =>  'testing',
            'isi'       =>  'testing isi'
        ]);
        $response->assertStatus(200);
    }
    public function test_create_data_post_false()
    {
        $response = $this->post('/api/store', [
            'judul'     =>  '',
            'isi'       =>  ''
        ]);
        $response->assertInvalid();
    }
    public function test_update_data_post_true()
    {
        $response = $this->put('/api/update/5', [
            'judul'     =>  'edit testing',
            'isi'       =>  'edit testing'
        ]);
        $response->assertStatus(200);
    }
    public function test_delete_data_post_true()
    {
        $response = $this->delete('/api/delete/5');
        $response->assertStatus(200);
    }
    public function test_delete_data_post_false()
    {
        $response = $this->delete('/api/delete/5');
        $response->assertStatus(404);
    }
}
