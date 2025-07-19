<?php

namespace App\Providers;

use App\Domains\User\Enums\MemberRole;
use App\Domains\User\Models\User;
use App\Domains\User\Permissions\PermissionManager;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected array $permissions = [
        'level:one',
        'level:two',
        'level:three',
    ];

    public function boot(): void
    {
        $this->configurePermissions();

        foreach ($this->permissions as $permission) {
            Gate::define($permission, fn (User $user) => $user->hasPermission($permission));
        }
    }

    private function configurePermissions(): void
    {
        PermissionManager::role(
            key: MemberRole::Root->value,
            name: MemberRole::Root->name,
            permissions: ['*']
        );

        PermissionManager::role(
            key: MemberRole::Admin->value,
            name: MemberRole::Admin->name,
            permissions: [
                'level:one',
                'level:two',
                'level:three',
            ]
        );

        PermissionManager::role(
            key: MemberRole::Manager->value,
            name: MemberRole::Manager->name,
            permissions: [
                'level:one',
                'level:two',
            ]
        );

        PermissionManager::role(
            key: MemberRole::User->value,
            name: MemberRole::User->name,
            permissions: [
                'level:one',
            ]
        );
    }
}
