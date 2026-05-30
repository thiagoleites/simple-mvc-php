<main class="container">
    <section style="display:flex; justify-content:center;">
        <span class="badge"><?= __('login.title') ?></span>

        <h1><?= __('login.subtitle') ?></h1>

        <form method="POST" action="/mvc/login">
            <div class="form-group">
                <label for="email"><?= __('login.email') ?></label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="<?= old('email') ?>"
                    placeholder="<?= __('login.email_placeholder') ?>"
                    <?= error_tooltip('email') ?>
                >

                <?php if (has_error('email')): ?>
                    <p class="field-error-message"><?= error('email') ?></p>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="password"><?= __('login.password') ?></label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="<?= __('login.password_placeholder') ?>"
                    <?= error_tooltip('password') ?>
                >

                <?php if (has_error('password')): ?>
                    <p class="field-error-message"><?= error('password') ?></p>
                <?php endif; ?>
            </div>

            <button class="btn btn-primary" type="submit">
                <?= __('login.submit') ?>
            </button>
        </form>
    </section>
</main>