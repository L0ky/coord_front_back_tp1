<?php

namespace App\Business;

use App\Models\User;
use Laravel\Sanctum\PersonalAccessToken;

/**
 * AuthBusiness
 */
class AuthBusiness
{
    /**
     * Create a new token for a user
     *
     * @param User $user
     * @return string
     */
    public static function createToken(User $user): string
    {
        $token = $user->createToken('apiToken')->plainTextToken;

        $accessToken = $user->tokens()
            ->where('name', 'apiToken')
            ->latest()
            ->first();
    
        if ($accessToken instanceof PersonalAccessToken) {
            $accessToken->expires_at = now()->addHour(1);
            $accessToken->save();
        }

        return $token;
    }
}