<?php

namespace Tests\Feature;

class ApiCategoriesTest extends ApiTestAbstract
{
    private const TABLE_NAME = 'categories';

    private static $category = [
        'title' => 'Test',
        'post_text' => 'Lorem ipsum dolor',
        'category_id' => 1,
    ];
    /**
     *
     *
     * @return void
     */
    public function testCreate()
    {
        $this->assertTrue(true);
    }

    public function testOne()
    {

    }

    public function testList()
    {

    }

    public function testUpdate()
    {

    }

    public function testDelete()
    {

    }


}
