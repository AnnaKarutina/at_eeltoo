<!-- main html generator -->
<h1 class="quiz-title">CSS & HTML / Vali õige vastus</h1>
<form action="test/practical " method="POST" id="quiz">
    <?php foreach ($questions as $question): ?>
        <article>
            <p><?= $question['question'] ?></p>
            <ul>
                <?php foreach ($question['answers'] as $answer): ?>
                    <li>
                        <label>
                            <input class="quiz-radio" type="radio" value="<?= $answer['id'] ?>"
                                   name="answers[<?= $question['question_id'] ?>]">
                            <mark class="answer-right"><?= $answer['text'] ?></mark>
                        </label>
                    </li>
                <?php endforeach ?>
            </ul>
        </article>
    <?php endforeach ?>
    <a href="#" id="submit-quiz" class="btn btn-info btn-lg form-button" data-toggle="modal" data-target=".confirm">Esita</a>
</form>

<div class="modal fade confirm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Oled sa kindel, et soovid esitada lahendust?</h4>
                <h4 id="checked"></h4>
            </div>
            <div class="modal-footer">
                <button id="yes" type="button" class="btn btn-default" data-dismiss="modal">Jah</button>
                <button id="no" type="button" class="btn btn-primary">Ei</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
