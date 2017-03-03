<!-- IF ADMIN -->
<?php if ($auth->is_admin): ?>

    <div class="theoretical-container">

    <h3><?= __("Teoreetilised ülesanded") ?></h3>

        <!-- add new question -->
        <form method="POST" id="form[new]" class="form">
            <table class="table table-bordered theoretical">
                <tr class="question-head">
                    <td><input name="question"  class="questions" type="text" placeholder="KÜSIMUSE LISAMINE" value=""></td>
                </tr>
                <tr><td><input name="correct" class="answers" placeholder="Valik 1 (ÕIGE)" type="text" value=""></td></tr>
                <tr><td><input name="wrong1" class="answers" type="text" placeholder="Valik 2" value=""></td></tr>
                <tr><td><input name="wrong2" class="answers" type="text" placeholder="Valik 3" value=""></td></tr>
                <tr>
                    <td>
                        <a href="" class="btn btn-info btn-lg form-button addTheoretical">Lisa</a>
                    </td>
                </tr>
            </table>
        </form>

    <!-- main questions -->
        <?php foreach ($questions as $question): ?>
            <form method="POST" id="form[<?= $question['question_id'] ?>]" class="form">
            <table class="table table-bordered theoretical">

            <tr class="question-head">
                <td><input name="question[<?= $question['question_id'] ?>]" class="questions" type="text" value="<?= $question['question'] ?>"></td>
            </tr>

            <?php foreach ($question['answers'] as $answer): ?>
            <tr>
                <td><input name="answers[<?= $answer['id'] ?>]" class="answers" type="text" value="<?= $answer['text'] ?>"></td>
            </tr>
            <?php endforeach ?>
            <tr>
                <td>
                    <a href="" class="btn btn-info btn-lg form-button editTheoretical">Muuda</a>
                    <a href="" class="btn btn-info btn-lg form-button deleteTheoretical" data-toggle="modal" data-target=".confirm">Kustuta</a>
                    <span id="success[<?= $question['question_id'] ?>]]"  class="edit-successful">Muutmine edukas</span>
                    <span id="error[<?= $question['question_id'] ?>]]" class="edit-error">Muutmine ebaõnnestus</span>
                </td>
            </tr>
            </table>
            </form>
        <?php endforeach ?>
    </div>

    <div class="modal fade confirm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Oled kindel, et soovid kustutada?</h4>
                    <h4 id="checked"></h4>
                </div>
                <div class="modal-footer">
                    <button id = "yes" type="button" class="btn btn-default" data-dismiss="modal">Jah</button>
                    <button id = "no" type="button" class="btn btn-primary">Ei</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<?php endif; ?>