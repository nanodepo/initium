<?php

use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new
#[Layout('layouts.guest')]
class extends Component {

    #[Validate(['required', 'email'])]
    public string $email = '';

    #[Validate(['required', 'string', 'min:6', 'max:24'])]
    public string $password = '';

    public function submit(): void
    {
        $this->validate();

        $this->authenticate();

        $this->redirectRoute('home');
    }

    private function authenticate(): void
    {
        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], true)) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }
    }
} ?>

<div class="flex flex-col justify-center items-center flex-auto">
    <div class="flex flex-col w-full max-w-sm">

        <x-ui::section>
            <div x-data="{ tab: 'login' }">
                <x-ui::tab x-model="tab" class="-mx-6">
                    <x-ui::tab.item href="{{ route('auth.login') }}" icon="finger-print" name="login" label="Вход" />
                    <x-ui::tab.item href="{{ route('auth.register') }}" icon="heart" name="register" label="Регистрация" />
                </x-ui::tab>
            </div>

            <form wire:submit="submit" class="flex flex-col gap-3 mt-6">
                @csrf

                <x-ui::field label="Электронная почта">
                    <x-ui::input
                        type="email"
                        wire:model="email"
                        required
                        autofocus
                    />
                </x-ui::field>

                <x-ui::field label="Ваш пароль">
                    <x-ui::input
                        type="password"
                        wire:model="password"
                        required
                        autocomplete="current-password"
                    />
                </x-ui::field>

                <div class="flex flex-row justify-between items-center">
                    <a class="text-sm link text-hint" href="{{ route('auth.forgot') }}">
                        Забыли пароль?
                    </a>

                    <x-ui::button before="finger-print" type="submit">
                        Войти
                    </x-ui::button>
                </div>
            </form>
        </x-ui::section>

    </div>
</div>

