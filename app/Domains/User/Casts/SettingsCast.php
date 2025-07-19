<?php

namespace App\Domains\User\Casts;

use App\Domains\User\Data\SettingsData;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class SettingsCast implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes): SettingsData
    {
        return SettingsData::from($value);
    }

    public function set($model, string $key, $value, array $attributes): string
    {
        return $value->toJson();
    }
}

