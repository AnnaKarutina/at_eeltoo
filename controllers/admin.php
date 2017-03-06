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
        $this->results = Administrator::getResults();
    }

    function practical() {
        $this->practical = true;
    }

    function theoretical()
    {
        $this->theoretical = true;
        $this->questions = Administrator::getQuestions();
    }

    function settings()
    {
        $this->properties = true;
        $this->settings;
        $this->totalQuestions = Administrator::countQuestions();
        $this->time;
    }

    function AJAX_allowAgain() {
        $result = update('results', [
            'theoretical_points' => -1,
            'practical_errors' => '',
            'practical_points' => -2,
            'nr_of_questions' => 0
        ], "user_id = {$_POST['user_id']}");

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
        exit(generateRandomPIN(4));
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

    function edit()
    {
        $admin_id = $this->params[0];
        $this->admin = get_first("SELECT * FROM admin WHERE admin_id = '{$admin_id}'");
    }

    function post_edit()
    {
        $data = $_POST['data'];
        insert('admin', $data);
    }

    function ajax_delete()
    {
        exit(q("DELETE FROM admin WHERE admin_id = '{$_POST['admin_id']}'") ? 'Ok' : 'Fail');
    }

}