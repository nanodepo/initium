<?php

namespace App\Domains\User\Traits;

use App\Domains\User\Enums\MemberRole;
use App\Domains\User\Permissions\PermissionManager;

trait HasPermissions
{
    public function hasRole(MemberRole $role): bool
    {
        return $this->role === $role;
    }

    public function permissions(): array
    {
        return (array) optional(PermissionManager::findRole($this->role))->permissions;
    }

    public function hasPermission(string $permission): bool
    {
        $permissions = $this->permissions();

        return in_array($permission, $permissions) || in_array('*', $permissions);
    }
}
