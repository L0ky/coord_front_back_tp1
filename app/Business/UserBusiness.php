<?php

namespace App\Business;

use App\Models\User;

/**
 * UserBusiness
 */
class UserBusiness
{
    /**
     * Create a new user
     *
     * @param array $data
     * @return User
     */
    public static function createUser(array $data): User
    {
        $user = new User();
        $user->name     = $data['name'];
        $user->email    = $data['email'];
        $user->role_id  = 2; // user
        $user->password = bcrypt($data['password']);

        $user->save();

        return $user;
    }
}