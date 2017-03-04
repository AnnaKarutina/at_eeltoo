<!-- import custom markup JS -->
<script src="assets/js/codemirror.js"></script>

<form action="test/result" method="post" id="target">
    <textarea wrap="hard" name="validateHTML" id="code" class="validateHTML"></textarea>
    <br>
    <input type="hidden" value="Submit">
        <a href="#" class="btn btn-info btn-lg form-button" data-toggle="modal" data-target=".confirm">Esita</a>
</form>

<!-- Confirm modal -->
<div class="modal fade confirm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Oled sa kindel, et soovid esitada lahendust?</h4>
            </div>
            <div class="modal-footer">
                <button id = "yes" type="button" class="btn btn-default" data-dismiss="modal">Jah</button>
                <button id = "no" type="button" class="btn btn-primary">Ei</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<script>
    $( "#yes" ).click(function() {
        $( "#target" ).submit();
    });
    $( "#no" ).click(function() {
        $('.confirm').modal('hide');
    });
</script>

<script>
    var mixedMode = {
        name: "htmlmixed",
        scriptTypes: [{matches: /\/x-handlebars-template|\/x-mustache/i,
            mode: null},
            {matches: /(text|application)\/(x-)?vb(a|script)/i,
                mode: "vbscript"}]
    };
    var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
        lineNumbers: true,
        mode: mixedMode
    });
</script>
<ul>
<?php foreach ($practicalQuestions as $practicalQuestion): ?>
    <li><?= $practicalQuestion ?></li>
<?php endforeach ?>
</ul>
