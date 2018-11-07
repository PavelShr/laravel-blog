<?php
/**
 * Created by PhpStorm.
 * User: fuck
 * Date: 11/7/18
 * Time: 10:56 PM
 */

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class AbstractTest extends TestCase
{
    protected $headers = [
        'Content-Type' => 'applicatoin/json',
        'X-Requested-With' => 'XMLHttpRequest',
        'Authorization' => null,
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
}