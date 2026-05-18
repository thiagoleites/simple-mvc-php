<main class="container">
    <section style="display:flex; justify-content:center;">
        <div class="card" style="width:100%; max-width:520px;">
            <h2><?= __('login.title') ?></h2>

            <p class="text-dark-gray">
                <?= __('login.subtitle') ?>
            </p>

            <form action="/mvc/login" method="POST">
                <div class="form-group">
                    <label for="email"><?= __('login.email') ?></label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        placeholder="<?= __('login.email_placeholder') ?>"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="password"><?= __('login.password') ?></label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="<?= __('login.password_placeholder') ?>"
                        required
                    >
                </div>

                <div class="form-group-inline">
                    <div class="custom-control">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember"><?= __('login.remember') ?></label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" style="width:100%; margin-top:1rem;">
                    <?= __('login.submit') ?>
                </button>
            </form>

            <hr>

            <p>
                <a href="/mvc"><?= __('login.back_home') ?></a>
            </p>
        </div>
    </section>
</main>