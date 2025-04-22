<?php

use App\Supports\Traits\Components\HasAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Volt\Component;

new
#[Layout('layouts.guest')]
class extends Component {
    use HasAlert;

    public bool $status = false;

    #[Validate(['required', 'email'])]
    public string $email = '';

    public function submit(): void
    {
        $this->validate();

        try {
            // We will send the password reset link to this user. Once we have attempted
            // to send the link, we will examine the response then see the message we
            // need to show to the user. Finally, we'll send out a proper response.
            $status = Password::sendResetLink(['email' => $this->email]);
        } catch (Exception $e) {
            $this->alert('Почтовый сервер не отвечает. Пожалуйста, сообщите администратору.', 'error');
            return;
        }

        if ($status == Password::RESET_LINK_SENT) {
            $this->reset();
            $this->alert(__($status));
        } else {
            $this->alert(__($status), 'error');
        }
    }
} ?>

<div class="flex flex-col justify-center items-center flex-auto">
    <div class="flex flex-col w-full max-w-sm">

        <x-ui::section
            title="Восстановление пароля"
            hint="Забыли пароль? Без проблем. Просто сообщите нам свой адрес электронной почты, и мы отправим вам ссылку для сброса пароля, которая позволит вам выбрать новый."
        >
            @if($status)
                <x-ui::banner
                    icon="envelope"
                    title="Ссылка отправлена"
                    subtitle="Мы отправили ссылку для восстановления пароля вам на почту."
                    color="secondary"
                    class="mb-3"
                />
            @endif

            <form wire:submit="submit" class="flex flex-col gap-3">
                <x-ui::field label="Электронная почта">
                    <x-ui::input
                        type="email"
                        wire:model="email"
                        required
                        autofocus
                    />
                </x-ui::field>

                <div class="flex flex-row justify-end">
                    <x-ui::button after="paper-airplane" type="submit" :disabled="$status">
                        Получить ссылку
                    </x-ui::button>
                </div>
            </form>
        </x-ui::section>

    </div>
</div>
