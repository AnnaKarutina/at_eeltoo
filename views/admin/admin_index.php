<!-- IF ADMIN -->
<?php if ($auth->is_admin): ?>
<h3><?= __("Admin") ?></h3>
<ul class="list-group">
    <?php foreach ($admin as $admin): ?>
        <li class="list-group-item">
            <a href="admin/<?= $admin['admin_id'] ?>/<?= $admin['admin_name'] ?>"><?= $admin['admin_name'] ?></a>
        </li>
    <?php endforeach ?>
</ul>

<h3><?= __("Add new admin") ?></h3>


<form method="post" id="form">
    <form id="form" method="post">
        <table class="table table-bordered">
            <tr>
                <th><?= __("Name") ?></th>
                <td><input type="text" name="data[admin_name]" placeholder=""/></td>
            </tr>
        </table>

        <button class="btn btn-primary" type="submit"><?= __("Add") ?></button>
    </form>
<?php endif; ?>