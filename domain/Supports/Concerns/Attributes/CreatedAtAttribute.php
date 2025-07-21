<?php

namespace Domain\Supports\Concerns\Attributes;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait CreatedAtAttribute
{
    protected function image(): Attribute
    {
        return new Attribute(get: fn () => ! empty($this->created_at) ? $this->created_at->format('Y-m-d') : null);
    }
}
