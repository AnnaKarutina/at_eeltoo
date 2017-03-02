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

    function result()
    {
        $social_id = $_SESSION['social_id'];
        $html = $_POST['validateHTML'];
        $htmlFile = fopen('results/' . $social_id . '.html', 'w');
        fwrite($htmlFile, $html);
        fclose($htmlFile);
    }

    function finished()
    {
        $this->points = Questions::getResult();
    }
}

