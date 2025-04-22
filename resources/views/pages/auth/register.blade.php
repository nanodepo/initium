<?php

use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new
#[Layout('layouts.guest')]
class extends Component {

    #[Validate(['required', 'string', 'max:64'])]
    public string $name = '';

    #[Validate(['required', 'email'])]
    public string $email = '';

    #[Validate(['required', 'string', 'min:6', 'max:24', 'confirmed:confirmation'])]
    public string $password = '';
    public string $confirmation = '';

    public function submit(): void
    {
        $this->validate();

        event(new Registered($user));

        Auth::login($user);

        $this->redirectRoute('org.create');
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

            <div x-data="{ tab: 'register' }">
                <x-ui::tab x-model="tab" class="-mx-6">
                    <x-ui::tab.item href="{{ route('auth.login') }}" icon="finger-print" name="login" label="Вход" />
                    <x-ui::tab.item href="{{ route('auth.register') }}" icon="heart" name="register" label="Регистрация" />
                </x-ui::tab>
            </div>

            <form wire:submit="submit" class="flex flex-col gap-3 mt-6">

                <x-ui::field label="Ваше имя">
                    <x-ui::input
                        wire:model="name"
                        required
                        autofocu
                        autocomplete="name"
                    />
                </x-ui::field>

                <x-ui::field label="Электронная почта">
                    <x-ui::input
                        type="email"
                        wire:model="email"
                        required
                    />
                </x-ui::field>

                <x-ui::field label="Пароль">
                    <x-ui::input
                        type="password"
                        wire:model="password"
                        required
                        autocomplete="new-password"
                    />
                </x-ui::field>

                <x-ui::field label="Повторите пароль">
                    <x-ui::input
                        type="password"
                        wire:model="confirmation"
                        required
                        autocomplete="new-password"
                    />
                </x-ui::field>

                <div class="flex flex-row justify-end">
                    <x-ui::button
                        type="submit"
                        before="heart"
                    >
                        Продолжить
                    </x-ui::button>
                </div>
            </form>
        </x-ui::section>

    </div>
</div>
