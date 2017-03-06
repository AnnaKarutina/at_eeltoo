<!-- IF ADMIN -->
<?php if ($auth->is_admin): ?>

    <h3><?= __("Tulemused") ?></h3>

    <table class="table table-bordered results">
        <tr>
            <th>Nimi</th>
            <th>Isikukood</th>
            <th>T. test (punktid)</th>
            <th>Küsimusi</th>
            <th>P. test (punktid)</th>
            <th>Kokku (punktid)</th>
            <th>Korduv</th>
        </tr>
    <?php foreach ($results as $result): ?>
        <tr>
            <td><?= $result['firstname'].' '.$result['lastname'] ?></td>
            <td><?= $result['social_id'] ?></td>
            <td>
                <?php if($result['theoretical_points'] == -1): ?>
                    <span class="not-graded">Tegemata</span>
                <?php else: ?>
                    <?= $result['theoretical_points'] ?>
                <?php endif; ?>
            </td>
            <td>
                <?php if($result['nr_of_questions'] == 0): ?>
                    Korduv
                <?php else: ?>
                    <?= $result['nr_of_questions'] ?>
                <?php endif; ?>
            </td>
            <td>
                <?php if($result['practical_points'] == -2): ?>
                    <span class="not-graded">Tegemata</span>
                <?php elseif($result['practical_points'] == -1): ?>
                    <span class="not-graded">Hindamata</span>
                <?php else: ?>
                    <?= $result['practical_points'] ?>
                <?php endif; ?>
            </td>
            <td><?= $result['sum'] ?></td>
            <td>
                <?php if($result['practical_points'] != -2 && $result['practical_points'] != -2): ?>
                    <button type="button" id="<?= $result['user_id']; ?>" class="allowAgain">Luba</button>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach ?>
    </table>

    <script>
        // allow user to take the test again in case of error or change of heart
        $(".allowAgain").click(function() {
            var id = this.id;
            $.post('admin/allowAgain', {'user_id' : id},
                function (res) {
                    if (res == 'ok') {
                        window.location.reload();
                    } else {
                        alert(res);
                    }
                });
        });
    </script>

<?php endif; ?>