$(document).ready(function () {

    // clear any input that might have been saved via browser itself earlier
    $('#username').val("");
    $('#password').val("");

    // theoretical questions ajax edit
    $(".editTheoretical").click(function () {
        event.preventDefault();
        var data = $(this).closest('form').serialize();
        var selectorSuccessful = $(this).closest('form').find('.edit-successful').attr('id');
        var selectorError = $(this).closest('form').find('.edit-error').attr('id');
        var id1 = ($(document.getElementById(selectorSuccessful)));
        var id2 = ($(document.getElementById(selectorError)));
        $.post('admin/editTheoretical', data,
            function (res) {
                if (res == 'ok') {
                    $(id2).hide();
                    $(id1).fadeOut(75).fadeIn(75).animate({opacity: 1}, 500).delay(1000);
                } else {
                    $(id1).hide();
                    $(id2).fadeOut(75).fadeIn(75).animate({opacity: 1}, 500).delay(1000);
                }
            });
    });

    // theoretical questions ajax delete
    $(".deleteTheoretical").click(function () {

        event.preventDefault();
        var selectorForm = $(this).closest('form').attr('id');
        var id1 = ($(document.getElementById(selectorForm)));
        var data = $(this).closest('form').serialize();

        $("#yes").click(function () {
            console.log(id1);
            $.post('admin/deleteTheoretical', data,
                function (res) {
                    if (res == 'ok') {
                        $(id1).hide();
                    } else {
                        console.log('Error deleting entry.');
                    }
                });
        });

        $("#no").click(function () {
            $('.confirm').modal('hide');
        });
    });

    // theoretical questions ajax delete
    $(".addTheoretical").click(function () {
        event.preventDefault();
        var selectorForm = $(this).closest('form').attr('id');
        var id1 = ($(document.getElementById(selectorForm)));
        var data = $(this).closest('form').serialize();

        $.post('admin/addTheoretical', data,
            function (res) {
                if (res == 'ok') {
                    window.location.reload();
                } else {
                    alert(res);
                }
            });
    });

    // change nr of questions setting
    $(".editQuestionCount").click(function () {
        event.preventDefault();
        var selectorForm = $(this).closest('form').attr('id');
        var id1 = ($(document.getElementById(selectorForm)));
        var data = $(this).closest('form').serialize();

        console.log(id1);
        $.post('admin/editQuestionCount', data,
            function (res) {
                if (res == 'ok') {
                    $('#editQuestionCount-error').hide();
                    $('#editQuestionCount-successful').fadeOut(75).fadeIn(75).animate({opacity: 1}, 500).delay(1000);
                } else {
                    $('#editQuestionCount-successful').hide();
                    $('#editQuestionCount-error').fadeOut(75).fadeIn(75).animate({opacity: 1}, 500).delay(1000);
                }
            });
    });

    // generate password
    $('#generatePassword').on('click', function (e) {

        $.post('admin/generatePassword', {password: this.value}, function (res) {
            $('#generatedPassword').val(res);
        });

        return false;
    });

    // open test
    $(".openTest").click(function () {
        event.preventDefault();
        var selectorForm = $(this).closest('form').attr('id');
        var id1 = ($(document.getElementById(selectorForm)));
        var data = $(this).closest('form').serialize();

        console.log(id1);
        $.post('admin/openTest', data,
            function (res) {
                if (res == 'ok') {
                    $('#openTest-error').hide();
                    $('#openTest-successful').fadeOut(75).fadeIn(75).animate({opacity: 1}, 500).delay(1000);
                } else {
                    $('#openTest-successful').hide();
                    $('#openTest-error').fadeOut(75).fadeIn(75).animate({opacity: 1}, 500).delay(1000);
                }
            });
    });

    // refresh time
    setInterval(function(){
        $.post('admin/liveTime', 'test',
            function (res) {
                $('#liveTime').html(res);
            });
    }, 1000);

    // close test
    $(".closeTest").click(function () {
        event.preventDefault();
        var selectorForm = $(this).closest('form').attr('id');
        var id1 = ($(document.getElementById(selectorForm)));
        var data = $(this).closest('form').serialize();

        console.log(id1);
        $.post('admin/closeTest', data,
            function (res) {
                if (res == 'ok') {
                    $('#openTest-error').hide();
                    $('#openTest-successful').fadeOut(75).fadeIn(75).animate({opacity: 1}, 500).delay(1000);
                } else {
                    $('#openTest-successful').hide();
                    $('#openTest-error').fadeOut(75).fadeIn(75).animate({opacity: 1}, 500).delay(1000);
                }
            });
    });

    // close test
    $(".validationOption").click(function () {
        event.preventDefault();
        var selectorForm = $(this).closest('form').attr('id');
        var id1 = ($(document.getElementById(selectorForm)));
        var data = $(this).closest('form').serialize();

        console.log(id1);
        $.post('admin/validationOption', data,
            function (res) {
                if (res == 'ok') {
                    $('#validationOption-error').hide();
                    $('#validationOption-successful').fadeOut(75).fadeIn(75).animate({opacity: 1}, 500).delay(1000);
                } else {
                    $('#validationOption-successful').hide();
                    $('#validationOption-error').fadeOut(75).fadeIn(75).animate({opacity: 1}, 500).delay(1000);
                }
            });
    });

});

function validateAdmin() {
    return true;
}
