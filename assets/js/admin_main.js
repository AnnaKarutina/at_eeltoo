$(document).ready(function () {

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
                    $(id1).show();
                    $(id1).animate({opacity: 1}, 500).delay(3000);
                    $(id1).animate({opacity: 0}, 500);
                } else {
                    $(id1).hide();
                    $(id2).animate({opacity: 1}, 500).delay(3000);
                    $(id2).animate({opacity: 0}, 500);
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

        console.log(id1);
        $.post('admin/addTheoretical', data,
            function (res) {
                if (res == 'ok') {
                    window.location.reload();
                } else {
                    console.log('Error adding entry.');
                }
            });
    });

});

function validateAdmin() {
    return true;
}
