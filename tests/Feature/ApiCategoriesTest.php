<?php

namespace Tests\Feature;

class ApiCategoriesTest extends AbstractTest
{
    private const CATEGORIES_TABLE = 'categories';

    private static $category = [
        'name' => 'Test category',
        'description' => 'Test test test test test test test test test test test test test test test test test etc...',
    ];
    /**
     * Create new category
     */
    public function testCreate()
    {
        $response = $this->withHeaders($this->headers)
            ->postJson('/api/admin/categories', self::$category);

        $response->assertStatus(201);

        $this->assertDatabaseHas(static::CATEGORIES_TABLE, self::$category);
        self::$category['id'] = $response->json('id');
    }

    /**
     * One category
     */
    public function testOne()
    {
        $response = $this->withHeaders($this->headers)
            ->get('/api/admin/categories/'.self::$category['id']);

        $response->assertJsonFragment(self::$category);

        $response->assertStatus(200);
    }

    /**
     * Update category
     */
    public function testUpdate()
    {
        $response = $this->withHeaders($this->headers)
            ->patchJson('/api/admin/categories/'.self::$category['id'], [
                'name' => 'Updated name',
            ]);

        $response->assertOk();
        $response->assertJson([
            'name' => 'Updated name',
        ]);
        $this->assertDatabaseHas(static::CATEGORIES_TABLE, [
            'name' => 'Updated name',
        ]);
    }

    /**
     * List of all categories
     * @return void
     */
    public function testList()
    {
        $response = $this->withHeaders($this->headers)
            ->get('/api/admin/categories');

        $response->assertStatus(200);
    }

    /**
     * Delete category
     */
    public function testDelete()
    {
        $response = $this->withHeaders($this->headers)
            ->delete('/api/admin/categories/'.self::$category['id']);

        $response->assertOk();

        $this->assertDatabaseMissing(self::CATEGORIES_TABLE, self::$category);
    }
}
