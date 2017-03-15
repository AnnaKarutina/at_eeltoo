<?php namespace Halo;

use Aastategija\Administrator;

class admin extends Controller
{
    public $requires_auth = false;
    public $template = 'auth';

    function AJAX_login()
    {
        // check if one of the form elements is missing
        if(empty($_POST['username'] || $_POST['password'])) {
            exit('Error. Missing required parameters.');
        }

        // clean the variables for protection against SQL injections
        $username = addslashes($_POST['username']);
        $password = addslashes($_POST['password']);

        // check the username
        $user_id = get_one("SELECT user_id FROM users WHERE user_name = '$username'");
        if(empty($user_id)) {
            exit('Invalid username or password.');
        }

        // if for some reason there is no password
        $realPassword = get_one("SELECT password FROM users WHERE user_name = '$username' AND user_id = '$user_id'");
        if(empty($realPassword)) {
            exit('Error. Please try again later.');
        }

        // check if password matches the one in the database
        if(password_verify($password, $realPassword) != $realPassword) {
            exit('Invalid username or password.');
        }

        $_SESSION['user_id'] = $user_id;

        echo "ok";

    }

    function index()
    {
        $this->resultpage = true;
        $this->results = Administrator::getResults();
    }

    function practical() {
        $this->practical = true;
        $this->practicalQuestions = Administrator::getPracticalQuestions();
    }

    function theoretical()
    {
        $this->theoretical = true;
        $this->questions = Administrator::getQuestions();
    }

    function grading()
    {
        $this->grading = true;
        $this->results = Administrator::getGradings();
    }

    function log()
    {
        $this->log = true;
        $this->resultsLog = Administrator::getLog();
    }
    function settings()
    {
        $this->properties = true;
        $this->settings;
        $this->totalQuestions = Administrator::countQuestions();
        $this->time;
    }

    function help()
    {
        $this->help = true;
    }

    function AJAX_gradePractical() {
        update('results', ['practical_points' => $_POST['grade']], "user_id = {$_POST['user_id']}");

        echo 'ok';
    }

    function AJAX_allowAgain() {
        $result = update('results', [
            'theoretical_points' => -1,
            'practical_errors' => '',
            'practical_points' => -2,
            'nr_of_questions' => 0
        ], "user_id = {$_POST['user_id']}");

        $social_id = get_first("SELECT social_id FROM users WHERE user_id = {$_POST['user_id']}")['social_id'];

        if(file_exists('results/'.$social_id.'.html')) {
            unlink('results/'.$social_id.'.html');
        }

        echo 'ok';
    }

    function AJAX_deleteResult() {
        $id = addslashes($_POST['user_id']);
        $socialId = get_first("SELECT social_id from users WHERE user_id = $id")['social_id'];

        if(file_exists('results/'.$socialId.'.html')) {
            unlink('results/'.$socialId.'.html');
        }

        q("DELETE FROM results WHERE user_id = $id");
        echo 'ok';
    }

    
    function AJAX_pushToLog() {
        q('DELETE FROM results');

        foreach (glob("results/*.html") as $filename) {
            if (is_file($filename)) {
                unlink($filename);
            }
        }

        echo 'ok';
    }

    function AJAX_editQuestionCount() {
        $questionCount = addslashes($_POST['nr_of_questions']);
        update('settings', ['nr_of_questions' => ''.$questionCount.''], "id = '1'");
        echo 'ok';
    }

    function AJAX_openTest() {
        $testHours = addslashes($_POST['test_hours']);
        $currentDate = date('Y-m-d H:i:s');
        update('settings', [
            'start' => $currentDate,
            'end' => date('Y-m-d H:i:s', strtotime ("+$testHours hour"))
            ], "id = '1'");
        echo 'ok';
    }

    function AJAX_closeTest() {
        update('settings', [
            'start' => NULL,
            'end' => NULL
        ], "id = '1'");
        echo 'ok';
    }

    function AJAX_liveTime() {
        if ($this->time['time'] >= 0) {
            echo $this->time['time'];
        } else {
            echo 'Test on suletud';
        }
    }

    function AJAX_validationOption() {
        $validateHTML = addslashes($_POST['validationOption']);
        update('settings', ['htmlvalidator' => ''.$validateHTML.''], "id = '1'");
        echo 'ok';
    }

    function AJAX_generatePassword() {
        $randomPIN = generateRandomPIN(4);
        update('settings', ['pwd' => ''.$randomPIN.''], "id = '1'");
        exit($randomPIN);
    }

    function AJAX_liveOption() {
        $livehtml = addslashes($_POST['liveOption']);
        update('settings', ['livehtml' => ''.$livehtml.''], "id = '1'");
        echo 'ok';
    }

    function AJAX_scoreOption() {
        $score = addslashes($_POST['scoreOption']);
        $scorePrivate = addslashes($_POST['scorePrivateOption']);
        update('settings', ['scores' => ''.$score.''], "id = '1'");
        update('settings', ['scores_private' => ''.$scorePrivate.''], "id = '1'");
        echo 'ok';
    }

    function AJAX_changePassword() {
        $old = addslashes($_POST['old-password']);
        $real = get_one("SELECT password FROM users WHERE user_id = '{$_SESSION['user_id']}'");
        $new1 = addslashes($_POST['password1']);
        $new2 = addslashes($_POST['password2']);

        if(empty($old) || empty($new1) || empty($new2)) {
            exit('All fields are required.');
        }

        if(password_verify($old, $real) != $real) {
            exit('Invalid password.');
        }

        if($new1 != $new2) {
            exit('Passwords do not match.');
        }

        $new = password_hash($new1, PASSWORD_DEFAULT);
        $query = update('users', ['password' => ''.$new.''], "user_id = '{$_SESSION['user_id']}'");

        if($query) {
            echo 'ok';
        } else {
            exit('Something went wrong. Please try again.');
        }

        //$2y$10$awo99t94fHCRveHtwlS0CefVizfvur6SB8B9Gve6mC7i9l43mURjm


    }

    function AJAX_editTheoretical() {
        $answers = $_POST['answers'];

        foreach ($answers as $answer) {
            if($answer == NULL) {
                exit('All fields are required.');
            }
        }

        $question = addslashes(array_values($_POST['question'])[0]);
        $questionID = key($_POST['question']);
        update('questions', ['question' => ''.$question.''], "question_id = '$questionID'");
        foreach ($answers as $key=>$answer) {
            $answer_text = addslashes($answer);
            update('answers', ['answer_text' => ''.$answer_text.''], "answer_id = '$key'");
        }
        echo 'ok';
    }

    function AJAX_deleteTheoretical() {
        $questionID = key($_POST['question']);
        q("DELETE FROM answers WHERE question_id = '$questionID'");
        q("DELETE FROM questions WHERE question_id = '$questionID'");
        echo 'ok';
    }

    function AJAX_addTheoretical() {

        if(empty($_POST)) {
            exit('All fields are required.');
        }

        $elements = $_POST;

        foreach ($elements as $element) {
            if($element == NULL) {
                exit('All fields are required.');
            }
        }

        foreach ($elements as $key=>$element) {
            switch ($key) {
                case 'question':
                    insert('questions', ['question' => ''.$element.'']);
                    $questionID = get_first('SELECT LAST_INSERT_ID() as question_id');
                    break;
                case 'correct':
                    insert('answers', [
                        'answer_text' => $element,
                        'question_id' => $questionID['question_id'],
                        'answer_correct' => 1
                    ]);
                    break;
                default:
                    insert('answers', [
                        'answer_text' => $element,
                        'question_id' => $questionID['question_id']
                    ]);
                    break;
            }
        }
        echo 'ok';
    }

    function AJAX_editPractical() {
        $practicalText = str_replace("\n", '', $_POST['practical_text']);
        $practicalId = $_POST['practical_id'];
        $practicalTitle = $_POST['practical_title'];
        update('practical', [
            'practical_text' => ''.$practicalText.'',
            'practical_title' => ''.$practicalTitle.''
        ], "practical_id = '$practicalId'");
        echo 'ok';
    }

    function AJAX_deletePractical() {
        $practicalId = $_POST['practical_id'];
        q("DELETE FROM practical WHERE practical_id = '$practicalId'");
        echo 'ok';
    }

    function AJAX_addPractical() {
        if(empty($_POST['practical_title'] && $_POST['practical_text'])) {
            exit('All fields are required!');
        }

        $practicalTitle = $_POST['practical_title'];
        $practicalText = str_replace("\n", '', $_POST['practical_text']);

        insert('practical', [
            'practical_text' => $practicalText,
            'practical_title' => $practicalTitle
        ]);

        echo 'ok';
    }

}