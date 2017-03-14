<!-- IF ADMIN -->
<?php if ($auth->is_admin): ?>

    <h3><?= __("Hindamine") ?></h3>

    <?php if (empty($results)): ?>
        <h4>Pole midagi kuvada</h4>
    <?php endif; ?>
    <div class="grading-wrapper">
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
                                    <span class="not-graded-<?= $result['user_id'] ?> not-graded">Hindamata</span>
                                <?php else: ?>
                                    <span class="graded">Hinnatud: </span>
                                    <span class="graded"
                                          id="graded-<?= $result['user_id'] ?>">
                                        "<?= $result['practical_points'] ?>"</span>
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
                <?php if(empty($results['user_id'])): ?>
                <h4>Midagi pole kuvada</h4>
                <?php endif; ?>

                <?php foreach ($results as $result): ?>
                    <?php if ($result['practical_points'] != -2): ?>
                        <div class="tab-pane fade" id="user-<?= $result['user_id'] ?>">
                            <h4>
                                <?=
                                $result['firstname'] . ' ' .
                                $result['lastname'] . ', ' .
                                $result['social_id'] . ', ' .
                                date("d.m.Y", strtotime($result['date']));
                                ?>,
                                <a href src="#" id="practical-<?= $result['user_id'] ?>" class="practical-text"
                                   data-target="#practical-text-<?= $result['user_id'] ?>"
                                   data-toggle="modal">
                                    <?= $result['practical_title']; ?>
                                </a>
                            </h4>
                            <?php if (file_exists('results/' . $result['social_id'] . '.html')): ?>
                                <button id="view-<?= $result['user_id'] ?>" class="preview"
                                        data-target="#modal-<?= $result['user_id'] ?>"
                                        data-toggle="modal">
                                    Eelvaade
                                </button>
                                <a href="results/<?= $result['social_id'] ?>.html" target="_blank">Link</a>
                                <br>
                                <br>
                            <?php else: ?>
                                <h5>Antud isiku kohta puudub HTML fail</h5>
                            <?php endif; ?>
<pre>
<?= htmlentities(file_get_contents('results/' . $result["social_id"] . '.html')); ?>
</pre>
                            <?php if (!empty($result['practical_errors'])): ?>
                            <h4>HTML errorid</h4>
                        <?php if (empty(unserialize($result['practical_errors']))): ?>
                            <h6>Document checking completed. No errors or warnings to show.</h6>
                        <?php endif; ?>
                            <ul>
                                <?php foreach (unserialize($result['practical_errors']) as $error): ?>
                                    <li><?= $error; ?></li>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                            <!-- grading -->
                            <h4>Hindamine</h4>


                            <div class="btn-group" data-toggle="pill">
                                <?php for ($i = 0; $i <= 10; $i++): ?>
                                    <?php if ($result['practical_points'] == $i): ?>
                                        <label id="<?= $result['user_id'] ?>" class="btn active focus">
                                            <input type="radio" name="<?= $result['user_id'] ?>" value="<?= $i; ?>">
                                            <span><?= $i; ?></span>
                                        </label>
                                    <?php else: ?>
                                        <label id="<?= $result['user_id'] ?>" class="btn">
                                            <input type="radio" name="<?= $result['user_id'] ?>" value="<?= $i; ?>">
                                            <span><?= $i; ?></span>
                                        </label>
                                    <?php endif ?>
                                <?php endfor ?>
                            </div>

                            <?php if ($result['practical_points'] == -1): ?>
                                <span class="bottom-not-graded-<?= $result['user_id'] ?> not-graded">Hindamata</span>
                            <?php else: ?>
                                <span class="graded-<?= $result['user_id'] ?> graded-green">Hinnatud</span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach ?>
            </div>
        </div>

    </div>
    </div>

    <?php foreach ($results as $result): ?>
        <!-- PREVIEW MODALS -->
        <div class="modal fade" id="practical-text-<?= $result['user_id'] ?>" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"><?= $result['practical_title']; ?></h4>
                    </div>
                    <div class="modal-body">
                        <ul class="list-none">
                        <?php foreach (explode(';', $result['practical_text'], -1) as $line ): ?>
                            <li><?= $line; ?></li>
                        <?php endforeach ?>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Sulge</button>
                    </div>
                </div>

            </div>
        </div>
    <?php endforeach ?>


    <?php if (file_exists('results/' . $result['social_id'] . '.html')): ?>
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
                                <iframe class="preview-modal"
                                        src="results/<?= $result['social_id'] . '.html' ?>"></iframe>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Sulge</button>
                            </div>
                        </div>

                    </div>
                </div>

            <?php endif; ?>
        <?php endforeach ?>
    <?php endif; ?>


    <script>

        $(document).ready(function () {

            // make the first items active
            $('ul#myTabs li:first').addClass('active');
            $('.tab-content .tab-pane:first').addClass('in active');

            // display preview window on click
            $(".practical-text").on('click', function (event) {
                event.preventDefault();
            });

            // fancy grading
            $('label').on('click', function (event) {

                $(this).closest('.btn-group').find('.active').removeClass('active focus');
                $(this).prop('checked', true);
                $(this).addClass('active focus');

                var id = this.id;
                var value = $('.active>input[name=' + id + ']').val();

                $.post('admin/gradePractical', {'user_id': id, 'grade': value},
                    function (res) {
                        if (res == 'ok') {
                            // remove not graded class, hide it, change value, add class and fade it in (in pillar title)
                            $('.not-graded-' + id).removeClass('not-graded').addClass('graded').hide().html('Hinnatud: "'+value+'"').fadeIn();
                            // same as above but for the pillar data (next to grades)
                            $('.bottom-not-graded-' + id).removeClass('not-graded').addClass('graded-green').hide().html('Hinnatud');
                            // change the grade in the title should it be changed
                            $('#graded-' + id).html('"' + value + '"');
                            // blink the graded text when a change is made
                            $('.graded-green').fadeOut('fast').fadeIn('fast');
                        } else {
                            alert(res);
                        }
                    });

            })
        });


    </script>

<?php endif; ?>