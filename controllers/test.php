<?php namespace Halo;

use Aastategija\Questions;

class test extends Controller
{

    function index()
    {
        $this->questions = Questions::get();
    }

    // confirm theoretical test answers and redirects user to practical test
    function practical()
    {
        $this->practicalQuestions = Questions::getPractical();
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

        if (empty(get_first("SELECT user_id FROM results WHERE user_id = $user_id"))) {
            insert('results', [
                'user_id' => $user_id,
                'theoretical_points' => $correctAnswers
            ]);
        }
    }

    // write HTML file, get HTML errors using W3 validator
    function result()
    {
        $user_id = $_SESSION['user_id'];
        $social_id = $_SESSION['social_id'];
        $html = $_POST['validateHTML'];
        $htmlFile = fopen('results/' . $social_id . '.html', 'w');
        fwrite($htmlFile, $html);
        fclose($htmlFile);

        // localhost
        $whitelist = array(
            '127.0.0.1',
            '::1'
        );

        // if in localhost, skip HTML validator as it needs live URL
        if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
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
    }
}

