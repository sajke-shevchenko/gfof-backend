<?php

namespace App\Services;

use App\DTO\UserData;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;


/**
 * User business-logic service.
 */
class UserService
{
    /**
     * @param UserData $userData
     *
     * @return User|Model
     */
    public function getByPhone(UserData $userData): User
    {
        $user = User::query()->where(User::PHONE, '=', $userData->phone)->first();

        if ($user) {
            $user->name = $userData->name;
            $user->address = $userData->address;
        } else {
            $user = new User($userData->toArray());
        }

        $user->save();

        return $user;
    }
}
