<?php

namespace App\Domains\User\Permissions;

use App\Domains\User\Enums\MemberRole;

class PermissionManager
{
    /**
     * The roles that are available to assign to users.
     *
     * @var array
     */
    public static array $roles = [];

    /**
     * The permissions that exist within the application.
     *
     * @var array
     */
    public static array $permissions = [];

    /**
     * The default permissions that should be available to new entities.
     *
     * @var array
     */
    public static array $defaultPermissions = [];

    /**
     * Determine if Jetstream has registered roles.
     *
     * @return bool
     */
    public static function hasRoles(): bool
    {
        return count(static::$roles) > 0;
    }

    /**
     * Find the role with the given key.
     *
     * @param MemberRole $key
     * @return Role|null
     */
    public static function findRole(MemberRole $key): ?Role
    {
        return static::$roles[$key->value] ?? null;
    }

    /**
     * Define a role.
     *
     * @param  string  $key
     * @param  string  $name
     * @param  array  $permissions
     * @return Role
     */
    public static function role(string $key, string $name, array $permissions): Role
    {
        static::$permissions = collect(array_merge(static::$permissions, $permissions))
            ->unique()
            ->sort()
            ->values()
            ->all();

        return tap(new Role($key, $name, $permissions), function ($role) use ($key) {
            static::$roles[$key] = $role;
        });
    }

    /**
     * Determine if any permissions have been registered with Jetstream.
     *
     * @return bool
     */
    public static function hasPermissions(): bool
    {
        return count(static::$permissions) > 0;
    }

    /**
     * Define the available API token permissions.
     *
     * @param  array  $permissions
     * @return static
     */
    public static function permissions(array $permissions): static
    {
        static::$permissions = $permissions;

        return new static;
    }
}
