$(function () {
    const $loader = $('#pageLoader');
    const $content = $('#mainContent');

    if (!$loader.length || !$content.length) return;

    $(window).on('load', function () {
        $loader.fadeOut(300, function () {
            $loader.addClass('hidden');
            $content.removeClass('hidden').hide().fadeIn(250);
        });
    });
});