<!-- IF ADMIN -->
<?php if ($auth->is_admin): ?>

    <h3><?= __("Hindamine") ?></h3>

    <?php if (empty($results)): ?>
        <h4>Pole midagi kuvada</h4>
    <?php endif; ?>

    <!-- NAVIGATION -->
    <div class="col-md-3 left-side">
        <ul class="nav nav-pills nav-stacked" id="myTabs">
            <?php foreach ($results as $result): ?>
                <?php if ($result['practical_points'] != -2): ?>
                    <li>
                        <a href="#user-<?= $result['user_id'] ?>"
                           data-toggle="pill">
                            <?= $result['firstname'] . ' ' . $result['lastname'] . ', ' . $result['social_id'] ?>
                            <br>
                            <?php if ($result['practical_points'] == -2): ?>
                                <span class="not-graded">Tegemata</span>
                            <?php elseif ($result['practical_points'] == -1): ?>
                                <span class="not-graded">Hindamata</span>
                            <?php else: ?>
                                <span class="graded">Hinnatud: </span>
                                <span class="graded"
                                      id="graded-<?= $result['user_id'] ?>">"<?= $result['practical_points'] ?>"</span>
                            <?php endif; ?>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach ?>
        </ul>
    </div>


    <!-- CONTENT -->
    <div class="col-md-9">
        <div class="tab-content">

            <?php foreach ($results as $result): ?>
            <?php if ($result['practical_points'] != -2): ?>
            <?php if (!isset($active)): ?>
            <div class="tab-pane fade in active" id="user-<?= $result['user_id'] ?>">
                <?php else: ?>
                <div class="tab-pane fade" id="user-<?= $result['user_id'] ?>">
                    <?php endif; ?>
                    <?php $active = true; ?>
                    <h4>
                        <?= $result['firstname'] . ' ' . $result['lastname'] . ', ' . $result['social_id'] ?>
                    </h4>

                    <button id="view-<?= $result['user_id'] ?>" class="preview"
                            data-target="#modal-<?= $result['user_id'] ?>"
                            data-toggle="modal">
                        Eelvaade
                    </button>
                    <a href="results/<?= $result['social_id'] ?>.html" target="_blank">Link</a>
                    <br>
                    <br>
                    <pre>
                            <?= htmlentities(file_get_contents('results/' . $result["social_id"] . '.html')); ?>
                        </pre>
                    <h4>HTML errorid</h4>
                    <ul>
                        <?php foreach (unserialize($result['errors']) as $error): ?>
                            <li><?= $error; ?></li>
                        <?php endforeach ?>
                    </ul>
                    <!-- grading -->
                    <h4>Hindamine</h4>
                    <div class="clearBoth"></div>
                    <?php for ($i = 0; $i <= 10; $i++): ?>
                        <?php if ($result['practical_points'] == $i): ?>
                            <input type="radio" checked="checked"
                                   name="<?= $result['user_id'] ?>" value="<?= $i; ?>"> <?= $i; ?>
                        <?php else: ?>
                            <input type="radio" name="<?= $result['user_id'] ?>"
                                   value="<?= $i; ?>"> <?= $i; ?>
                        <?php endif ?>
                    <?php endfor ?>
                    <div class="clearBoth"></div>
                    <br>
                    <button id="<?= $result['user_id'] ?>" class="btn btn-success grading">Hinda</button>
                    <?php if ($result['practical_points'] == -1): ?>
                        <span class="not-graded-<?= $result['user_id'] ?> not-graded">Hindamata</span>
                    <?php else: ?>
                        <span class="graded-<?= $result['user_id'] ?> graded-green">Hinnatud</span>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                <?php endforeach ?>
            </div>
        </div>

    </div>

    <?php foreach ($results as $result): ?>
        <?php if ($result['practical_points'] != -2): ?>

            <!-- PREVIEW MODALS -->
            <div class="modal fade" id="modal-<?= $result['user_id'] ?>" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><?= $result['firstname'] . ' ' . $result['lastname'] . ', ' . $result['social_id'] ?></h4>
                        </div>
                        <div class="modal-body">
                            <iframe class="preview-modal" src="results/<?= $result['social_id'] . '.html' ?>"></iframe>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Sulge</button>
                        </div>
                    </div>

                </div>
            </div>

        <?php endif; ?>
    <?php endforeach ?>


    <script>


        // display preview window on click
        $(".preview").on('click', function (event) {
            var div = '#show-' + this.id;
        });

        // send the grade
        $(".grading").on('click', function (e) {
            event.preventDefault();
            var id = this.id;
            var value = $('input[name=' + id + ']:checked').val();

            $.post('admin/gradePractical', {'user_id': id, 'grade': value},
                function (res) {
                    if (res == 'ok') {
                        // window.location.reload();
                        $('#graded-' + id).html('"' + value + '"');
                        $('.graded-' + id).hide().html("Hinnatud").fadeIn('slow');
                    } else {
                        alert(res);
                    }
                });
        });

    </script>

<?php endif; ?>