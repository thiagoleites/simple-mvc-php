<main class="container">

    <section>

        <div
            style="
                display:flex;
                justify-content:space-between;
                align-items:center;
                margin-bottom:1.5rem;
                gap:1rem;
                flex-wrap:wrap;
            "
        >

            <div>

                <h1><?= __('users.title') ?></h1>

                <p class="text-dark-gray">
                    <?= __('users.subtitle') ?>
                </p>

            </div>

            <div>

                <a
                    href="/mvc/users/create"
                    class="btn btn-primary"
                >
                    + <?= __('users.create') ?>
                </a>

            </div>

        </div>

        <div class="card">

            <div style="overflow-x:auto;">

                <table class="table">

                    <thead>

                        <tr>

                            <th>ID</th>

                            <th><?= __('users.name') ?></th>

                            <th><?= __('users.email') ?></th>

                            <th><?= __('users.role') ?></th>

                            <th><?= __('users.status') ?></th>

                            <th><?= __('users.language') ?></th>

                            <th><?= __('users.created_at') ?></th>

                            <th style="text-align:right;">
                                <?= __('users.actions') ?>
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        <?php if(empty($users)): ?>

                            <tr>

                                <td colspan="8" style="text-align:center;">

                                    <?= __('users.no_records') ?>

                                </td>

                            </tr>

                        <?php endif; ?>

                        <?php foreach($users as $user): ?>

                            <tr>

                                <td>
                                    <?= $user['id'] ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($user['name']) ?>
                                </td>

                                <td>
                                    <?= htmlspecialchars($user['email']) ?>
                                </td>

                                <td>

                                    <span class="badge">

                                        <?= ucfirst($user['role']) ?>

                                    </span>

                                </td>

                                <td>

                                    <span class="badge">

                                        <?= ucfirst($user['status']) ?>

                                    </span>

                                </td>

                                <td>

                                    <?= strtoupper($user['preferred_language']) ?>

                                </td>

                                <td>

                                    <?= date('d/m/Y', strtotime($user['created_at'])) ?>

                                </td>

                                <td>

                                    <div
                                        style="
                                            display:flex;
                                            justify-content:flex-end;
                                            gap:.5rem;
                                        "
                                    >

                                        <a
                                            href="/mvc/users/edit?id=<?= $user['id'] ?>"
                                            class="btn btn-secondary"
                                        >
                                            <?= __('users.edit') ?>
                                        </a>

                                        <a
                                            href="/mvc/users/delete?id=<?= $user['id'] ?>"
                                            class="btn btn-danger"
                                            onclick="return confirm('<?= __('users.confirm_delete') ?>')"
                                        >
                                            <?= __('users.delete') ?>
                                        </a>

                                    </div>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </section>

</main>