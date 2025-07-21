<?php

namespace Domain\Dashboard\DataTransferToObject\Categories;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Illuminate\Validation\Rules\File;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class StoreCategoryData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public string $name_ar,
        public string $name_en,
        //        public string $image,
        public Optional|bool $is_active
    ) {}

    public static function rules(): array
    {
        return [
            'name_ar' => [
                'required',
                'min:3',
                'max:16',
            ],
            'name_en' => [
                'required',
                'min:3',
                'max:16',
            ],
            'image' => [
                'required',
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
