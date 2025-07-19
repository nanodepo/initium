<?php

namespace App\Domains\User\Models;

use App\Domains\User\Casts\SettingsCast;
use App\Domains\User\Enums\MemberRole;
use App\Domains\User\Traits\HasPermissions;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasUlids;
    use HasPermissions;
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'avatar',
        'password',
        'settings',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'role' => MemberRole::class,
            'password' => 'hashed',
            'settings' => SettingsCast::class,
        ];
    }
}
