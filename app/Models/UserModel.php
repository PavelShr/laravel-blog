<?php

namespace App\Models;

use Exception;

class UserModel {

    private $user;

    private function __construct($user)
    {
        $this->user = $user;
    }

    public static function getInstance($user)
    {
        return new self($user);
    }

    /**
     * Create new user
     * @param array $data
     * @return UserModel
     * @throws Exception
     */
    public static function create(array $data)
    {
        $user = new User($data);
        $success = $user->save();
        if (!$success) {
            throw new Exception('Unable to create a new user.');
        }
        return new self($user);
    }

    /**
     * Generate JWT
     * @param bool $remember
     * @return string
     */
    public function createToken($remember = false)
    {
        $tokenResult = $this->user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($remember) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();
        return $tokenResult;
    }

}