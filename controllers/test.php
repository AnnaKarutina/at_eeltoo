<?php namespace Halo;

use Aastategija\Questions;

class test extends Controller
{
    // theoretical test page
    function index()
    {
        // handle redirection if necessary
        if(isset($_SESSION['result'])) {
            header('Location: result');
            exit();
        } else if(isset($_SESSION['practical'])) {
            header('Location: practical');
            exit();
        } else if (Questions::getResult() >= 0) {
            header('Location: test/practical');
            exit();
        }

        // catch the questions into session
        if(!isset($_SESSION['questions'])) {
            $_SESSION['questions'] = Questions::get();
        }

        $this->questions = $_SESSION['questions'];

        // the user has started theoretical quiz
        $_SESSION['theoretical'] = true;

        // update the nr of questions user got
        update('results', [
            'nr_of_questions' => $this->settings['nr_of_questions']
        ], "user_id = '{$_SESSION['user_id']}'");
    }

    // confirm theoretical test answers and redirects user to practical test
    function practical()
    {

        // handle redirection if necessary
        if(isset($_SESSION['result'])) {
            header('Location: result');
            exit();
        }

        // check the theoretical answers if necessary
        if(Questions::getResult() == -1) {
            // get user answers
            $_SESSION['practical'] = true;
            $user_id = $_SESSION['user_id'];
            $answers = $_POST;
            $correctAnswers = 0;

            foreach ($answers as $answer) {
                foreach ($answer as $value) {
                    $check = get_first("SELECT answer_correct FROM answers WHERE answer_id = $value");
                    if ($check['answer_correct'] == 1) {
                        $correctAnswers++;
                    }
                }
            }
            // update table
            update('results', [
                'theoretical_points' => $correctAnswers,
            ], "user_id = '$user_id'");
        }

        // cache the practical task
        if(!isset($_SESSION['task'])) {
            $_SESSION['task'] = Questions::getPractical();
        }

        // use the test
        $this->practicalQuestions = $_SESSION['task'];

        // the user has started practical test
        $_SESSION['practical'] = true;

        // update table with the practical test given
        update('results', [
            'practical_id' => $_SESSION['task'][0],
        ], "user_id = '{$_SESSION['user_id']}'");

    }

    // write HTML file, get HTML errors using W3 validator
    function result()
    {

        // handle redirection if necessary
        if(!isset($_SESSION['practical'])) {
            header('Location: ../');
            exit();
        }

        $user_id = $_SESSION['user_id'];
        $social_id = $_SESSION['social_id'];
        // localhost
        $whitelist = array(
            '127.0.0.1',
            '::1'
        );

        if(!isset($_SESSION['practical'])) {
            header('Location: ../');
            exit();
        }
        $_SESSION['result'] = true;

        if(!empty($_POST)) {
            $html = $_POST['validateHTML'];
            $htmlFile = fopen('results/' . $social_id . '.html', 'w');
            fwrite($htmlFile, $html);
            fclose($htmlFile);
            // update practical points, if -1 then practical is done but ungraded
            update('results', ['practical_points' => -1], "user_id = '$user_id'");
        }

        // if in localhost, skip HTML validator as it needs live URL... also check the settings
        if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist) && $this->settings['htmlvalidator'] == 1){
            $html = 'https://validator.w3.org/nu/?&doc=' . BASE_URL.'results/'.$social_id.'.html' . '&out=json';

            // get the json data
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $html);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)');
            $data = curl_exec($curl);
            curl_close($curl);

            // decode json to php array
            $check = json_decode($data, true);

            // get only the errors and push em into array
            $errorList = array();
            foreach ($check['messages'] as $key => $value) {
                foreach ($check['messages'][$key] as $key1 => $value1) {
                    if ($value1 == 'error') {
                        array_push($errorList, $check['messages'][$key]['message']);
                    }
                }
            }

            $insertErrors = serialize($errorList);
            update('results', ['practical_errors' => ''.$insertErrors.''], "user_id = '$user_id'");
        }

    }

    function finished()
    {
        $this->points = Questions::getResult();
        killSession();
    }

}

