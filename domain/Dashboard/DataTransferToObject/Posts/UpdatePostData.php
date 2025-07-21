<?php

namespace Domain\Dashboard\DataTransferToObject\Posts;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UpdatePostData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public Optional|string $category_id,
        public Optional|string $title_ar,
        public Optional|string $title_en,
        public Optional|string $content_ar,
        public Optional|string $content_en,
        public Optional|bool $is_published,
        public Optional|UploadedFile $image,

    ) {}

    public static function rules(): array
    {
        return [
            'category_id' => [
                Rule::exists('categories', 'id'),
            ],
            'title_ar' => [
                'min:3',
                'max:120',
            ],
            'title_en' => [
                'min:3',
                'max:120',
            ],
            'content_ar' => [
                'min:10',
            ],
            'content_en' => [
                'min:10',
            ],
            'is_published' => [
                'boolean',
            ],
            'image' => [
                File::types(['png', 'jpg', 'jpeg'])->max(2 * 1024),
            ],
        ];
    }

    public static function attributes(): array
    {
        return [
            'category_id' => __('attributes.category'),
            'title_ar' => __('attributes.title_ar'),
            'title_en' => __('attributes.title_en'),
            'content_ar' => __('attributes.content_ar'),
            'content_en' => __('attributes.content_en'),
            'is_published' => __('attributes.is_published'),
            'image' => __('attributes.image'),
        ];
    }
}
