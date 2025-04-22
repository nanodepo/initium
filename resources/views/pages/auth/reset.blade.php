<?php

use App\Supports\Traits\Components\HasAlert;
use Illuminate\Auth\Events\PasswordReset;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Attributes\Url;
use Livewire\Volt\Component;

new
#[Layout('layouts.guest')]
class extends Component {
    use HasAlert;

    public string $token;

    #[Url]
    #[Validate(['required', 'email'])]
    public string $email;

    #[Validate(['required', 'string', 'min:6', 'max:24', 'confirmed:confirmation'])]
    public string $password = '';
    public string $confirmation = '';

    public function submit(): void
    {
        $this->validate();

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset(
            [
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->confirmation,
                'token' => $this->token
            ],
            function ($user) {
                $user->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        if ($status == Password::PASSWORD_RESET) {
            alert()->primary(__($status));
            $this->redirectRoute('auth.login');
        } else {
            $this->reset('password', 'confirmation');
            $this->alert('Не удалось изменить пароль');
        }
    }
} ?>

<div class="flex flex-col justify-center items-center flex-auto">
    <div class="flex flex-col w-full max-w-sm">

        <x-ui::section title="Восстановление пароля">

            <form wire:submit="submit" class="flex flex-col gap-3">

                <input type="hidden" name="token" value="{{ $token }}" />

                <x-ui::field label="Электронная почта">
                    <x-ui::input
                        type="email"
                        wire:model="email"
                        required
                        readonly
                    />
                </x-ui::field>

                <x-ui::field label="Новый пароль">
                    <x-ui::input
                        type="password"
                        wire:model="password"
                        required
                        autofocus
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
                    <x-ui::button before="lock-closed" type="submit">
                        Сбросить
                    </x-ui::button>
                </div>
            </form>
        </x-ui::section>

    </div>
</div>
