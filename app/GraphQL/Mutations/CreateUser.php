<?php

namespace App\GraphQL\Mutations;

use App\Models\Specialization;
use App\Models\User;

final class CreateUser
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $specialization = isset($args['spec_name'])
            ? Specialization::query()->create([
                "name" => $args['spec_name'],
                "parent_id" => $args['spec_parent'] ?? null
            ]) : null;

        $password = fake()->password(8);

        /** @var User $user */
        $user = User::query()->create([
            "name" => $args['name'],
            "email" => $args['email'],
            "status_id" => $args['status_id'],
            "password" => bcrypt($password)
        ]);

        if(!is_null($user) && !is_null($specialization)) {
            $user->specializations()->attach($specialization->id);
        }

        $user->password = $password;

        return $user;
    }
}
