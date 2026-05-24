$(function () {
    const $tabs = $('.tabs');

    if (!$tabs.length) return;

    $tabs.each(function () {
        const $container = $(this);
        const $tabNav = $container.find('.tab-nav');
        const $tabPanes = $container.find('.tab-pane');

        $tabNav.on('click', '.tab-link', function () {
            const $clickedTab = $(this);
            const tabNumber = $clickedTab.data('tab');

            $tabNav.find('.tab-link').removeClass('active');
            $tabPanes.removeClass('active').hide();

            $clickedTab.addClass('active');

            $container
                .find('.tab-pane[data-tab="' + tabNumber + '"]')
                .fadeIn(180)
                .addClass('active');
        });

        $tabPanes.not('.active').hide();
    });
});