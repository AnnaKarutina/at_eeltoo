<!-- IF ADMIN -->
<?php if ($auth->is_admin): ?>

    <h3><?= __("Seaded") ?></h3>
    <hr>
    <h4>Teoreetiliste küsimuste arv testis</h4>
    <form method="POST" id="editQuestionCount">
        <select name="nr_of_questions" class="settings-selection">
            <?php for ($i = 1; $i <= $totalQuestions; $i++): ?>
                <option value="<?= $i; ?>" <?= ($i == $settings['nr_of_questions']) ? 'selected' : ''; ?>><?= $i; ?></option>
            <?php endfor ?>
        </select>
        <a href="" class="btn btn-info btn-lg form-button editQuestionCount settings-btn">Muuda</a>
        <span id="editQuestionCount-successful" class="edit-successful">Muutmine edukas</span>
        <span id="editQuestionCount-error" class="edit-error">Muutmine ebaõnnestus</span>
    </form>
    <hr>

    <h4>Testi PIN-kood</h4>
    <form action="#">
        <input type="text" name="password" id="generatedPassword" value="<?= $settings['pwd'] ?>">
        <input type="button" class="btn btn-info btn-lg form-button settings-btn" id="generatePassword"
               value="Genereeri">
    </form>
    <hr>

    <h4>Testi avamine määratud ajaperioodiks (tunnid)</h4>
    <form method="POST" id="openTest">
        <select name="test_hours" class="settings-selection">
            <?php for ($i = 2; $i <= 8; $i++): ?>
                <option value="<?= $i; ?>" <?= ($i == 4) ? 'selected' : ''; ?>><?= $i; ?></option>
            <?php endfor ?>
        </select>
        <a href="" class="btn btn-info btn-lg form-button openTest settings-btn">Ava</a>
        <a href="" class="btn btn-info btn-lg form-button closeTest settings-btn">Sulge</a>
        <span id="openTest-successful" class="edit-successful">Muutmine edukas</span>
        <span id="openTest-error" class="edit-error">Muutmine ebaõnnestus</span>
    </form>

    <span id="liveTime"><?= $time['time'] > 0 ? $time['time'] : 'Test on suletud' ?></span>
    <hr>

    <h4>HTML koodi valideerimine W3C API kaudu</h4>
    <form method="POST" id="validationOption">
        <select name="validationOption" class="settings-selection">
            <option value="1" <?= ($settings['htmlvalidator'] == 1) ? 'selected' : ''; ?>>Jah</option>
            <option value="0" <?= ($settings['htmlvalidator'] == 0) ? 'selected' : ''; ?>>Ei</option>
        </select>
        <a href="" class="btn btn-info btn-lg form-button validationOption settings-btn">Muuda</a>
        <span id="validationOption-successful" class="edit-successful">Muutmine edukas</span>
        <span id="validationOption-error" class="edit-error">Muutmine ebaõnnestus</span>
    </form>
    <hr>

    <h4>HTML-i reaalajas eelvaade praktilise ülesande juures</h4>
    <form method="POST" id="liveOption">
        <select name="liveOption" class="settings-selection">
            <option value="1" <?= ($settings['livehtml'] == 1) ? 'selected' : ''; ?>>Jah</option>
            <option value="0" <?= ($settings['livehtml'] == 0) ? 'selected' : ''; ?>>Ei</option>
        </select>
        <a href="" class="btn btn-info btn-lg form-button liveOption settings-btn">Muuda</a>
        <span id="liveOption-successful" class="edit-successful">Muutmine edukas</span>
        <span id="liveOption-error" class="edit-error">Muutmine ebaõnnestus</span>
    </form>
    <hr>

    <h4>Avalik pingerida</h4>
    <form method="POST" id="scoreOption">
        <select name="scoreOption" class="settings-selection">
            <option value="1" <?= ($settings['scores'] == 1) ? 'selected' : ''; ?>>Jah</option>
            <option value="0" <?= ($settings['scores'] == 0) ? 'selected' : ''; ?>>Ei</option>
        </select>
        <select name="scorePrivateOption" class="settings-selection">
            <option value="1" <?= ($settings['scores_private'] == 1) ? 'selected' : ''; ?>>Nimi peidetud</option>
            <option value="0" <?= ($settings['scores_private'] == 0) ? 'selected' : ''; ?>>Nimi nähtav</option>
        </select>
        <a href="" class="btn btn-info btn-lg form-button scoreOption settings-btn">Muuda</a>
        <span id="scoreOption-successful" class="edit-successful">Muutmine edukas</span>
        <span id="scoreOption-error" class="edit-error">Muutmine ebaõnnestus</span>
    </form>

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

    <script>
        // refresh time
        setInterval(function () {
            $.post('admin/liveTime', 'test',
                function (res) {
                    $('#liveTime').html(res);
                });
        }, 1000);
    </script>

<?php endif; ?>