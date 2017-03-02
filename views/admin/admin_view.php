<h1><?= __("Admin") ?> '<?= $admin['admin_name'] ?>'</h1>
<table class="table table-bordered">

    <tr>
        <th><?= __("Admin") ?> ID</th>
        <td><?= $admin['admin_id'] ?></td>
    </tr>

    <tr>
        <th><?= __("Admin") ?><?= __("name") ?></th>
        <td><?= $admin['admin_name'] ?></td>
    </tr>

</table>

<!-- EDIT BUTTON -->
<?php if ($auth->is_admin): ?>
    <form action="admin/edit/<?= $admin['admin_id'] ?>">
        <div class="pull-right">
            <button class="btn btn-primary">
                <?= __("Edit") ?>
            </button>
        </div>
    </form>
<?php endif; ?>