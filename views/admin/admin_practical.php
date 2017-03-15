<!-- IF ADMIN -->
<?php if ($auth->is_admin): ?>

    <h3><?= __("Praktilised ülesanded") ?></h3>
    <div class="practical-box">
    <h4 class="h4-custom">Praktilise ülesande lisamine (ära unusta iga rea lõppu panna semikoolonit!)</h4>
    <input type="text" id="new-title" placeholder="Ülesande pealkiri">
        <br>
        <br>
    <textarea class="practical-description" id="new-description" placeholder=
"Ülesannete lisamisel tuleb iga ülesanne jaotada punktideks ning iga punkti lõppu tuleb märkida semikoolon.

Näide:
1. Lisa reavahe.;
2. Muuda taust siniseks.;
3. Muuda enda nime suurus 32px.;
"></textarea>
        <br>
        <br>
    <button id="add-practical" class="btn btn-info">Lisa</button>
    </div>
    <br>
    <br>
    <br>

    <?php $x=-1; ?>
    <?php foreach ($practicalQuestions['title'] as $key => $title): ?>
        <div class="practical-box">
            <h4 class="h4-custom">Praktilise ülesande redigeerimine</h4>
        <?php $x++; ?>
        <form action="POST" class="form">
        <input type="text" value="<?= $title; ?>" id="title-<?= $practicalQuestions['id'][$x] ?>">
            <br>
            <br>
        <textarea name="description-<?= $key ?>" id="description-<?= $practicalQuestions['id'][$x] ?>"
        class="practical-description">
<?= implode(";\n", $practicalQuestions['description'][$key]) . ';' ?>
        </textarea>
        </form>
            <br>
        <button id="edit-<?= $practicalQuestions['id'][$x] ?>" class="btn btn-info editPractical">Muuda</button>
        <button id="delete-<?= $practicalQuestions['id'][$x] ?>" class="btn btn-info deletePractical" data-toggle="modal" data-target=".confirm">Kustuta</button>
        <span id="success-<?= $practicalQuestions['id'][$x] ?>"  class="edit-successful">Muutmine edukas</span>
        <span id="error-<?= $practicalQuestions['id'][$x] ?>" class="edit-error">Muutmine ebaõnnestus</span>
    </div>
        <br>
        <br>
        <br>
    <?php endforeach ?>

    <div class="modal fade confirm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Oled kindel, et soovid kustutada?</h4>
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
                var practicalID = $(this).attr('id').replace('edit-', '');
                var descriptionID = '#description-' + practicalID;
                var data = $(descriptionID).val();
                var practicalTitle = $('#title-' + practicalID).val();

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
                var practicalId = $(this).attr('id').replace('delete-', '');

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

        $(function() {
            var isOpera = !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;

            // Disable for chrome which already supports multiline
            if (! (!!window.chrome && !isOpera)) {
                var style = $('<style>textarea[data-placeholder].active { color: grey; }</style>')
                $('html > head').append(style);

                $('textarea[placeholder]').each(function(index) {
                    var text  = $(this).attr('placeholder');
                    var match = /\r|\n/.exec(text);

                    if (! match)
                        return;

                    $(this).attr('placeholder', '');
                    $(this).attr('data-placeholder', text);
                    $(this).addClass('active');
                    $(this).val(text);
                });

                $('textarea[data-placeholder]').on('focus', function() {
                    if ($(this).attr('data-placeholder') === $(this).val()) {
                        $(this).attr('data-placeholder', $(this).val());
                        $(this).val('');
                        $(this).removeClass('active');
                    }
                });

                $('textarea[data-placeholder]').on('blur', function() {
                    if ($(this).val() === '') {
                        var text = $(this).attr('data-placeholder');
                        $(this).val(text);
                        $(this).addClass('active');
                    }
                });
            }
        });
    </script>
<?php endif; ?>