$(function () {
    const $form = $('#meuFormulario');

    if (!$form.length) return;

    $form.on('submit', function (event) {
        event.preventDefault();

        const $btn = $('#btnEnviar');
        const $spinner = $('#spinnerForm');

        $btn.prop('disabled', true);
        $spinner.removeClass('hidden');

        setTimeout(() => {
            $btn.prop('disabled', false);
            $spinner.addClass('hidden');

            alert('Formulário enviado com sucesso!');
            $form.trigger('reset');
        }, 2000);
    });
});