/**
 * Created by Renee on 2/16/2017.
 */
$(document).ready(function() {

    // clear any input that might have been saved via browser itself earlier
    $('input:text').val("");
    $('input:password').val("");

    // toggle quiz modal
    $( "#yes" ).click(function() {
        $( "#quiz" ).submit();
    });
    $( "#no" ).click(function() {
        $('.confirm').modal('hide');
    });

});

// limits
var lowerLimitName = 2;
var upperLimitName = 100;
var lowerLimitLastname = 2;
var upperLimitLastname = 100;
var lowerLimitSocial = 8;
var upperLimitSocial = 14;

// validate form
function validateForm() {

    var firstname = document.forms["register"]["firstName"].value;
    var lastname = document.forms["register"]["lastName"].value;
    var social = document.forms["register"]["social_id"].value;


    if (firstname == "" || firstname.length < lowerLimitName) {
        alert("Eesnimi on liiga lühike! Miinimum on " + lowerLimitName + " tähemärki!");
        return false;
    } else if (firstname.length > upperLimitName) {
        alert("Eesnimi on liiga pikk! Limiit on " + upperLimitName);
        return false;
    }


    if (lastname.length < lowerLimitLastname) {
        alert("Perenimi on liiga lühike! Miinimum on " + lowerLimitLastname + " tähemärki!");
        return false;
    } else if (lastname.length > upperLimitLastname) {
        alert("Perenimi on liiga pikk! Limiit on " + upperLimitLastname);
        return false;
    }

    if (social.length < lowerLimitSocial) {
        alert("Isikukood on liiga lühike!");
        return false;
    } else if (social.length > upperLimitSocial) {
        alert("Isikukood on liiga pikk!");
        return false;
    } else if (isNaN(social)) {
        alert("Isikukood võib sisaldada ainult numbreid!");
        return false;
    }
    return true;
}

