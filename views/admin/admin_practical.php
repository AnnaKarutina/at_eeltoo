<!-- IF ADMIN -->
<?php if ($auth->is_admin): ?>

    <h3><?= __("Praktilised ülesanded") ?></h3>

    <h4>Praktilise ülesande lisamine</h4>
    <input type="text" id="new-title" placeholder="Pealkiri">
    <textarea class="practical-description" id="new-description" placeholder="Praktilise ülesande kirjeldus"></textarea>
    <button id="add-practical" class="btn btn-info">Lisa</button>
    <br>
    <br>
    <br>

    <h4>Praktiliste ülesannete redigeerimine</h4>
    <?php $x=-1; ?>
    <?php foreach ($practicalQuestions['title'] as $key => $title): ?>
        <?php $x++; ?>
        <form action="POST" class="form">
        <input type="text" value="<?= $title; ?>" id="title-<?= $practicalQuestions['id'][$x] ?>">
        <textarea name="description-<?= $key ?>" id="description-<?= $practicalQuestions['id'][$x] ?>"
        class="practical-description"
        value="<?= implode(";\n", $practicalQuestions['description'][$key]) . ';' ?>">
<?= implode(";\n", $practicalQuestions['description'][$key]) . ';' ?>
        </textarea>
        </form>
        <button id="<?= $practicalQuestions['id'][$x] ?>" class="btn btn-info editPractical">Muuda</button>
        <button id="<?= $practicalQuestions['id'][$x] ?>" class="btn btn-info deletePractical" data-toggle="modal" data-target=".confirm">Kustuta</button>
        <span id="success-<?= $practicalQuestions['id'][$x] ?>"  class="edit-successful">Muutmine edukas</span>
        <span id="error-<?= $practicalQuestions['id'][$x] ?>" class="edit-error">Muutmine ebaõnnestus</span>
        <br>
        <br>
        <br>
    <?php endforeach ?>

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

    <script>

        $( document ).ready(function() {
            // practical questions ajax edit
            $(".editPractical").click(function (event) {
                event.preventDefault();

                // get id's and data
                var practicalID = $(this).attr('id');
                var descriptionID = '#description-' + $(this).attr('id');
                var data = $(descriptionID).val();
                var practicalTitle = $('#title-' + $(this).attr('id')).val();

                // post to php
                $.post('admin/editPractical',
                    {
                        'practical_id' : practicalID,
                        'practical_text' : data,
                        'practical_title' : practicalTitle
                    },
                 function (res) {
                 if (res == 'ok') {
                     $('#error-' + practicalID).hide();
                     $('#success-' + practicalID).fadeOut(75).fadeIn(75).animate({opacity: 1}, 500).delay(1000);
                 } else {
                    $('#success-' + practicalID).hide();
                    $('#error-' + practicalID).fadeOut(75).fadeIn(75).animate({opacity: 1}, 500).delay(1000);
                    }
                 });
            });

            // delete practical task
            $(".deletePractical").click(function (event) {
                event.preventDefault();
                var practicalId = $(this).attr('id');

                $("#yes").click(function () {
                    $.post('admin/deletePractical', {'practical_id' : practicalId},
                        function (res) {
                            if (res == 'ok') {
                                window.location.reload();
                            } else {
                                console.log(res);
                            }
                        });
                });

                $("#no").click(function () {
                    $('.confirm').modal('hide');
                });
            });

            $("#add-practical").click(function (event) {
                event.preventDefault();
                var practicalTitle = $('#new-title').val();
                var practicalText = $('#new-description').val();

                $.post('admin/addPractical',
                    {
                        'practical_title' : practicalTitle,
                        'practical_text' : practicalText
                    },
                    function (res) {
                        if (res == 'ok') {
                            window.location.reload();
                        } else {
                            alert(res);
                        }
                    });
            })

        });


    </script>
<?php endif; ?>