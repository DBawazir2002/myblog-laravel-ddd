<?php

namespace Domain\Dashboard\DataTransferToObject\Posts;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class StorePostData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public string $title_ar,
        public string $category_id,
        public string $title_en,
        public string $content_ar,
        public string $content_en,
        public Optional|bool $is_published,
        public UploadedFile $image,

    ) {}

    public static function rules(): array
    {
        return [
            'category_id' => [
                'required',
                Rule::exists('categories', 'id'),
            ],
            'title_ar' => [
                'required',
                'min:3',
                'max:120',
            ],
            'title_en' => [
                'required',
                'min:3',
                'max:120',
            ],
            'content_ar' => [
                'required',
                'min:10',
            ],
            'content_en' => [
                'required',
                'min:10',
            ],
            'is_published' => [
                'boolean',
            ],
            'image' => [
                'required',
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
