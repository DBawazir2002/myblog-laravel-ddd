<?php

namespace Domain\Dashboard\DataTransferToObject\Auth;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Spatie\LaravelData\Data;

class LoginData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public string $email,
        public string $password,
    ) {}

    public static function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
                'string',
            ],
            'password' => [
                'required',
                'string',
            ],
        ];
    }

    public static function attributes(): array
    {
        return [
            'email' => __('emails.email'),
            'password' => __('attributes.password'),
        ];
    }
}
