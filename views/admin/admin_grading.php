<!-- IF ADMIN -->
<?php if ($auth->is_admin): ?>

    <h3><?= __("Hindamine") ?></h3>

    <div class="panel-group" id="accordion">

        <?php foreach ($results as $result): ?>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#user-<?= $result['user_id'] ?>">
                            <?= $result['firstname'] . ' ' . $result['lastname'].', '.$result['social_id'] ?></a>
                    </h4>
                    <?php if($result['practical_points'] == -2): ?>
                        <span class="not-graded">Tegemata</span>
                    <?php elseif($result['practical_points'] == -1): ?>
                        <span class="not-graded">Hindamata</span>
                    <?php else: ?>
                        <span class="graded">Hinnatud: </span> "<?= $result['practical_points'] ?>"
                    <?php endif; ?>
                </div>
                <div id="user-<?= $result['user_id'] ?>" class="panel-collapse collapse">
                    <div class="panel-body">
                        <button id="view-<?= $result['user_id'] ?>" class="preview">Eelvaade</button>
                        <a href="results/<?= $result['social_id'] ?>.html" target="_blank">Link</a>
                        <br>
                        <br>
                        <div id="show-view-<?= $result['user_id'] ?>" class="this" style="display: none;">
                            <iframe src="results/<?= $result['social_id'] ?>.html"></iframe>
                        </div>
                        <pre>
                            <?= htmlentities(file_get_contents('results/'.$result["social_id"].'.html')); ?>
                        </pre>
                        <h4>HTML errorid</h4>
                        <!-- grading -->
                        <h4>Hindamine</h4>
                        <div class="clearBoth"></div>
                        <?php for ($i = 0; $i <= 10; $i++): ?>
                            <input type="radio" name="<?= $result['user_id'] ?>" value="<?= $i; ?>"> <?= $i; ?>
                        <?php endfor ?>
                        <div class="clearBoth"></div>
                        <br>
                        <button id="<?= $result['user_id'] ?>" class="btn btn-success grading">Hinda</button>
                        <?php if($result['practical_points'] == -1): ?>
                            <span class="not-graded">Hindamata</span>
                        <?php else: ?>
                            <span class="graded">Hinnatud</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        <?php endforeach ?>

    </div>

    <script>

        // hide preview window if user clicks anywhere
        $('html').click(function() {
            $('.this').hide(600);
        })

        // display preview window on click
        $(".preview").on('click', function(event) {
            event.stopPropagation();
            var div = '#show-'+this.id;
            $(div).toggle(600);
        });

        // send the grade
        $(".grading").on('click', function(e) {
            event.preventDefault();
            var id = this.id;
            var value = $('input[name='+id+']:checked').val();

            $.post('admin/gradePractical', {'user_id' : id, 'grade' : value},
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