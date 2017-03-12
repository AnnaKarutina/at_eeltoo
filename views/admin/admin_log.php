<!-- IF ADMIN -->
<?php if ($auth->is_admin): ?>

    <h3><?= __("Logi") ?></h3>

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

    <?php if(empty($resultsLog)): ?>
        <h4>Pole midagi kuvada</h4>
    <?php endif; ?>
    <footer>
        <div class="col-md-4 footer-block">
            <span>Tartu Kutsehariduskeskus</span><br/>
            <span>Kopli 1, 50115 Tartu</span><br/>
        </div>
        <div class="col-md-4 footer-block">
            <span>E-post: <a href="info@khk.ee">info@khk.ee</a> </span><br/>
            <span>Telefon: 7 361 866</span><br/>
        </div>
        <div class="col-md-4 footer-block">
            <a href="http://www.facebook.com/kutseharidus">
                <img id="fb-logo" src="images/fb_logo.png" alt="fb-logo">
            </a>
        </div>
    </footer>
<?php endif; ?>