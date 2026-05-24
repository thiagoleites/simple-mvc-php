$(function () {
    const $commentList = $('.comment-list');

    if (!$commentList.length) return;

    $commentList.on('click', '.like-button', function () {
        const $button = $(this);
        const $count = $button.find('.like-count');

        let currentLikes = parseInt($count.text(), 10) || 0;

        $button.toggleClass('liked');

        currentLikes = $button.hasClass('liked')
            ? currentLikes + 1
            : currentLikes - 1;

        $count.text(currentLikes);
    });
});