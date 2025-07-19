<?php

namespace App\Domains\User\Enums;

enum MemberRole: string
{
    case User = 'user';
    case Manager = 'manager';
    case Admin = 'admin';
    case Root = 'root';

    public function title(): string
    {
        return __('enum.role.'.$this->value.'.title');
    }

    public function description(): string
    {
        return __('enum.role.'.$this->value.'.description');
    }
}

