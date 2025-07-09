<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Post;

class PostHttpMethodsTest extends TestCase
{
    use RefreshDatabase;

    public function test_get_posts()
    {
        Post::factory()->count(2)->create();
        $response = $this->get('/posts');
        $response->assertStatus(200);
    }

    public function test_post_create_post()
    {
        $response = $this->postJson('/posts', [
            'title' => 'Test',
            'content' => 'Content',
        ]);
        $response->assertStatus(201)->assertJsonFragment(['title' => 'Test']);
    }

    public function test_put_update_post()
    {
        $post = Post::factory()->create();
        $response = $this->putJson("/posts/{$post->id}", [
            'title' => 'Updated',
            'content' => 'Updated Content',
        ]);
        $response->assertStatus(200)->assertJsonFragment(['title' => 'Updated']);
    }

    public function test_delete_post()
    {
        $post = Post::factory()->create();
        $response = $this->delete("/posts/{$post->id}");
        $response->assertStatus(204);
    }

    public function test_patch_post()
    {
        $post = Post::factory()->create();
        $response = $this->patchJson("/posts/{$post->id}", [
            'title' => 'Patched',
        ]);
        $response->assertStatus(200)->assertJsonFragment(['title' => 'Patched']);
    }

    public function test_head_post()
    {
        $post = Post::factory()->create();
        $response = $this->call('HEAD', "/posts/{$post->id}");
        $response->assertStatus(200);
    }

    public function test_options_posts()
    {
        $response = $this->call('OPTIONS', '/posts');
        $response->assertStatus(200);
        $this->assertStringContainsString('GET', $response->headers->get('Allow'));
    }
}
