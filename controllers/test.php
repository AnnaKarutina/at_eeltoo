<?php namespace Halo;
use Aastategija\Questions;
class test extends Controller
{

    function index()
    {
        $this->questions = Questions::get();
        $this->practicalQuestions = Questions::getPractical();
    }

    // confirm theoretical test answers and redirects user to practical test
    function practical()
    {
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
    }

    function confirm() {
        echo '<pre>';
        print_r(htmlentities($_POST['validateHTML']));
        echo '</pre>';

    }

}