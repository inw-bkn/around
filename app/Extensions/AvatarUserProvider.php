<?php

namespace App\Extensions;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;

class AvatarUserProvider implements UserProvider
{
    private $providerConfig;

    public function __construct(array $config)
    {
        $this->providerConfig = $config;
    }

    public function retrieveById($identifier)
    {
        /*
         * The retrieveById function typically receives a key representing the
         * user, such as an auto-incrementing ID from a MySQL database.
         * The Authenticatable implementation matching the ID
         * should be retrieved and returned by the method.
         */
    }

    public function retrieveByToken($identifier, $token)
    {
    }

    public function updateRememberToken(Authenticatable $user, $token)
    {
    }

    public function retrieveByCredentials(array $credentials)
    {
        /*
         * The retrieveByCredentials method receives the array of credentials passed to the Auth::attempt
         * method when attempting to authenticate with an application. The method should then "query"
         * the underlying persistent storage for the user matching those credentials. Typically,
         * this method will run a query with a "where" condition that searches for a user
         * record with a "username" matching the value of $credentials['username'].
         * The method should return an implementation of Authenticatable.
         * This method should not attempt to do any password
         * validation or authentication.
         */
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        /*
         * The validateCredentials method should compare the given $user with the $credentials
         * to authenticate the user. For example, this method will typically use the
         * Hash::check method to compare the value of $user->getAuthPassword() to
         * the value of $credentials['password']. This method should return
         * true or false indicating whether the password is valid.
         */
    }
}
