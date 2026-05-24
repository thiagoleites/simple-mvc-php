$(function () {
    const $progressBars = $('.progress-bar');

    if (!$progressBars.length) return;

    if (!('IntersectionObserver' in window)) {
        $progressBars.each(function () {
            const $bar = $(this);
            $bar.css({
                width: $bar.data('progress') + '%',
                opacity: 1
            });
        });

        return;
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;

            const $bar = $(entry.target);
            const progressValue = $bar.data('progress') || 0;

            $bar.css({
                width: progressValue + '%',
                opacity: 1
            });

            observer.unobserve(entry.target);
        });
    }, {
        threshold: 0.5
    });

    $progressBars.each(function () {
        observer.observe(this);
    });
});