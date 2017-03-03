<!-- IF ADMIN -->
<?php if ($auth->is_admin): ?>

    <h3><?= __("Tulemused") ?></h3>

    <table class="table table-bordered results">
        <tr>
            <th>Nimi</th>
            <th>Isikukood</th>
            <th>Teoreetiline test</th>
            <th>Praktiline test</th>
            <th>Kokku</th>
        </tr>
    <?php foreach ($results as $result): ?>
        <tr>
            <td><?= $result['firstname'].' '.$result['lastname'] ?></td>
            <td><?= $result['social_id'] ?></td>
            <td><?= $result['theoretical_points'] ?></td>
            <td><?= $result['practical_points'] == 0 ? '<span class="not-graded">Hindamata</span>' : $result['practical_points'] ?></td>
            <td><?= $result['sum'] ?></td>
        </tr>
    <?php endforeach ?>
    </table>

<?php endif; ?>