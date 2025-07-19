import '../../vendor/nanodepo/nexus/src/resources/js/uikit.js';

// Перехват события ошибки и перенаправление её в Alert
Livewire.hook('request', ({ url, options, payload, respond, succeed, fail }) => {
    respond(({ status, response }) => {});
    succeed(({ status, json }) => {});
    fail(({ status, content, preventDefault }) => {
        preventDefault();
        Livewire.dispatch('makeAlert', { type: 'error', message: status });
    });
})
