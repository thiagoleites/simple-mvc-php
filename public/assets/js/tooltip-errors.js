$(function () {
    const $fields = $('.field-error[data-tooltip]');

    if (!$fields.length) return;

    $fields.each(function () {
        const $field = $(this);

        $field.on('focus mouseenter', function () {
            $field.addClass('tooltip-active');
        });

        $field.on('blur mouseleave', function () {
            $field.removeClass('tooltip-active');
        });
    });
});