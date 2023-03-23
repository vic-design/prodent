<?php

namespace App\GraphQL\Validators\Mutation;

use Illuminate\Validation\Rule;
use Nuwave\Lighthouse\Validation\Validator;

final class CreateUserValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [
            // TODO Add your validation rules
            "email" => [
                "email",
                "unique:users,email"
            ],
            "status_id" => [
                "exists:statuses,id"
            ],
            "spec_name" => [
                "unique:specializations,name",
                Rule::requiredIf($this->arg('spec_parent'))
            ],
            "spec_parent" => [
                "exists:specializations,id"
            ]
        ];
    }
}
