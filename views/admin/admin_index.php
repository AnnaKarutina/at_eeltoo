<!-- IF ADMIN -->
<?php if ($auth->is_admin): ?>

    <h3><?= __("Tulemused") ?></h3>
<div class="table-box responsive">
    <table class="table table-bordered results">
        <tr>
            <th>Nimi</th>
            <th>Isikukood</th>
            <th>T. test (punktid)</th>
            <th>Küsimusi</th>
            <th>P. test (punktid)</th>
            <th>Kokku (punktid)</th>
            <th>Kuupäev</th>
            <th>Korduv</th>
            <th>Kustuta</th>
        </tr>
        <?php foreach ($results as $result): ?>
            <tr id="row-<?= $result['user_id']; ?>">
                <td><?= $result['firstname'] . ' ' . $result['lastname'] ?></td>
                <td><?= $result['social_id'] ?></td>
                <td>
                    <?php if ($result['theoretical_points'] == -1): ?>
                        <span class="not-graded">Tegemata</span>
                    <?php else: ?>
                        <?= $result['theoretical_points'] ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if ($result['nr_of_questions'] == 0): ?>
                        Korduv
                    <?php else: ?>
                        <?= $result['nr_of_questions'] ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if ($result['practical_points'] == -2): ?>
                        <span class="not-graded">Tegemata</span>
                    <?php elseif ($result['practical_points'] == -1): ?>
                        <span class="not-graded">Hindamata</span>
                    <?php else: ?>
                        <?= $result['practical_points'] ?>
                    <?php endif; ?>
                </td>
                <td><?= $result['sum'] ?> / <?= $result['nr_of_questions']+10 ?></td>
                <td><?= date("d.m.Y", strtotime($result['date'])); ?></td>
                <td>
                    <?php if ($result['practical_points'] != -2 && $result['practical_points'] != -2): ?>
                        <button type="button" id="<?= $result['user_id']; ?>" class="allowAgain">Luba</button>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="#" data-toggle="modal" data-target=".confirm-delete"
                       id="delete-<?= $result['user_id']; ?>" class="del-icon">
                        <img src="images/trash.png" height="20" alt="trash">
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</div>

    <?php if (empty($results)): ?>
        <h4>Pole midagi kuvada</h4>
        <?php else: ?>
        <button type="button" id="pushToLog" data-toggle="modal" data-target=".confirm">Tühjenda</button>
        <span id="pushToLog-successful" class="edit-successful">Muutmine edukas</span>
        <span id="pushToLog-error" class="edit-error">Muutmine ebaõnnestus</span>
    <?php endif; ?>

    <!-- push to log modal -->
    <div class="modal fade confirm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Oled sa kindel, et soovid tabelit tühjendada? Tagasiteed ei ole!</h4>
                </div>
                <div class="modal-footer">
                    <button id="yes" type="button" class="btn btn-default" data-dismiss="modal">Jah</button>
                    <button id="no" type="button" class="btn btn-primary">Ei</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- delete one row modal -->
    <div class="modal fade confirm-delete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Oled sa kindel, et soovid antud sissekannet kustutada?</h4>
                </div>
                <div class="modal-footer">
                    <button id="yes-delete" type="button" class="btn btn-default" data-dismiss="modal">Jah</button>
                    <button id="no-delete" type="button" class="btn btn-primary">Ei</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
        // allow user to take the test again in case of error or change of heart
        $(".allowAgain").click(function () {
            var id = this.id;
            $.post('admin/allowAgain', {'user_id': id},
                function (res) {
                    if (res == 'ok') {
                        window.location.reload();
                    } else {
                        alert(res);
                    }
                });
        });


        // allow admin to delete files from result page and push them to the log table
        $("#pushToLog").click(function (event) {
            event.preventDefault();

            $("#yes").click(function () {
                $.post('admin/pushToLog',
                    function (res) {
                        if (res == 'ok') {
                            $('#pushToLog-error').hide();
                            $('#pushToLog-successful').fadeOut(75).fadeIn(75).animate({opacity: 1}, 500).delay(1000);
                            window.location.reload();
                        } else {
                            $('#pushToLog-successful').hide();
                            $('#pushToLog-error').fadeOut(75).fadeIn(75).animate({opacity: 1}, 500).delay(1000);
                        }
                    });

            });
            $("#no").click(function () {
                $('.confirm').modal('hide');
            });
        });

        // allow admin to delete files from result page and push them to the log table
        $(".del-icon").click(function (event) {
            event.preventDefault();
            // remove delete- and get only the id
            var id = $(this).attr('id').replace('delete-', '');
            console.log(id);

            $("#yes-delete").click(function () {
                $.post('admin/deleteResult', {'user_id': id},
                    function (res) {
                        if (res == 'ok') {
                            $('#row-' + id).fadeOut();
                        } else {
                            console.log(res);
                        }
                    });

            });
            $("#no-delete").click(function () {
                $('.confirm-delete').modal('hide');
            });
        });

    </script>

<?php endif; ?>