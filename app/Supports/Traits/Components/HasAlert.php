<?php

namespace App\Supports\Traits\Components;

trait HasAlert
{
    /**
     * A function that displays a notification in the lower right corner of the screen.
     * @param string $message random message string
     * @param string $type message type (primary, secondary, tertiary, error)
     */
    private function alert(string $message, string $type = 'secondary'): void
    {
        $this->dispatch('makeAlert', $type, $message);
    }

}
