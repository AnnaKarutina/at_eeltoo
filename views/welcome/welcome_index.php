<h1>HTML + CSS.</h1>
<h5>Testi lahendamine</h5>
<p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac condimentum odio,
    non ullamcorper metus. Suspendisse hendrerit tincidunt nibh. Donec consectetur
    pretium convallis. Cras fringilla orci vel metus maximus, eu interdum leo
    sollicitudin. Integer nec aliquam magna. Phasellus a aliquet enim, in fermentum
    diam. Sed venenatis pellentesque turpis nec luctus. Phasellus a justo et justo
    fermentum scelerisque eu eu quam. Suspendisse hendrerit urna id fringilla viverra.
    Praesent elementum, sem sit amet euismod fermentum, libero lectus auctor neque, a
    aliquam elit nulla sed odio..

    Proin feugiat ipsum mauris, sed pellentesque urna porta sit amet. Mauris sit amet
    maximus ante. Mauris placerat nulla vitae dignissim ultricies. Sed ut nunc et risus
    porttitor pellentesque. Donec dapibus volutpat augue, eu aliquet leo pulvinar ut.
    Suspendisse in est erat. Maecenas mollis fringilla ornare. Duis bibendum, arcu sit
    amet commodo tincidunt, ligula sem congue ligula, eu vestibulum ante felis nec dolor.
    In ullamcorper orci at erat rutrum, eu tincidunt arcu pellentesque. Aliquam tempus,
    urna id venenatis laoreet, sem magna tempus erat, sit amet pellentesque tortor nulla
    in mauris.

    Praesent in dui convallis, finibus dui vel, fermentum purus. Proin at vehicula arcu.
    Pellentesque feugiat laoreet magna non elementum. Praesent nec enim tempor, sodales
    tortor sit amet, fermentum metus. Nulla facilisi. Phasellus pellentesque sem nulla,
    vitae blandit risus elementum ut. Nulla laoreet commodo odio sed tincidunt. Integer
    mollis tristique finibus.

    Integer vel dolor ex. In laoreet, leo vel varius malesuada, magna leo tempus eros,
    quis ornare est erat eu dui. Phasellus mollis leo ut venenatis molestie. Phasellus
    ullamcorper mollis turpis ac porttitor. Nulla non dui nulla. Suspendisse sodales,
    felis elementum facilisis placerat, tortor nunc pharetra ex, a imperdiet dolor odio
    eu nisl. Maecenas aliquet lectus nisl, volutpat vestibulum ex euismod scelerisque.
    Quisque sapien risus, feugiat ut placerat a, lacinia vitae purus. Integer non
    tincidunt leo. Duis vitae enim maximus, condimentum metus non, ullamcorper turpis.

    Mauris pulvinar elit mauris, eu auctor nibh commodo a. Aliquam mattis libero nec
    urna imperdiet bibendum. Vestibulum viverra, arcu ac scelerisque luctus, nisi velit
    ornare nisl, at viverra magna sapien ac tellus. Etiam quam turpis, ultrices dictum
    justo eu, dictum gravida nulla. Vestibulum sollicitudin pretium nunc ac rutrum.
    Vivamus dapibus quis ligula cursus rutrum. Aliquam tellus felis, consectetur commodo
    lacinia eget, tincidunt sed diam.
</p>
<a href="#" class="btn btn-info btn-lg" data-toggle="modal"
   data-target="#login-modal">Registreeri testile</a>

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
                <input type="password" id="password" placeholder="Parool"/>
                <input type="button" id="btnLogin" class="login loginmodal-submit" value="Alusta">
            </form>
        </div>
    </div>
</div>
<script src="assets/js/main.js"></script>

<script>
    $('#btnLogin').on('click', function () {
        if (validateForm()) {
            $.post('welcome/register', {
                "firstName": $("#firstName").val(),
                "lastName": $("#lastName").val(),
                "social_id": $("#social_id").val(),
                "password": $("#password").val()
            }, function (res) {
                if (res == 'ok') {
                    window.location.href = 'test';
                }
            });
        }
    });
</script>
