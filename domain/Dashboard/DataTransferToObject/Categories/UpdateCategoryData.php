<?php

namespace Domain\Dashboard\DataTransferToObject\Categories;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Illuminate\Validation\Rules\File;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UpdateCategoryData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public Optional|string $name_ar,
        public Optional|string $name_en,
        public Optional|string $image,
        public Optional|bool $is_active
    ) {}

    public static function rules(): array
    {
        return [
            'name_ar' => [
                'min:3',
                'max:16',
            ],
            'name_en' => [
                'min:3',
                'max:16',
            ],
            'image' => [
                File::types(['png', 'jpg', 'jpeg'])->max(2 * 1024),
            ],
            'is_active' => [
                'boolean',
            ],
        ];
    }

    public static function attributes(): array
    {
        return [
            'name_ar' => __('attributes.name_ar'),
            'name_en' => __('attributes.name_en'),
            'image' => __('attributes.image'),
            'is_active' => __('attributes.is_active'),
        ];
    }
}
