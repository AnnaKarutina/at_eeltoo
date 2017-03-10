<h1 class="">Noorem tarkvaraarendaja ja veebispetsialist</h1>
<h3>Sisseastumiskatsed</h3>
<div class="welcome-text">
    <p>
        Tere tulemast Tartu Kutsehariduskeskuse noorem tarkvaraarendaja ja veebispetsialisti eriala sisseastumiskatsetele!
        Sind ootavad ees valikvastustega teoreetiline test ja praktiline test HTMLi ja CSSi kohta. Teoreetiline test sisaldab
        10 küsimust, kus igal küsimusel on ainult üks õige vastus. Praktilises ülesandes tuleb lähtuvalt ülesande sisust
        kirjutada koodi kasutades HTMLi ja CSSi elemente. Testi lõpus näed oma tulemust ning saad suunduda ingliskeelsele
        vestlusele.
    </p>
</div>
<div class="center">
<a href="#" class="btn btn-info btn-lg" data-toggle="modal"
           data-target="#login-modal">Registreeri testile</a>
</div>

<!-- log in modal -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <h1>Sisesta oma andmed</h1><br>
            <form name="register" action="actions/validate_user.php" autocomplete="off">
                <input autocomplete="false" name="hidden" type="text" style="display:none;">
                <input type="text" name="firstName" id="firstName" placeholder="Eesnimi"/>
                <input type="text" name="lastName" id="lastName" placeholder="Perenimi"/>
                <input type="text" id="prevent_autofill" value="" style="display:none;"/>
                <input type="text" name="social_id" id="social_id" placeholder="Isikukood"/>
                <input type="text" id="prevent_autofill" value="" style="display:none;"/>
                <input type="password" id="password" placeholder="PIN-kood"/>
                <input type="submit" id="btnLogin" class="login loginmodal-submit" value="Alusta">
            </form>
        </div>
    </div>
</div>

<script>
    $('#btnLogin').on('click', function (event) {
        event.preventDefault();
        if (validateForm()) {
            $.post('welcome/register', {
                "firstName": $("#firstName").val(),
                "lastName": $("#lastName").val(),
                "social_id": $("#social_id").val(),
                "password": $("#password").val()
            }, function (res) {
                if (res == 'ok') {
                    window.location.href = 'test';
                } else {
                    alert(res);
                }
            });
        }
    });
</script>
