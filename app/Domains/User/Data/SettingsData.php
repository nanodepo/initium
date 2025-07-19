<?php

namespace App\Domains\User\Data;

use Spatie\LaravelData\Data;

class SettingsData extends Data
{
    public function __construct(
        public bool $dark = false,
        public bool $drawer = true,
        public ?string $color = null,
    ) {}
}

