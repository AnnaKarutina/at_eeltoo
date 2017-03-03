<!-- IF ADMIN -->
<?php if ($auth->is_admin): ?>
    <div class="theoretical-container">

    <h3><?= __("Teoreetilised ülesanded") ?></h3>

    <!-- main html generator -->
    <form action="test/practical" method="POST" id="quiz">
        <?php foreach ($questions as $question): ?>
            <table class="table table-bordered theoretical">

            <tr class="question-head">
                <td><input class="questions" type="text" value="<?= $question['question'] ?>"></td>
            </tr>

            <?php foreach ($question['answers'] as $answer): ?>
            <tr>
                <td><input class="answers" type="text" value="<?= $answer['text'] ?>"></td>
            </tr>
            <?php endforeach ?>

            </table>
        <?php endforeach ?>
    </form>

    </div>

<?php endif; ?>