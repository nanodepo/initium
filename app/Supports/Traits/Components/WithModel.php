<?php

namespace App\Supports\Traits\Components;

trait WithModal
{
    public bool $opened = false;

    public function open(): void
    {
        $this->opened = true;
    }

    public function close(): void
    {
        $this->opened = false;
    }
}
