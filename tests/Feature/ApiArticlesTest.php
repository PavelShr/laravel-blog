<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiArticlesTest extends TestCase
{

    private $headers = [
        'Content-Type' => 'applicatoin/json',
        'X-Requested-With' => 'XMLHttpRequest',
        'Authorization' => null,
    ];

    private $article = [
        'title' => 'Test',
        'post_text' => 'Lorme ipsum dolor',
        'category' => '1',
    ];

    protected function setUp()
    {
        parent::setUp();
        $user = factory(User::class)->create();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->save();
        $this->headers['Authorization'] = 'Bearer '.$tokenResult->accessToken;
    }

    /**
     * Create new article
     */
    public function testCreate()
    {
        $response = $this->withHeaders($this->headers)
            ->postJson('/api/admin/articles', $this->article);

        $response->assertOk();

        $this->assertDatabaseHas('articles', [
            'title' => 'Test',
            'post_text' => 'Lorme ipsum dolor',
            'category_id' => '1',
        ]);

        $response->assertStatus(200);
    }

    /**
     * Update article
     */
//    public function testUpdate()
//    {
//
//    }

    /**
     * List of all articles
     * @return void
     */
    public function testList()
    {
        $response = $this->withHeaders($this->headers)
            ->get('/api/admin/articles');

        $response->assertStatus(200);
    }

    /**
     * One article
     */
    public function testOne()
    {
        $response = $this->withHeaders($this->headers)
            ->get('/api/admin/articles/1');

        $response->assertStatus(200);
    }

//
//    /**
//     * Delete article
//     */
//    public function testDelete()
//    {
//
//    }
}
