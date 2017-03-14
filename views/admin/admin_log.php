<!-- IF ADMIN -->
<?php if ($auth->is_admin): ?>

    <h3><?= __("Logi") ?></h3>
    <div class="table-box responsive">

    <h5>Otsing</h5>
    <input type="text" id="search-log" onkeyup="searchFilter()" placeholder="&#128269; Otsi inimest...">
        <br>
    <table class="table table-bordered results">
        <tr>
            <th>Nimi</th>
            <th>Isikukood</th>
            <th>T. test (punktid)</th>
            <th>Küsimusi</th>
            <th>P. test (punktid)</th>
            <th>Kuupäev</th>
            <th>Kokku (punktid)</th>
        </tr>
        <?php foreach ($resultsLog as $resultLog): ?>
            <tr>
                <td><?= $resultLog['firstname'].' '.$resultLog['lastname'] ?></td>
                <td><?= $resultLog['social_id'] ?></td>
                <td>
                    <?php if($resultLog['theoretical_points'] == -1): ?>
                        <span class="not-graded">Tegemata</span>
                    <?php else: ?>
                        <?= $resultLog['theoretical_points'] ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($resultLog['nr_of_questions'] == 0): ?>
                        Korduv
                    <?php else: ?>
                        <?= $resultLog['nr_of_questions'] ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($resultLog['practical_points'] == -2): ?>
                        <span class="not-graded">Tegemata</span>
                    <?php elseif($resultLog['practical_points'] == -1): ?>
                        <span class="not-graded">Hindamata</span>
                    <?php else: ?>
                        <?= $resultLog['practical_points'] ?>
                    <?php endif; ?>
                </td>
                <td><?= date("d.m.Y", strtotime($resultLog['date']));;?></td>
                <td><?= $resultLog['sum'] ?></td>
            </tr>
        <?php endforeach ?>
    </table>
    </div>
    <?php if(empty($resultsLog)): ?>
        <h4>Pole midagi kuvada</h4>
    <?php endif; ?>

    <script>
        function searchFilter() {
            var filter = $('#search-log').val().toUpperCase();

            $('tr:not(:first-child)').each(function(){
                if($(this).html().toUpperCase().indexOf(filter) > -1) {
                    $(this).fadeIn('fast');
                } else {
                    $(this).fadeOut('fast');
                }
            });
        }
    </script>

<?php endif; ?>