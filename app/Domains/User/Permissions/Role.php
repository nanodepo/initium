<?php

namespace App\Domains\User\Permissions;

use App\Domains\User\Enums\MemberRole;
use JsonSerializable;
use Stringable;

class Role implements JsonSerializable, Stringable
{
    /**
     * The key identifier for the role.
     *
     * @var string
     */
    public string $key;

    /**
     * The name of the role.
     *
     * @var string
     */
    public string $name;

    /**
     * The role's permissions.
     *
     * @var array
     */
    public array $permissions;

    /**
     * The role's description.
     *
     * @var string|null
     */
    public ?string $description = null;

    /**
     * Create a new role instance.
     *
     * @param  string  $key
     * @param  string  $name
     * @param  array  $permissions
     * @return void
     */
    public function __construct(string $key, string $name, array $permissions)
    {
        $this->key = $key;
        $this->name = $name;
        $this->permissions = $permissions;
        $this->description = MemberRole::from($key)->description();
    }

    /**
     * Describe the role.
     *
     * @param  string  $description
     * @return $this
     */
    public function description(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function jsonSerialize(): array
    {
        return [
            'key' => $this->key,
            'name' => __($this->name),
            'description' => __($this->description),
            'permissions' => $this->permissions,
        ];
    }

    public function __toString(): string
    {
        return $this->key;
    }
}
