<!-- IF ADMIN -->
<?php if ($auth->is_admin): ?>

    <h3><?= __("Praktilised ülesanded") ?></h3>

    <table class="table table-bordered results">

        <tr>
            <th>Nimi</th>
            <th>Isikukood</th>
            <th>Staatus/Hinne</th>
            <th>Hindamine</th>
        </tr>

        <?php foreach ($results as $result): ?>
            <tr>
                <td><?= $result['firstname'] . ' ' . $result['lastname'] ?></td>
                <td><?= $result['social_id'] ?></td>
                <td>
                    <?php if ($result['practical_points'] == -2): ?>
                        <span class="not-graded">Tegemata</span>
                    <?php elseif ($result['practical_points'] == -1): ?>
                        <span class="not-graded">Hindamata</span>
                    <?php else: ?>
                        <?= $result['practical_points'] ?>
                    <?php endif; ?>
                </td>
                <td>
                    <button type="button" class="btn btn-info" data-toggle="collapse"
                            data-target="#user-<?= $result['user_id'] ?>">Ava
                    </button>
                </td>
            </tr>
            <tr class="collapse" id="user-<?= $result['user_id'] ?>">
                <td colspan="4">
                    <button type="button" class="btn btn-info" data-toggle="test"
                            data-target="#view-<?= $result['user_id'] ?>">Vaata faili
                    </button>
                    <div id="view-<?= $result['user_id'] ?>" class="iframe-bg test">
                        <iframe src="results/<?= $result['social_id'] ?>.html"></iframe>
                    </div>
                </td>
            </tr>


        <?php endforeach ?>
    </table>

    <div class="panel-group" id="accordion">

        <?php foreach ($results as $result): ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#user-<?= $result['user_id'] ?>">
                        <?= $result['firstname'] . ' ' . $result['lastname'] ?></a>
                </h4>
            </div>
            <div id="user-<?= $result['user_id'] ?>" class="panel-collapse collapse in">
                <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                    minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                    commodo consequat.
                </div>
            </div>
        </div>

        <?php endforeach ?>

    </div>

<?php endif; ?>