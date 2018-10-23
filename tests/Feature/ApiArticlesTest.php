<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiArticlesTest extends TestCase
{
//    private $user;
    private $authToken;

    protected function setUp()
    {
        parent::setUp();
        $user = User::find(1);
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        $token->save();
        $this->authToken = 'Bearer '.$tokenResult->accessToken;
    }
    /**
     * List of all articles
     * @return void
     */
    public function testList()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'applicatoin/json',
            'X-Requested-With' => 'XMLHttpRequest',
            'Authorization' => $this->authToken,
            ])
            ->get('/api/admin/articles');

        $response->assertStatus(200);
    }

    /**
     * One article
     */
    public function testOne()
    {
        
    }

    /**
     * Create new article
     */
    public function testCreate()
    {
    }

    /**
     * Update article
     */
    public function testUpdate()
    {
        
    }

    /**
     * Delete article
     */
    public function testDelete()
    {
        
    }
}
