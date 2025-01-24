<?php

namespace App\Support\Serializers;

use App\Entities\User;

class UserSerializer
{
    public static function parse(User $user): array
    {
        return [
            'id' => $user->getIdentifier(),
            'name' => $user->getName(),
            'email' => $user->getEmail(),
        ];
    }
}
