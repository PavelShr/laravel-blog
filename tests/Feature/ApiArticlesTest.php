<?php

namespace Tests\Feature;

class ApiArticlesTest extends AbstractTest
{
    private const ARTICLES_TABLE = 'articles';

    private static $article = [
        'title' => 'Test',
        'post_text' => 'Lorem ipsum dolor',
        'category_id' => 1,
    ];

    /**
     * Create new article
     */
    public function testCreate()
    {
        $response = $this->withHeaders($this->headers)
            ->postJson('/api/admin/articles', self::$article);

        $response->assertStatus(201);

        $this->assertDatabaseHas(static::ARTICLES_TABLE, [
            'title' => 'Test',
            'post_text' => 'Lorem ipsum dolor',
            'category_id' => '1',
        ]);

        self::$article['id'] = $response->json('id');
    }

    /**
     * One article
     */
    public function testOne()
    {
        $response = $this->withHeaders($this->headers)
            ->get('/api/admin/articles/'.self::$article['id']);

        $response->assertJsonFragment(self::$article);

        $response->assertStatus(200);
    }

    /**
     * Update article
     */
    public function testUpdate()
    {
        $response = $this->withHeaders($this->headers)
            ->patchJson('/api/admin/articles/'.self::$article['id'], [
                'title' => 'Updated title',
                'category_id' => '1',
            ]);

        $response->assertOk();
        $response->assertJson([
            'title' => 'Updated title',
            'category_id' => '1',
        ]);
        $this->assertDatabaseHas(static::ARTICLES_TABLE, [
            'title' => 'Updated title',
            'post_text' => 'Lorem ipsum dolor',
            'category_id' => '1',
        ]);
    }

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
     * Delete article
     */
    public function testDelete()
    {
        $response = $this->withHeaders($this->headers)
            ->delete('/api/admin/articles/'.self::$article['id']);

        $response->assertOk();

        $this->assertDatabaseMissing(self::ARTICLES_TABLE, self::$article);
    }
}
